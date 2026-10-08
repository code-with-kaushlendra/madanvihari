<?php
require('../include/top.inc.php');

isAdmin();
if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'status') {
		$operation = get_safe_value($con, $_GET['operation']);
		$id = get_safe_value($con, $_GET['id']);
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$update_status_sql = "update blogs set status='$status' where id='$id'";
		mysqli_query($con, $update_status_sql);
	}

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from blogs where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select * from blogs ";
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
				<h4 class="page-title" style="margin-right:10px;"> Blog </h4>
				<span class=" add_button"> <a href="blog.php" class="btn btn-sm btn-primary"> Add Blog</a></span>
				<div class="ms-auto text-end">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index ">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								Blog
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
						<h4 class="box-title">Add Blog </h4>
						<!-- <h4 class="box-link"><a href="manage_banner.php">Add Banner</a> </h4> -->
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>Blog Title</th>
										<th>Blog Short Description</th>
										<!-- <th>Category</th> -->
										<th>Blog Image</th>
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
											<td><?php echo $row['title'] ?></td>
											<td><?php echo $row['short_description'] ?></td>

											<td>
												<?php

												echo "<a target='_blank' href='" . "../../uploads/blogs/" . $row['image'] . "'><img width='150px' src='" . "../../uploads/blogs/" . $row['image'] . "'/></a>";
												?>
											</td>
											<td>
												<?php
												if ($row['status'] == 1) {
													echo "<span class='badge1 badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
												} else {
													echo "<span class='badge1 badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
												}
												echo "<span class='badge1 badge-edit'><a href='blog.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";

												echo "<span class='badge1 badge-delete'><a href='javascript:void(0);' onclick=\"confirmDelete('?type=delete&id=" . $row['id'] . "')\">Delete</a></span>";
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
 <script>
    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this item?')) {
            window.location.href = url;
        }
    }
</script>
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