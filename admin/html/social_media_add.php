<?php
require('../include/top.inc.php');
isAdmin();

$type = '';
$url = '';
$msg = '';

/* =========================
   EDIT MODE
========================= */
if (isset($_GET['id']) && $_GET['id'] != '') {

    $id = get_safe_value($con, $_GET['id']);

    $res = mysqli_query($con, "SELECT * FROM social_media WHERE id='$id'");
    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);
        $type = $row['type'];
        $url = $row['url'];
    } else {
        header('location:manage_social_media.php');
        die();
    }
}

/* =========================
   FORM SUBMIT
========================= */
if (isset($_POST['submit'])) {

    $type = get_safe_value($con, $_POST['type']);
    $url = get_safe_value($con, $_POST['url']);

    /* Validation */
    if ($type == '') {
        $msg = "Please select type (Reel/Post).";
    } elseif (!preg_match("/^https?:\/\/(www\.)?instagram\.com\/(reel|p)\//", $url)) {
        $msg = "Please enter a valid Instagram Reel/Post URL.";
    }

    /* Insert / Update */
    if ($msg == '') {

        if (isset($_GET['id']) && $_GET['id'] != '') {

            mysqli_query($con, "UPDATE social_media SET 
                type='$type',
                url='$url'
                WHERE id='$id'");
        } else {

            mysqli_query($con, "INSERT INTO social_media 
                (type, url, status) 
                VALUES 
                ('$type', '$url', 1)");
        }

        header('location:social_media_manage.php');
        die();
    }
}

include("../include/head.inc.php");
?>

<!-- =========================
     PAGE UI
========================= -->

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h4 class="page-title">Social Media</h4>
            <div class="ms-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Social Media</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="min-height: calc(100vh - 120px);">
    <div class="row">
        <div class="col-md-6 m-auto">

            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <strong>Social Media</strong> <small>Form</small>
                </div>

                <form method="post">
                    <div class="card-body">

                        <!-- TYPE -->
                        <div class="form-group mb-3">
                            <label>Type</label>
                            <select name="type" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="reel" <?php if ($type == 'reel') echo 'selected'; ?>>Reel</option>
                                <option value="post" <?php if ($type == 'post') echo 'selected'; ?>>Post</option>
                            </select>
                        </div>

                        <!-- URL -->
                        <div class="form-group mb-3">
                            <label>Instagram URL</label>
                            <input type="text"
                                name="url"
                                class="form-control"
                                placeholder="https://www.instagram.com/reel/XXXX/"
                                value="<?php echo $url; ?>"
                                required>
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit" name="submit" class="btn btn-primary w-100">
                            Submit
                        </button>

                        <!-- ERROR -->
                        <?php if ($msg != '') { ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $msg; ?>
                            </div>
                        <?php } ?>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- =========================
     SCRIPTS
========================= -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/custom.min.js"></script>

</body>

</html>