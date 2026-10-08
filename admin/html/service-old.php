<?php
require('../include/top.inc.php');

isAdmin();

$department_id = '';
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

$department_res = mysqli_query($con, "SELECT * FROM departments WHERE status=1 ORDER BY department_name ASC");

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $image_required = '';

    $res = mysqli_query($con, "SELECT * FROM services WHERE id='$id'");

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        $department_id = $row['department_id'];
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

    $department_id = get_safe_value($con, $_POST['department_id']);
    $title = get_safe_value($con, $_POST['title']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $description = get_safe_value($con, $_POST['description']);
    $url = get_safe_value($con, $_POST['url']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);

    function clean_filename($filename)
    {
        return preg_replace('/[^A-Za-z0-9.\-_]/', '_', $filename);
    }

    if (!empty($_FILES['image']['name'])) {
        $clean_image = clean_filename($_FILES['image']['name']);
        $image = rand(111111111, 999999999) . '_' . $clean_image;
        move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/service/" . $image);
    }

    if (!empty($_FILES['icon']['name'])) {
        $clean_icon = clean_filename($_FILES['icon']['name']);
        $icon = rand(111111111, 999999999) . '_' . $clean_icon;
        move_uploaded_file($_FILES['icon']['tmp_name'], "../../uploads/service/" . $icon);
    }

    if (isset($_GET['id']) && $_GET['id'] != '') {

        $update_query = "
            UPDATE services SET
            department_id='$department_id',
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

        mysqli_query($con, "
            INSERT INTO services
            (department_id, title, short_description, image, icon, image_alt_tag, description, url, meta_title, meta_keyword, meta_desc)
            VALUES
            ('$department_id','$title','$short_description','$image','$icon','$image_alt_tag','$description','$url','$meta_title','$meta_keyword','$meta_desc')
        ");
    }

    header('location:manage_service.php');
    die();
}
?>

<?php include("../include/head.inc.php"); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Service</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Service
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 m-auto bg-white">
            <div class="card">
                <div class="card-header"><strong>Service Form</strong></div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Department</label>
                            <select name="department_id" required class="form-control">
                                <option value="">Select Department</option>
                                <?php while($dept = mysqli_fetch_assoc($department_res)){ ?>
                                    <option value="<?php echo $dept['id']; ?>"
                                        <?php if($department_id == $dept['id']) echo 'selected'; ?>>
                                        <?php echo $dept['department_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" required class="form-control" value="<?php echo $title; ?>">
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <input type="text" name="short_description" required class="form-control" value="<?php echo $short_description; ?>">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" <?php echo $image_required; ?>>
                        </div>

                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" name="icon" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Image Alt Tag</label>
                            <input type="text" name="image_alt_tag" required class="form-control" value="<?php echo $image_alt_tag; ?>">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editor1" class="form-control"><?php echo $description; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url" required class="form-control" value="<?php echo $url; ?>">
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="<?php echo $meta_title; ?>">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_desc" class="form-control" value="<?php echo $meta_desc; ?>">
                        </div>

                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control" value="<?php echo $meta_keyword; ?>">
                        </div>

                        <button name="submit" type="submit" class="btn btn-info btn-block">
                            Submit
                        </button>

                        <div class="field_error"><?php echo $msg; ?></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckfinder/ckfinder.js"></script>
<script>
    var editor = CKEDITOR.replace('editor1');
    CKFinder.setupCKEditor(editor);
</script>
</body>
</html>