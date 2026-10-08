<?php
require('../include/top.inc.php');

isAdmin();

// Status and Delete Operations
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    // Change Status
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        $status = ($operation == 'active') ? 1 : 0;

        mysqli_query($con, "UPDATE departments SET status='$status' WHERE id='$id'");
        header('location:manage_departments.php');
        die();
    }

    // Delete Department
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);

        mysqli_query($con, "DELETE FROM departments WHERE id='$id'");
        header('location:manage_departments.php');
        die();
    }
}

// Fetch Departments
$res = mysqli_query($con, "SELECT * FROM departments ORDER BY id DESC");
?>

<?php include("../include/head.inc.php"); ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Categories</h4>
            <span class="add_button">
                <a href="department.php" class="btn btn-sm btn-primary">Add Category</a>
            </span>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Manage Categories</strong>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['slug']; ?></td>
                            <td><?php echo $row['description']; ?></td>

                            <td>
                                <?php if ($row['status'] == 1) { ?>
                                    <a href="?type=status&operation=deactive&id=<?php echo $row['id']; ?>">Active</a>
                                <?php } else { ?>
                                    <a href="?type=status&operation=active&id=<?php echo $row['id']; ?>">Deactive</a>
                                <?php } ?>
                            </td>

                            <td>
                                <a href="department.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="?type=delete&id=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>