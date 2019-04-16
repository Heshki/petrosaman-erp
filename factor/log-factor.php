<?php $title = 'تاریخچه فاکتور ها'; include"../header.php"; include"../nav.php"; include"functions.php";
	$res = list_factor_body();
?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">فاکتور </a></li>
				<li class="active">تاریخچه فاکتور ها</li>
			</ol>
		</section>
		
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">لیست تاریخچه فاکتور ها</h1>
					</div>
				</div>
			</div>
		</section>

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
										<th>کد کاربر</th>
										<th>تاریخ انجام عملیات</th>
										<th>ساعت انجام عملیات</th>
										<th>شماره فاکتور</th>
										<th>توضیحات تاریخچه</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res = list_factor_log();
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['l_id']; ?></td>
										<td><?php echo $row['u_id']; ?></td>
										<td><?php echo $row['l_date']; ?></td>
										<td><?php echo $row['l_time']; ?></td>
										<td><?php echo $row['f_id']; ?></td>
										<td><?php echo $row['l_text']; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a href="edit-product.php?id=<?php echo $row['fb_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
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
										<th>کد کاربر</th>
										<th>تاریخ انجام عملیات</th>
										<th>ساعت انجام عملیات</th>
										<th>شماره فاکتور</th>
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