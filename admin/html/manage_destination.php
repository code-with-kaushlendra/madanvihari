<?php
require('../include/top.inc.php');
isAdmin();

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        $status = ($operation == 'active') ? '1' : '0';

        mysqli_query($con, "UPDATE destinations SET status='$status' WHERE id='$id'");
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM destinations WHERE id='$id'");
    }
}

$sql = "SELECT *
      FROM destinations
      ORDER BY destinations.id DESC";

$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php"); ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Destination</h4>
            <span class="add_button">
                <a href="destination.php" class="btn btn-sm btn-primary">Add Destination</a>
            </span>
        </div>
    </div>
</div>

<div class="container-fluid" style="height: calc(100vh - 120px);">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Manage Destinations
                    <!-- <a href="destination.php" class="btn btn-primary btn-sm float-end">Add Destination</a> -->
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Destination</th>
                                    <th>Short Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['short_description']; ?></td>

                                        <td>
                                            <?php if ($row['image'] != '') { ?>
                                                <img src="../../uploads/destination/<?php echo $row['image']; ?>" width="100">
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a> | ";
                                            } else {
                                                echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a> | ";
                                            }
                                            ?>
                                            <a href="destination.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>">Delete</a>
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