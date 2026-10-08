<?php
require('../include/top.inc.php');

isAdmin();

$department_name = '';
$slug = '';
$description = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);

    $res = mysqli_query($con, "SELECT * FROM departments WHERE id='$id'");

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        $department_name = $row['name'];
        $slug = $row['slug'];
        $description = $row['description'];
    } else {
        header('location:manage_department.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $department_name = get_safe_value($con, $_POST['department_name']);
    $slug = get_safe_value($con, $_POST['slug']);
    $description = get_safe_value($con, $_POST['description']);

    if (isset($_GET['id']) && $_GET['id'] != '') {
        mysqli_query($con, "
            UPDATE departments SET
            name='$department_name',
            slug='$slug',
            description='$description'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($con, "
            INSERT INTO departments
            (name, slug, description)
            VALUES
            ('$department_name','$slug','$description')
        ");
    }

    header('location:manage_department.php');
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
            <h4 class="page-title">Department</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Department
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
                <div class="card-header">
                    <strong>Department Form</strong>
                </div>

                <form method="post">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" name="department_name" required class="form-control"
                                value="<?php echo $department_name; ?>">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" required class="form-control"
                                value="<?php echo $slug; ?>">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-info btn-block">
                            Submit
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>