<?php $title = 'تاریخچه فاکتور ها'; include"../header.php"; include"../nav.php"; include"functions.php"; ?> 
	<div class="content-wrapper">
		
		<?php breadcrumb("تاریخچه فاکتور"); ?>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>کد تاریخچه</th>
										<th>کاربر</th>
										<th>تاریخ و ساعت انجام</th>
										<th>کد بدنه فاکتور</th>
										<th>توضیحات تاریخچه</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(isset($_GET['id'])){
										$fb_id = $_GET['id'];
										$res = get_factor_log($fb_id);
									}
									$i = 1;
									foreach ($res as $row) {
										$u_id = $row['u_id'];
										$name = get_var_query("select u_name from user where u_id = $u_id");
										$family = get_var_query("select u_family from user where u_id = $u_id");
										?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($row['l_id']); ?></td>
										<td><?php echo $name . " " . $family; ?></td>
										<td><?php echo per_number($row['l_date']); ?></td>
										<td><?php echo per_number($row['fb_id']); ?></td>
										<td><?php echo per_number($row['l_details']); ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['l_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$l_id = $_POST['delete-text'];
													delete_factor_log($l_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
									</tr>
									<?php
										$i++;
									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>کد تاریخچه</th>
										<th>کاربر</th>
										<th>تاریخ و ساعت انجام</th>
										<th>کد بدنه فاکتور</th>
										<th>توضیحات تاریخچه</th>
										<th>عملیات</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>

	<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
	  });
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>