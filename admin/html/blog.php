<?php
require('../include/top.inc.php');
isAdmin();

// Default values
$title = '';
$short_description = '';
$image = '';
$image_alt_tag = "";
$description = '';
$blog_url = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = "";
$image_required = "required";

// ------------------- EDIT MODE -------------------
if (isset($_GET['id']) && $_GET['id'] != '') {

    $id = get_safe_value($con, $_GET['id']);
    $image_required = "";

    $res = mysqli_query($con, "SELECT * FROM blogs WHERE id='$id'");
    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $short_description = $row['short_description'];
        $image = $row['image'];
        $image_alt_tag = $row['image_alt_tag'];
        $description = $row['description'];
        $blog_url = $row['blog_url'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];

    } else {
        header("location:manage_blog.php");
        die();
    }
}

// ------------------- FORM SUBMIT -------------------
if (isset($_POST['submit'])) {

    $title = get_safe_value($con, $_POST['title']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $description = get_safe_value($con, $_POST['description']);
    $blog_url = get_safe_value($con, $_POST['blog_url']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

    // Validate image if provided
    $allowed_types = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];

    if (!empty($_FILES['image']['name'])) {
        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            $msg = "Please upload PNG, JPG, JPEG or WEBP image format only.";
        }
    }

    // Only proceed if no error
    if ($msg == "") {

        // ------------------- UPDATE BLOG -------------------
        if (isset($_GET['id']) && $_GET['id'] != '') {

            if (!empty($_FILES['image']['name'])) {

                $image = rand(111111111, 999999999) . "_" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/blogs/" . $image);
            }

            $query = "
                UPDATE blogs SET 
                    title='$title',
                    short_description='$short_description',
                    image='$image',
                    image_alt_tag='$image_alt_tag',
                    description='$description',
                    blog_url='$blog_url',
                    meta_title='$meta_title',
                    meta_desc='$meta_desc',
                    meta_keyword='$meta_keyword'
                WHERE id='$id'
            ";

            mysqli_query($con, $query);

        } else {

            // ------------------- INSERT NEW BLOG -------------------
            $image = rand(111111111, 999999999) . "_" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/blogs/" . $image);

            $query = "
                INSERT INTO blogs 
                (title, short_description, image, image_alt_tag, description, blog_url, meta_title, meta_desc, meta_keyword,status)
                VALUES 
                ('$title', '$short_description', '$image', '$image_alt_tag', '$description', '$blog_url', '$meta_title', '$meta_desc', '$meta_keyword', 1)
            ";

            mysqli_query($con, $query);
        }

        header("location:manage_blog.php");
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
            <h4 class="page-title">Blog</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Blog
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
                <div class="card-header"><strong>Blog</strong><small> Form</small></div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="title" class="form-control" required value="<?php echo $title; ?>">
                        </div>

                        <div class="form-group">
                            <label>Blog Short Description</label>
                            <input type="text" name="short_description" class="form-control" required
                                value="<?php echo $short_description; ?>">
                        </div>

                        <div class="form-group">
                            <label>Blog Image</label>
                            <input type="file" name="image" class="form-control">

                            <?php if ($image != '') { ?>
                                <a href="../../uploads/blogs/<?php echo $image; ?>" target="_blank">
                                    <img src="../../uploads/blogs/<?php echo $image; ?>" width="150">
                                </a>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Blog Image Alt Tag</label>
                            <input type="text" name="image_alt_tag" class="form-control" required
                                value="<?php echo $image_alt_tag; ?>">
                        </div>

                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea name="description" id="editor1" rows="10"
                                class="form-control"><?php echo $description; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Blog URL</label>
                            <input type="text" name="blog_url" class="form-control" required
                                value="<?php echo $blog_url; ?>">
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
                            <input type="text" name="meta_keyword" class="form-control" value="<?php echo $meta_keyword; ?>">
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