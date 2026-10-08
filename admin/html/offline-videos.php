<?php
require('../include/top.inc.php');
isAdmin();

$title = '';
$description = '';
$video = '';
$video_alt_tag = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';
$video_required = "required";

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $video_required = '';

    $res = mysqli_query($con, "SELECT * FROM offline_videos WHERE id='$id'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $description = $row['description'];
        $video = $row['video'];
        $video_alt_tag = $row['video_alt_tag'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header('location:manage_offline_videos.php');
        die();
    }
}

if (isset($_POST['submit'])) {

    $title = get_safe_value($con, $_POST['title']);
    $description = get_safe_value($con, $_POST['description']);
    $video_alt_tag = get_safe_value($con, $_POST['video_alt_tag']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

    // Allowed video types (Reels)
    $allowed_types = ['video/mp4', 'video/webm', 'video/ogg'];

    if (!empty($_FILES['video']['name']) && !in_array($_FILES['video']['type'], $allowed_types)) {
        $msg = "Please upload MP4, WEBM or OGG video only.";
    }

    if ($msg == '') {

        function clean_filename($filename)
        {
            return preg_replace('/[^A-Za-z0-9.\-_]/', '_', $filename);
        }

        if (!empty($_FILES['video']['name'])) {
            $clean_video = clean_filename($_FILES['video']['name']);
            $video = rand(111111111, 999999999) . '_' . $clean_video;
            move_uploaded_file($_FILES['video']['tmp_name'], "../../uploads/offline-videos/" . $video);
        }

        if (isset($_GET['id']) && $_GET['id'] != '') {

            mysqli_query($con, "
                UPDATE offline_videos SET
                title='$title',
                description='$description',
                video='$video',
                video_alt_tag='$video_alt_tag',
                meta_title='$meta_title',
                meta_desc='$meta_desc',
                meta_keyword='$meta_keyword'
                WHERE id='$id'
            ");

        } else {

            mysqli_query($con, "
                INSERT INTO offline_videos
                (title, description, video, video_alt_tag, meta_title, meta_desc, meta_keyword)
                VALUES
                ('$title','$description','$video','$video_alt_tag','$meta_title','$meta_desc','$meta_keyword')
            ");
        }

        header('location:manage_offline_videos.php');
        die();
    }
}
?>


<?php include("../include/head.inc.php"); ?>

<!-- ============================================================== -->
<!-- Bread crumb -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Offline Videos</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="manage_offline_videos.php">Offline Videos</a></li>
                        <li class="breadcrumb-item active">Add / Edit Video</li>
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
                <div class="card-header">
                    <strong>Offline Video</strong>
                    <small> Form</small>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">

                        <!-- Title -->
                        <div class="form-group">
                            <label>Video Title</label>
                            <input type="text" name="title" required class="form-control" value="<?php echo $title; ?>">
                        </div>

                        <!-- Video Upload -->
                        <div class="form-group">
                            <label>Upload Reel Video (9:16)</label>
                            <input type="file" name="video" class="form-control" <?php echo $video_required; ?>>

                            <?php if ($video != '') { ?>
                                <video width="200" height="350" controls style="margin-top:10px;">
                                    <source src="../../uploads/offline-videos/<?php echo $video; ?>" type="video/mp4">
                                </video>
                            <?php } ?>
                        </div>

                        <!-- Video Alt Tag -->
                        <div class="form-group">
                            <label>Video Alt Tag</label>
                            <input type="text" name="video_alt_tag" class="form-control"
                                value="<?php echo $video_alt_tag; ?>">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor1" class="form-control"
                                rows="6"><?php echo $description; ?></textarea>
                        </div>

                        <!-- Meta Title -->
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="<?php echo $meta_title; ?>">
                        </div>

                        <!-- Meta Description -->
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_desc" class="form-control" value="<?php echo $meta_desc; ?>">
                        </div>

                        <!-- Meta Keywords -->
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keyword" class="form-control"
                                value="<?php echo $meta_keyword; ?>">
                        </div>

                        <!-- Submit -->
                        <button type="submit" name="submit" class="btn btn-info btn-lg btn-block">
                            Submit
                        </button>

                        <!-- Error -->
                        <div class="field_error" style="color:red; margin-top:10px;">
                            <?php echo $msg; ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../dist/js/custom.min.js"></script>

<!-- CK Editor -->
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckfinder/ckfinder.js"></script>
<script>
    var editor = CKEDITOR.replace('editor1');
    CKFinder.setupCKEditor(editor);
</script>

</body>

</html>