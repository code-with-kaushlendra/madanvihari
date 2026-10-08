<?php
require('../include/top.inc.php');

isAdmin();

$name = "";
$short_description = "";
$slug = "";
$price = "";
$sale_price = "";
$shipping_charge = "";
$frame_size = "";
$painting_size = "";
$image = "";
$description = "";
$status = 1;
$department_id = "";

$on_demand = 0;
$in_stock = 1;
$on_sale = 0;
$best_selling = 0;

// Edit Product
if (isset($_GET['id']) && $_GET['id'] != '') {

    $id = get_safe_value($con, $_GET['id']);

    $res = mysqli_query($con, "SELECT * FROM products WHERE id='$id'");

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);

        $department_id = $row['department_id'];
        $name          = $row['name'];
        $slug          = $row['slug'];
        $price         = $row['price'];
        $sale_price    = $row['sale_price'];
        $shipping_charge = $row['shipping_charge'];
        $frame_size    = $row['frame_size'];
        $painting_size    = $row['painting_size'];
        $image         = $row['image'];
        $short_description   = $row['short_description'];
        $description   = $row['description'];
        $status        = $row['status'];
        
        $on_demand     = $row['on_demand'];
        $in_stock      = $row['in_stock'];
        $on_sale       = $row['on_sale'];
        $best_selling = 0;

    } else {

        header('location:manage_product.php');
        die();

    }
}

