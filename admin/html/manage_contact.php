<?php
require('../include/top.inc.php');
isAdmin();

// Handle delete operation
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM contacts WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

// Fetch all contact submissions
$sql = "SELECT * FROM contacts ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php"); ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Contact Submissions</h4>
        </div>
    </div>
</div>

<div class="container-fluid" style="height: calc(100vh - 120px);">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Contact List</h4>
                </div>
                <div class="card-body--">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="contacts_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo substr($row['message'], 0, 30) . '...'; ?></td>
                                        <td>
                                            <!-- View Button triggers modal -->
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#contactModal<?php echo $row['id']; ?>">
                                                View
                                            </button>
                                            <!-- Delete -->
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="contactModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="contactModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="contactModalLabel<?php echo $row['id']; ?>">Contact Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                                                    <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contacts_table').DataTable({
            "order": [[0, "desc"]]
        });
    });
</script>
