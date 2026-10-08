<?php
require('../include/top.inc.php');

isAdmin();

$title = '';
$short_description = '';
$image = '';
$icon = '';
$image_alt_tag = "";
$description = '';
$url = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = "";
$image_required = "required";

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $image_required = '';

    $res = mysqli_query($con, "SELECT * FROM services WHERE id='$id'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $short_description = $row['short_description'];
        $image = $row['image'];
        $icon = $row['icon'];
        $image_alt_tag = $row['image_alt_tag'];
        $description = $row['description'];
        $url = $row['url'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header('location:manage_service.php');
        die();
    }
}

if (isset($_POST['submit'])) {

    $title = get_safe_value($con, $_POST['title']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $description = get_safe_value($con, $_POST['description']);
    $url = get_safe_value($con, $_POST['url']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);

    // Allowed types
    $allowed_types = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp', 'image/svg+xml'];

    // Validate image
    if (!empty($_FILES['image']['name']) && !in_array($_FILES['image']['type'], $allowed_types)) {
        $msg = "Please upload PNG, JPG, WEBP or JPEG format only for Image.";
    }

    // Validate icon
    if (!empty($_FILES['icon']['name']) && !in_array($_FILES['icon']['type'], $allowed_types)) {
        $msg = "Please upload PNG, JPG, WEBP or JPEG format only for Icon.";
    }

    if ($msg == '') {

        // Update existing
        if (isset($_GET['id']) && $_GET['id'] != '') {

            function clean_filename($filename)
            {
                $filename = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $filename);
                return $filename;
            }

            if (!empty($_FILES['image']['name'])) {
                $clean_image = clean_filename($_FILES['image']['name']);
                $image = rand(111111111, 999999999) . '_' . $clean_image;

                $image = mysqli_real_escape_string($con, $image);
                move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/service/" . $image);
            }

            if (!empty($_FILES['icon']['name'])) {
                $clean_icon = clean_filename($_FILES['icon']['name']);
                $icon = rand(111111111, 999999999) . '_' . $clean_icon;

                $icon = mysqli_real_escape_string($con, $icon);
                move_uploaded_file($_FILES['icon']['tmp_name'], "../../uploads/service/" . $icon);
            }


            $update_query = "
                UPDATE services SET 
                title='$title',
                short_description='$short_description',
                image='$image',
                icon='$icon',
                image_alt_tag='$image_alt_tag',
                description='$description',
                url='$url',
                meta_title='$meta_title',
                meta_keyword='$meta_keyword',
                meta_desc='$meta_desc'
                WHERE id='$id'
            ";

            mysqli_query($con, $update_query);

        } else {
            
            // Insert new
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            $icon = rand(111111111, 999999999) . '_' . $_FILES['icon']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/service/" . $image);
            move_uploaded_file($_FILES['icon']['tmp_name'], "../../uploads/service/" . $icon);

            mysqli_query($con, "
                INSERT INTO services 
                (title, short_description, image, icon, image_alt_tag, description, url, meta_title, meta_keyword, meta_desc)
                VALUES ('$title','$short_description','$image','$icon','$image_alt_tag','$description','$url','$meta_title','$meta_keyword','$meta_desc')
            ");
        }

        header('location:manage_service.php');
        die();
    }
}
?>



<?php
include("../include/head.inc.php")
    ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">services</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            services
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="
    height: calc(100vh - 120px);">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class=" col-md-8 m-auto  bg-white">
            <div class="card">
                <div class="card-header"><strong>services</strong><small> Form</small></div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" required class="form-control" value="<?php echo $title; ?>">
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" name="short_description" required class="form-control"
                                value="<?php echo $short_description; ?>">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" <?php echo $image_required; ?>>

                            <?php if ($image != '') { ?>
                                <a href="../../uploads/service/<?php echo $image; ?>" target="_blank">
                                    <img src="../../uploads/service/<?php echo $image; ?>" width="150">
                                </a>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" name="icon" class="form-control">

                            <?php if ($icon != '') { ?>
                                <a href="../../uploads/service/<?php echo $icon; ?>" target="_blank">
                                    <img src="../../uploads/service/<?php echo $icon; ?>" width="150">
                                </a>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Image Alt Tag</label>
                            <input type="text" name="image_alt_tag" class="form-control" required
                                value="<?php echo $image_alt_tag; ?>">
                        </div>

                        <div class="form-group">
                            <label>Service Description</label>
                            <textarea name="description" id="editor1" class="form-control"
                                rows="10"><?php echo $description; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url" required class="form-control" value="<?php echo $url; ?>">
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="<?php echo $meta_title; ?>">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_desc" class="form-control" value="<?php echo $meta_desc; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control"
                                value="<?php echo $meta_keyword; ?>">
                        </div>

                        <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                            Submit
                        </button>

                        <div class="field_error"><?php echo $msg; ?></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!-- this page js -->
<script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
</script>
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckfinder/ckfinder.js"></script>
<script>
    var editor = CKEDITOR.replace('editor1');
    CKFinder.setupCKEditor(editor);
</script>
</body>

</html>