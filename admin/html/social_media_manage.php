<?php
require('../include/top.inc.php');
isAdmin();

/* =========================
   STATUS + DELETE ACTION
========================= */
if (isset($_GET['type']) && $_GET['type'] != '') {

    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {

        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        $status = ($operation == 'active') ? 1 : 0;

        mysqli_query($con, "UPDATE social_media SET status='$status' WHERE id='$id'");
    }

    if ($type == 'delete') {

        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM social_media WHERE id='$id'");
    }
}

/* =========================
   FETCH DATA
========================= */
$sql = "SELECT * FROM social_media ORDER BY id DESC";
$res = mysqli_query($con, $sql);

include("../include/head.inc.php");

/* =========================
   THUMBNAIL FUNCTION
========================= */
function getThumbnail($url)
{
    preg_match('/\/(reel|p)\/([^\/]+)/', $url, $matches);

    if (isset($matches[2])) {
        return "https://www.instagram.com/p/" . $matches[2] . "/media/?size=l";
    }

    return "";
}
?>

<!-- =========================
     PAGE HEADER
========================= -->

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex align-items-center">

            <h4 class="page-title">Social Media</h4>

            <span class="add_button ms-3">
                <a href="social_media_add.php" class="btn btn-sm btn-primary">
                    Add New
                </a>
            </span>

            <div class="ms-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Social Media</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- =========================
     TABLE
========================= -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm">

                <div class="card-body">
                    <h4 class="box-title">Social Media List</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Type</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) {

                                    $thumbnail = getThumbnail($row['url']);
                                ?>

                                    <tr>

                                        <!-- ID -->
                                        <td><?php echo $i++; ?></td>

                                        <!-- THUMBNAIL -->
                                        <td>
                                            <?php if ($thumbnail != '') { ?>
                                                <img src="<?php echo $thumbnail; ?>"
                                                    width="120"
                                                    style="border-radius:8px;">
                                            <?php } else { ?>
                                                <span>No Preview</span>
                                            <?php } ?>
                                        </td>

                                        <!-- TYPE -->
                                        <td>
                                            <?php if ($row['type'] == 'reel') { ?>
                                                <span class="badge bg-danger">Reel</span>
                                            <?php } else { ?>
                                                <span class="badge bg-primary">Post</span>
                                            <?php } ?>
                                        </td>

                                        <!-- URL -->
                                        <td>
                                            <a href="<?php echo $row['url']; ?>" target="_blank">
                                                Open Link
                                            </a>
                                        </td>

                                        <!-- STATUS -->
                                        <td>
                                            <?php if ($row['status'] == 1) { ?>
                                                <a href="?type=status&operation=deactive&id=<?php echo $row['id']; ?>"
                                                    class="badge bg-success">
                                                    Active
                                                </a>
                                            <?php } else { ?>
                                                <a href="?type=status&operation=active&id=<?php echo $row['id']; ?>"
                                                    class="badge bg-secondary">
                                                    Deactive
                                                </a>
                                            <?php } ?>
                                        </td>

                                        <!-- ACTIONS -->
                                        <td>

                                            <a href="social_media_add.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <a href="?type=delete&id=<?php echo $row['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </a>

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

<!-- =========================
     SCRIPTS
========================= -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>

<script>
    $(".table").DataTable();
</script>

</body>

</html>