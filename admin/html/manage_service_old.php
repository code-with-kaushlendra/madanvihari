<?php
require('../include/top.inc.php');

isAdmin();

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        $status = ($operation == 'active') ? '1' : '0';

        $update_status_sql = "UPDATE services SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM services WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "SELECT services.*, departments.department_name 
        FROM services 
        LEFT JOIN departments ON services.department_id = departments.id
        ORDER BY services.id DESC";

$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php"); ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Services</h4>
            <span class="add_button">
                <a href="service.php" class="btn btn-sm btn-primary">Add Services</a>
            </span>
        </div>
    </div>
</div>

<div class="container-fluid" style="height: calc(100vh - 120px);">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Manage Services</h4>
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['department_name']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['short_description']; ?></td>

                                        <td>
                                            <?php if ($row['image'] != '') { ?>
                                                <a target="_blank" href="../../uploads/service/<?php echo $row['image']; ?>">
                                                    <img width="100px" src="../../uploads/service/<?php echo $row['image']; ?>">
                                                </a>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge1 badge-complete'>
                                                        <a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>
                                                      </span>&nbsp;";
                                            } else {
                                                echo "<span class='badge1 badge-pending'>
                                                        <a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>
                                                      </span>&nbsp;";
                                            }

                                            echo "<span class='badge1 badge-edit'>
                                                    <a href='service.php?id=" . $row['id'] . "'>Edit</a>
                                                  </span>&nbsp;";

                                            echo "<span class='badge1 badge-delete'>
                                                    <a href='?type=delete&id=" . $row['id'] . "'>Delete</a>
                                                  </span>";
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>