<?php
require('../include/top.inc.php');

isAdmin();

// Handle status or delete operations if needed
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM appointments WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

// Fetch all appointments
$sql = "SELECT * FROM appointments ORDER BY appointment_date DESC, appointment_time DESC";
$res = mysqli_query($con, $sql);
?>

<?php include("../include/head.inc.php"); ?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="margin-right:10px;">Appointments</h4>
        </div>
    </div>
</div>

<div class="container-fluid" style="height: calc(100vh - 120px);">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Appointments List</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table table-bordered" id="appointments_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Treatment</th>
                                    <th>Date</th>
                                    <th>Time</th>
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
                                        <td><?php echo $row['treatment']; ?></td>
                                        <td><?php echo $row['appointment_date']; ?></td>
                                        <td><?php echo $row['appointment_time']; ?></td>
                                        <td>
                                            <!-- View Button triggers modal -->
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#appointmentModal<?php echo $row['id']; ?>">
                                                View
                                            </button>
                                            <!-- Delete -->
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="appointmentModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="appointmentModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="appointmentModalLabel<?php echo $row['id']; ?>">Appointment Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                                                    <p><strong>Treatment:</strong> <?php echo $row['treatment']; ?></p>
                                                    <p><strong>Date:</strong> <?php echo $row['appointment_date']; ?></p>
                                                    <p><strong>Time:</strong> <?php echo $row['appointment_time']; ?></p>
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
        $('#appointments_table').DataTable();
    });
</script>
