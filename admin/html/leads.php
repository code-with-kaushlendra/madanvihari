<?php
require('../include/top.inc.php');

isAdmin();
if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from form where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "SELECT * from `form` order by `id` desc ";
$res = mysqli_query($con, $sql);
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
				<h4 class="page-title" style="margin-right:10px;"> Form </h4>
				<!-- <span class=" add_button"> <a href="service.php" class="btn btn-sm btn-primary"> Add Form</a></span> -->
				<div class="ms-auto text-end">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index ">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								Form
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" style=" height: calc(100vh - 120px);">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<!-- <h4 class="box-title">Add Service </h4> -->
						<!-- <h4 class="box-link"><a href="manage_banner.php">Add Banner</a> </h4> -->
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Comment</th>
										<th>Action</th>

									</tr>
								</thead>
								 
								<tbody>
									<?php
											$i = 1;
											while ($row = mysqli_fetch_assoc($res)) { ?>
										<tr>
											<td class="serial"><?php echo $i++ ?></td>
											</td>
											<td><?php echo $row['fname'] ?></td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['number'] ?></td>
											<td><?php echo $row['text'] ?></td>
											<td>
												<?php
												
												echo "<span class='badge1 badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";

												?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
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
</body>

</html>