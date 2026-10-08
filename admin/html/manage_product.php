<?php
require('../include/top.inc.php');

isAdmin();

/* =========================================================
   Status Change
========================================================= */
if(isset($_GET['type']) && $_GET['type']!=''){

    $type = get_safe_value($con, $_GET['type']);

    if($type == 'status'){

        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        if($operation == 'active'){
            $status = '1';
        }else{
            $status = '0';
        }

        mysqli_query(
            $con,
            "UPDATE products SET status='$status' WHERE id='$id'"
        );
    }

    /* =====================================================
       Delete Product
    ===================================================== */
    if($type == 'delete'){

        $id = get_safe_value($con, $_GET['id']);

        // Get image
        $img_result = mysqli_query(
            $con,
            "SELECT image FROM products WHERE id='$id'"
        );

        $img = mysqli_fetch_assoc($img_result);

        $upload_dir = dirname(__DIR__) . '/assets/images/products/';

        if(
            !empty($img['image']) &&
            file_exists($upload_dir . $img['image'])
        ){
            unlink($upload_dir . $img['image']);
        }

        mysqli_query(
            $con,
            "DELETE FROM products WHERE id='$id'"
        );
    }
}


/* =========================================================
   CATEGORY FILTER
========================================================= */

$department_id = '';

if(isset($_GET['department_id']) && $_GET['department_id'] != ''){

    $department_id = get_safe_value(
        $con,
        $_GET['department_id']
    );
}


/* =========================================================
   GET ALL DEPARTMENTS
========================================================= */

$department_sql = "
    SELECT id, name
    FROM departments
    ORDER BY name ASC
";

$department_res = mysqli_query(
    $con,
    $department_sql
);


/* =========================================================
   PRODUCT QUERY
========================================================= */

$sql = "
SELECT
    products.*,
    departments.name AS department_name

FROM products

INNER JOIN departments
    ON products.department_id = departments.id
";


/*
|--------------------------------------------------------------------------
| Apply Department Filter
|--------------------------------------------------------------------------
*/

if($department_id != ''){

    $sql .= "
        WHERE products.department_id = '$department_id'
    ";
}


$sql .= "
    ORDER BY products.id 
";


$res = mysqli_query($con, $sql);

?>

<?php include("../include/head.inc.php"); ?>


<!-- =========================================================
     PAGE BREADCRUMB
========================================================= -->

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-12 d-flex no-block align-items-center">

            <h4 class="page-title">
                Manage Products
            </h4>


            <div class="ms-auto text-end">

                <a
                    href="product.php"
                    class="btn btn-success"
                >
                    Add Product
                </a>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     MAIN CONTAINER
========================================================= -->

