<?php
require('../include/top.inc.php');
isAdmin();

$title = '';
$short_description = '';
$image = '';
$status = 1;

$msg = '';
$image_required = 'required';

// ------------------ EDIT MODE ------------------
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $image_required = '';

    $res = mysqli_query($con, "SELECT * FROM gallery WHERE id='$id'");
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $short_description = $row['short_description'];
        $image = $row['image'];
        $status = $row['status'];
    } else {
        header('location:manage_gallery.php');
        die();
    }
}

// ------------------ SUBMIT FORM ------------------

if (isset($_POST['submit'])) {

    $title = get_safe_value($con, $_POST['title']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $status = $_POST['status'];

    // Validate image type
    if ($_FILES['image']['name'] != '') {
        if (
            $_FILES['image']['type'] != 'image/png' &&
            $_FILES['image']['type'] != 'image/jpg' &&
            $_FILES['image']['type'] != 'image/jpeg' &&
            $_FILES['image']['type'] != 'image/webp'
        ) {
            $msg = "Please upload only PNG, JPG, JPEG, or WEBP format";
        }
    }

    if ($msg == '') {

        // ---------- UPDATE ----------
        if (isset($_GET['id']) && $_GET['id'] != '') {

            if ($_FILES['image']['name'] != '') {
                // Upload new file
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/gallery/" . $image);

                mysqli_query($con, "UPDATE gallery SET 
                    title='$title',
                    short_description='$short_description',
                    image='$image',
                    status='$status'
                WHERE id='$id'");
            } else {
                // No image update
                mysqli_query($con, "UPDATE gallery SET 
                    title='$title',
                    short_description='$short_description',
                    status='$status'
                WHERE id='$id'");
            }

        } else {

            // ---------- INSERT ----------
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/gallery/" . $image);

            mysqli_query($con, "INSERT INTO gallery(title, image, short_description, status)
                VALUES ('$title', '$image', '$short_description', '$status')");
        }

        header('location:manage_gallery.php');
        die();
    }
}
?>

<?php include("../include/head.inc.php") ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Gallery</h4>
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
        <div class="col-md-8 m-auto bg-white">
            <div class="card">
                <div class="card-header"><strong>Gallery</strong> <small>Form</small></div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label class="form-control-label">Title</label>
                            <input type="text" name="title" placeholder="Enter Title" class="form-control" required value="<?php echo $title ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Short Description</label>
                            <input type="text" name="short_description" placeholder="Enter Short Description" class="form-control" required value="<?php echo $short_description ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Image</label>
                            <input type="file" name="image" class="form-control" <?php echo $image_required ?>>
                            <?php if ($image != '') { ?>
                                <a target="_blank" href="<?php echo '../../uploads/gallery/' . $image ?>">
                                    <img width="150px" src="<?php echo '../../uploads/gallery/' . $image ?>" />
                                </a>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php if ($status == 1) echo "selected"; ?>>Active</option>
                                <option value="0" <?php if ($status == 0) echo "selected"; ?>>Inactive</option>
                            </select>
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

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