// Save Product
if (isset($_POST['submit'])) {

    $department_id = get_safe_value($con, $_POST['department_id']);
    $name          = get_safe_value($con, $_POST['name']);
    $slug          = get_safe_value($con, $_POST['slug']);
    $price         = get_safe_value($con, $_POST['price']);
    $sale_price     = get_safe_value($con, $_POST['sale_price']);
    $shipping_charge= get_safe_value($con, $_POST['shipping_charge']);
    $frame_size     = get_safe_value($con, $_POST['frame_size']);
    $painting_size     = get_safe_value($con, $_POST['painting_size']);
    $short_description   = get_safe_value($con, $_POST['short_description']);
    $description   = get_safe_value($con, $_POST['description']);
    $status        = get_safe_value($con, $_POST['status']);
    
    
    $on_demand = isset($_POST['on_demand']) ? 1 : 0;

    $in_stock = isset($_POST['in_stock']) ? 1 : 0;

    $on_sale = isset($_POST['on_sale']) ? 1 : 0;
     $best_selling = isset($_POST['best_selling']) ? 1 : 0;

    // Image Upload
    if ($_FILES['image']['name'] != '') {

        $upload_dir = dirname(__DIR__) . '/assets/images/products/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $image = time().'_'.basename($_FILES['image']['name']);

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $upload_dir.$image
        );

    }

    // Update
    if (isset($_GET['id']) && $_GET['id'] != '') {

        if ($_FILES['image']['name'] != '') {

            mysqli_query($con, "
                UPDATE products SET
                department_id='$department_id',
                name='$name',
                slug='$slug',
                price='$price',
                sale_price='$sale_price',
                shipping_charge='$shipping_charge',
                frame_size='$frame_size',
                painting_size='$painting_size',
                image='$image',
                short_description='$short_description',
                description='$description',
                status='$status',
                on_demand='$on_demand',

                in_stock='$in_stock',

                on_sale='$on_sale',
                best_selling='$best_selling'
                
                WHERE id='$id'
            ");

        } else {

            mysqli_query($con, "
                UPDATE products SET
                department_id='$department_id',
                name='$name',
                slug='$slug',
                price='$price',
                sale_price='$sale_price',
                 shipping_charge='$shipping_charge',
                 frame_size='$frame_size',
                painting_size='$painting_size',
                 short_description='$short_description',
                description='$description',
                status='$status',
                on_demand='$on_demand',

                in_stock='$in_stock',

                on_sale='$on_sale',
                best_selling='$best_selling'
                WHERE id='$id'
            ");

        }

    } else {

        mysqli_query($con, "
            INSERT INTO products
            (
                department_id,
                name,
                short_description,
                slug,
                price,
                sale_price,
                shipping_charge,
                frame_size,
                painting_size,
                image,
                description,
                status,
                on_demand,
                in_stock,
                on_sale,
                best_selling
            )
            VALUES
            (
                '$department_id',
                '$name',
                '$short_description',
                '$slug',
                '$price',
                '$sale_price',
                '$shipping_charge',
                '$frame_size',
                '$painting_size',
                '$image',
                '$description',
                '$status',
                '$on_demand',
                '$in_stock',
                '$on_sale',
                '$best_selling'
            )
        ");

    }

    header('location:manage_product.php');
    die();

}
?>

<?php include("../include/head.inc.php"); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Department</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Department
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 m-auto bg-white">
            <div class="card">
                <div class="card-header">
                    <strong>Product Form</strong>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <!-- Department -->
                        <div class="form-group mb-3">
                            <label>Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">Select Department</option>

                                <?php
                                $dept_res = mysqli_query($con, "SELECT * FROM departments WHERE status='1' ORDER BY name ASC");
                                while($dept = mysqli_fetch_assoc($dept_res)){
                                ?>
                                    <option value="<?php echo $dept['id']; ?>"
                                        <?php
                                        if(isset($department_id) && $department_id == $dept['id']){
                                            echo "selected";
                                        }
                                        ?>>
                                        <?php echo $dept['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="form-group mb-3">
                            <label>Product Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required
                                value="<?php echo $name; ?>">
                        </div>
                        
                          <div class="form-group mb-3">
                            <label>Short Description</label>
                            <textarea
                                name="short_description"
                                class="form-control"
                                rows="5"><?php echo $short_description; ?></textarea>
                        </div>

                        <!-- Slug -->
                        <div class="form-group mb-3">
                            <label>Slug</label>
                            <input
                                type="text"
                                name="slug"
                                class="form-control"
                                required
                                value="<?php echo $slug; ?>">
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-3">
                            <label>Price</label>
                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="form-control"
                                value="<?php echo $price; ?>">
                        </div>
                         <!-- Sale Price -->
                        <div class="form-group mb-3">
                            <label>Sale Price</label>
                            <input
                                type="number"
                                step="0.01"
                                name="sale_price"
                                class="form-control"
                                value="<?php echo $sale_price; ?>">
                        </div>
                        
                           <!-- Shipping Charge -->
                        <div class="form-group mb-3">
                            <label>Shipping Charge</label>
                            <input
                                type="number"
                                step="0.01"
                                name="shipping_charge"
                                class="form-control"
                                value="<?php echo $shipping_charge; ?>">
                        </div>
                        
                        <!-- Frame Size -->
<div class="form-group mb-3">
    <label>Frame Size</label>

    <input
        type="text"
        name="frame_size"
        class="form-control"
        placeholder="Example: 34 X 34 inches"
        value="<?php echo htmlspecialchars($frame_size ?? ''); ?>"
        >
</div>


                        <!-- painting Size -->
<div class="form-group mb-3">
    <label>Painting Size</label>

    <input
        type="text"
        name="painting_size"
        class="form-control"
        placeholder="Example: 34 X 34 inches"
        value="<?php echo htmlspecialchars($painting_size ?? ''); ?>"
        >
</div>


            <div class="form-group mb-3">

                            <label class="d-block mb-2">
                                Product Availability
                            </label>


                            <!-- In Stock -->

                            <div class="form-check mb-2">

                                <input
                                    type="checkbox"
                                    name="in_stock"
                                    value="1"
                                    class="form-check-input"
                                    id="in_stock"

                                    <?php

                                    if ($in_stock == 1) {
                                        echo "checked";
                                    }

                                    ?>
                                >

                                <label
                                    class="form-check-label"
                                    for="in_stock"
                                >
                                    In Stock
                                </label>

                            </div>


                            <!-- On Demand -->

                            <div class="form-check mb-2">

                                <input
                                    type="checkbox"
                                    name="on_demand"
                                    value="1"
                                    class="form-check-input"
                                    id="on_demand"

                                    <?php

                                    if ($on_demand == 1) {
                                        echo "checked";
                                    }

                                    ?>
                                >

                                <label
                                    class="form-check-label"
                                    for="on_demand"
                                >
                                    On Demand
                                </label>

                            </div>


                            <!-- On Sale -->

                            <div class="form-check mb-2">

                                <input
                                    type="checkbox"
                                    name="on_sale"
                                    value="1"
                                    class="form-check-input"
                                    id="on_sale"

                                    <?php

                                    if ($on_sale == 1) {
                                        echo "checked";
                                    }

                                    ?>
                                >

                                <label
                                    class="form-check-label"
                                    for="on_sale"
                                >
                                    On Sale
                                </label>

                            </div>
                            
                            
                            <!-- Best Selling -->

                            <div class="form-check mb-2">

                                <input
                                    type="checkbox"
                                    
                                    name="best_selling"
                                    value="1"
                                    class="form-check-input"
                                    id="best_selling"

                                    <?php

                                    if ($best_selling == 1) {
                                        echo "checked";
                                    }

                                    ?>
                                >

                                <label
                                    class="form-check-label"
                                    for="best_selling"
                                >
                                    Best Selling
                                </label>

                            </div>

                        </div>


                        <!-- Product Image -->
                        <div class="form-group mb-3">
                            <label>Product Image</label>
                            <input
                                type="file"
                                name="image"
                                class="form-control">
                        </div>

                        <?php
                        if(isset($image) && $image!=''){
                        ?>
                            <img src="../assets/images/products/<?php echo $image; ?>" width="120">
                        <?php } ?>

                        <!-- Description -->
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea
                                name="description"
                                class="form-control"
                                rows="5"><?php echo $description; ?></textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if($status==1) echo "selected"; ?>>Active</option>
                                <option value="0" <?php if($status==0) echo "selected"; ?>>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success">
                            Save Product
                        </button>

                        <a href="manage_product.php" class="btn btn-secondary">
                            Back
                        </a>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>