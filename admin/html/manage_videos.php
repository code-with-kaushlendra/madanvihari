<?php
require('../include/top.inc.php');

isAdmin();

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        $status = ($operation == 'active') ? 1 : 0;

        mysqli_query($con, "UPDATE videos SET status='$status' WHERE id='$id'");
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM videos WHERE id='$id'");
    }
}

$sql = "SELECT * FROM videos ORDER BY id DESC";
$res = mysqli_query($con, $sql);

include("../include/head.inc.php");
?>

<!-- ============================================================== -->
<!-- Breadcrumb -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Videos</h4>
            <span class="add_button"> 
                <a href="videos.php" class="btn btn-sm btn-primary">Add Video</a>
            </span>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Videos</li>
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
                    <h4 class="box-title">Videos List</h4>
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Video URL</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) {

                                    // Extract YouTube ID
                                    preg_match('/(?:v=|be\/)([A-Za-z0-9_\-]+)/', $row['video_url'], $match);
                                    $video_id = $match[1] ?? '';
                                    $thumbnail = "https://img.youtube.com/vi/$video_id/hqdefault.jpg";
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>

                                        <td>
                                            <?php if ($video_id != '') { ?>
                                                <img src="<?php echo $thumbnail; ?>" width="150">
                                            <?php } ?>
                                        </td>

                                        <td><?php echo $row['title']; ?></td>

                                        <td>
                                            <a href="<?php echo $row['video_url']; ?>" target="_blank">
                                                View Video
                                            </a>
                                        </td>

                                        <td><?php echo substr($row['short_description'], 0, 50) . "..."; ?></td>

                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge1 badge-complete'><a href='?type=status&operation=deactive&id={$row['id']}'>Active</a></span>";
                                            } else {
                                                echo "<span class='badge1 badge-pending'><a href='?type=status&operation=active&id={$row['id']}'>Deactive</a></span>";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <span class="badge1 badge-edit"><a href="videos.php?id=<?php echo $row['id']; ?>">Edit</a></span>
                                            <span class="badge1 badge-delete"><a href="?type=delete&id=<?php echo $row['id']; ?>">Delete</a></span>
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

</div>

<!-- Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>

<script>
    $("#zero_config").DataTable();
</script>

</body>
</html>
