<?php
require('../include/top.inc.php');
isAdmin();

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        $status = ($operation == 'active') ? '1' : '0';

        mysqli_query($con, "UPDATE offline_videos SET status='$status' WHERE id='$id'");
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM offline_videos WHERE id='$id'");
    }
}

$sql = "SELECT * FROM offline_videos ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php"); ?>

<!-- ============================================================== -->
<!-- Bread crumb -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Offline Videos</h4>
            <span class="add_button">
                <a href="offline-videos.php" class="btn btn-sm btn-primary">Add Video</a>
            </span>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Offline Videos</li>
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
                    <h4 class="box-title">Manage Offline Videos</h4>
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Video Preview</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>

                                    <td><?php echo $row['title']; ?></td>

                                    <td>
                                        <?php if ($row['video'] != '') { ?>
                                            <video width="120" height="200" controls>
                                                <source src="../../uploads/offline-videos/<?php echo $row['video']; ?>" type="video/mp4">
                                            </video>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo "<span class='badge1 badge-complete'>
                                                <a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>
                                            </span>";
                                        } else {
                                            echo "<span class='badge1 badge-pending'>
                                                <a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>
                                            </span>";
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo "<span class='badge1 badge-edit'>
                                            <a href='offline-videos.php?id=".$row['id']."'>Edit</a>
                                        </span>&nbsp;";

                                        echo "<span class='badge1 badge-delete'>
                                            <a href='?type=delete&id=".$row['id']."' 
                                               onclick='return confirm(\"Are you sure?\")'>Delete</a>
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

<!-- JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../dist/js/custom.min.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>

<script>
    $(".table").DataTable();
</script>

</body>
</html>
