<?php
require('../include/top.inc.php');

isAdmin();

$title = '';
$video_url = '';
$short_description = '';
$status = '1';
$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * FROM videos WHERE id='$id'");
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $video_url = $row['video_url'];
        $short_description = $row['short_description'];
        $status = $row['status'];
    } else {
        header('location:manage_videos.php');
        die();
    }
}

if (isset($_POST['submit'])) {

    $title = get_safe_value($con, $_POST['title']);
    $video_url = get_safe_value($con, $_POST['video_url']);
    $short_description = get_safe_value($con, $_POST['short_description']);

    // Validate YouTube URL format
    if (!preg_match("/(youtube\.com|youtu\.be)/", $video_url)) {
        $msg = "Please enter a valid YouTube video URL.";
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {

            $update_query = "UPDATE videos SET 
                title='$title',
                video_url='$video_url',
                short_description='$short_description'
                WHERE id='$id'";

            mysqli_query($con, $update_query);

        } else {

            $insert_query = "INSERT INTO videos (title, video_url, short_description, status) 
                             VALUES ('$title', '$video_url', '$short_description', 1)";

            mysqli_query($con, $insert_query);
        }

        header('location:manage_videos.php');
        die();
    }
}

include("../include/head.inc.php");
?>

<!-- ============================================================== -->
<!-- Breadcrumb -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Videos</h4>
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
        <div class="col-md-8 m-auto bg-white">
            <div class="card">
                <div class="card-header"><strong>Videos</strong><small> Form</small></div>
                <form method="post">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label class="form-control-label">Video Title</label>
                            <input type="text" name="title" placeholder="Enter Video Title" class="form-control" required value="<?php echo $title ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">YouTube Video URL</label>
                            <input type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=xxxx" class="form-control" required value="<?php echo $video_url ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Short Description</label>
                            <textarea class="form-control" name="short_description" rows="4" placeholder="Enter Short Description"><?php echo $short_description ?></textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                            Submit
                        </button>

                        <div class="field_error"><?php echo $msg ?></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/custom.min.js"></script>

</body>
</html>
