<?php
require('../include/top.inc.php');
isAdmin();

// ----------- ACTIONS: STATUS CHANGE / DELETE -----------

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    // --- update status ---
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        $status = ($operation == 'active') ? '1' : '0';

        mysqli_query($con, "UPDATE gallery SET status='$status' WHERE id='$id'");
    }

    // --- delete gallery item ---
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM gallery WHERE id='$id'");
    }
}

// ----------- FETCH GALLERY RECORDS -----------

$sql = "SELECT * FROM gallery ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php") ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Gallery</h4>
            <span class="add_button"><a href="gallery.php" class="btn btn-sm btn-primary">Add Gallery Item</a></span>

            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="height: calc(100vh - 120px);">

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Gallery List</h4>
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td class="serial"><?php echo $i++ ?></td>

                                        <td><?php echo $row['title'] ?></td>

                                        <td><?php echo $row['short_description'] ?></td>

                                        <td>
                                            <a target="_blank" href="<?php echo '../../uploads/gallery/' . $row['image'] ?>">
                                                <img width="120px" src="<?php echo '../../uploads/gallery/' . $row['image'] ?>">
                                            </a>
                                        </td>

                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge1 badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>";
                                            } else {
                                                echo "<span class='badge1 badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <span class='badge1 badge-edit'>
                                                <a href='gallery.php?id=<?php echo $row['id'] ?>'>Edit</a>
                                            </span>

                                            <span class='badge1 badge-delete'>
                                                <a href='?type=delete&id=<?php echo $row['id'] ?>' onclick="return confirm('Are you sure?')">Delete</a>
                                            </span>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> <!-- table-stats -->
                </div>

            </div> <!-- card -->
        </div>
    </div>
</div>

<!-- JS Files -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<script src="../dist/js/waves.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<script src="../dist/js/custom.min.js"></script>
<script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>

<script>
    $("#zero_config").DataTable();
</script>

</body>
</html>