<div class="container-fluid">


    <div class="card">


        <!-- =================================================
             CARD HEADER
        ================================================== -->

        <div class="card-header">

            <strong>
                Product List
            </strong>

        </div>


        <div class="card-body">


            <!-- =================================================
                 FILTER SECTION
            ================================================== -->

            <div
                class="row mb-4"
                style="
                    background:#f8f9fa;
                    padding:15px;
                    border-radius:6px;
                "
            >

                <div class="col-md-4">

                    <label
                        for="department_id"
                        class="form-label"
                    >
                        <strong>
                            Filter by Category
                        </strong>
                    </label>


                    <select
                        name="department_id"
                        id="department_id"
                        class="form-control"
                        onchange="filterProducts()"
                    >

                        <option value="">
                            All Categories
                        </option>


                        <?php

                        while(
                            $department =
                            mysqli_fetch_assoc($department_res)
                        ){

                        ?>

                            <option
                                value="<?php echo $department['id']; ?>"
                                <?php

                                if(
                                    $department_id ==
                                    $department['id']
                                ){
                                    echo 'selected';
                                }

                                ?>
                            >

                                <?php
                                echo htmlspecialchars(
                                    $department['name']
                                );
                                ?>

                            </option>

                        <?php

                        }

                        ?>

                    </select>

                </div>


                <!-- Reset Button -->

                <div
                    class="col-md-2 d-flex align-items-end"
                >

                    <a
                        href="manage_product.php"
                        class="btn btn-secondary"
                    >
                        Reset
                    </a>

                </div>


            </div>


            <!-- =================================================
                 SHOW CURRENT FILTER
            ================================================== -->

            <?php if($department_id != ''){ ?>

                <?php

                $selected_department = '';

                $selected_result = mysqli_query(
                    $con,
                    "
                    SELECT name
                    FROM departments
                    WHERE id='$department_id'
                    "
                );

                if(
                    $selected_row =
                    mysqli_fetch_assoc($selected_result)
                ){

                    $selected_department =
                        $selected_row['name'];

                }

                ?>


                <div
                    class="alert alert-info"
                    style="margin-bottom:20px;"
                >

                    Showing products from category:

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $selected_department
                        );
                        ?>
                    </strong>

                </div>

            <?php } ?>


            <!-- =================================================
                 PRODUCT TABLE
            ================================================== -->

            <div class="table-responsive">

                <table
                    class="table table-bordered table-striped"
                >

                    <thead>

                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Image
                        </th>

                        <th>
                            Product
                        </th>

                        <th>
                            Department
                        </th>

                        <th>
                            Price
                        </th>

                        <th>
                            Sale Price
                        </th>

                        <th>
                            Shipping Charges
                        </th>

                        <th>
                            Frame Size
                        </th>
                        <th>
                        Painting Size
                        </th>
                        <th>
                            Availability
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                    </thead>


                    <tbody>


                    <?php

                    if(mysqli_num_rows($res) > 0){

                        while(
                            $row =
                            mysqli_fetch_assoc($res)
                        ){

                    ?>


                    <tr>


                        <!-- ID -->

                        <td>
                            <?php
                            echo $row['id'];
                            ?>
                        </td>


                        <!-- IMAGE -->

                        <td>

                            <?php

                            if(
                                !empty($row['image'])
                            ){

                            ?>

                                <img
                                    src="../assets/images/products/<?php
                                    echo htmlspecialchars(
                                        $row['image']
                                    );
                                    ?>"
                                    width="70"
                                    height="70"
                                    style="
                                        object-fit:cover;
                                        border-radius:4px;
                                    "
                                >

                            <?php

                            }

                            ?>

                        </td>


                        <!-- PRODUCT -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['name']
                            );

                            ?>

                        </td>


                        <!-- DEPARTMENT -->

                        <td>

                            <?php

                            echo htmlspecialchars(
                                $row['department_name']
                            );

                            ?>

                        </td>


                        <!-- PRICE -->

                        <td>

                            ₹<?php
                            echo number_format(
                                $row['price'],
                                2
                            );
                            ?>

                        </td>


                        <!-- SALE PRICE -->

                        <td>

                            ₹<?php
                            echo number_format(
                                $row['sale_price'],
                                2
                            );
                            ?>

                        </td>


                        <!-- SHIPPING -->

                        <td>

                            ₹<?php
                            echo number_format(
                                $row['shipping_charge'],
                                2
                            );
                            ?>

                        </td>


                        <!-- FRAME SIZE -->

                        <td>

                            <?php

                            echo !empty(
                                $row['frame_size']
                            )
                                ? htmlspecialchars(
                                    $row['frame_size']
                                )
                                : '-';

                            ?>

                        </td>
                        
                         <td>

                            <?php

                            echo !empty(
                                $row['painting_size']
                            )
                                ? htmlspecialchars(
                                    $row['painting_size']
                                )
                                : '-';

                            ?>

                        </td>


                        <!-- AVAILABILITY -->

                        <td>


                            <?php

                            if(
                                $row['in_stock'] == 1
                            ){

                            ?>

                                <span
                                    class="badge bg-success"
                                >
                                    In Stock
                                </span>

                            <?php

                            }


                            if(
                                $row['on_demand'] == 1
                            ){

                            ?>

                                <span
                                    class="badge bg-warning text-dark"
                                >
                                    On Demand
                                </span>

                            <?php

                            }


                            if(
                                $row['on_sale'] == 1
                            ){

                            ?>

                                <span
                                    class="badge bg-danger"
                                >
                                    On Sale
                                </span>

                            <?php

                            }


                            if(
                                $row['best_selling'] == 1
                            ){

                            ?>

                                <span
                                    class="badge bg-danger"
                                >
                                    Best Selling
                                </span>

                            <?php

                            }


                            if(
                                $row['in_stock'] == 0 &&
                                $row['on_demand'] == 0 &&
                                $row['on_sale'] == 0 &&
                                $row['best_selling'] == 0
                            ){

                            ?>

                                <span
                                    class="badge bg-secondary"
                                >
                                    No Label
                                </span>

                            <?php

                            }

                            ?>

                        </td>


                        <!-- STATUS -->

                        <td>

                            <?php

                            if(
                                $row['status'] == 1
                            ){

                            ?>

                                <a
                                    class="btn btn-success btn-sm"
                                    href="?type=status&operation=deactive&id=<?php
                                    echo $row['id'];
                                    ?><?php
                                    if($department_id != ''){
                                        echo '&department_id=' .
                                            $department_id;
                                    }
                                    ?>"
                                >
                                    Active
                                </a>

                            <?php

                            }else{

                            ?>

                                <a
                                    class="btn btn-warning btn-sm"
                                    href="?type=status&operation=active&id=<?php
                                    echo $row['id'];
                                    ?><?php
                                    if($department_id != ''){
                                        echo '&department_id=' .
                                            $department_id;
                                    }
                                    ?>"
                                >
                                    Inactive
                                </a>

                            <?php

                            }

                            ?>

                        </td>


                        <!-- ACTION -->

                        <td>

                            <a
                                class="btn btn-primary btn-sm"
                                href="product.php?id=<?php
                                echo $row['id'];
                                ?>"
                            >
                                Edit
                            </a>


                            <a
                                class="btn btn-danger btn-sm"
                                onclick="
                                    return confirm(
                                        'Are you sure you want to delete this product?'
                                    )
                                "
                                href="?type=delete&id=<?php
                                echo $row['id'];
                                ?><?php
                                if($department_id != ''){
                                    echo '&department_id=' .
                                        $department_id;
                                }
                                ?>"
                            >
                                Delete
                            </a>

                        </td>


                    </tr>


                    <?php

                        }

                    }else{

                    ?>


                        <tr>

                            <td
                                colspan="11"
                                class="text-center"
                                style="padding:30px;"
                            >

                                <strong>
                                    No products found in this category.
                                </strong>

                            </td>

                        </tr>


                    <?php

                    }

                    ?>


                    </tbody>

                </table>

            </div>


        </div>

    </div>

</div>


<!-- =========================================================
     FILTER JAVASCRIPT
========================================================= -->

<script>

function filterProducts(){

    const department =
        document.getElementById(
            'department_id'
        ).value;

    if(department === ''){

        window.location.href =
            'manage_product.php';

    }else{

        window.location.href =
            'manage_product.php?department_id='
            + encodeURIComponent(department);

    }

}

</script>