<?php $title = 'لیست حواله خروج ها'; include"../header.php"; include"../nav.php"; include"functions.php"; ?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">انبار</a></li>
				<li class="active">لیست حواله خروج ها</li>
			</ol>
		</section>
		
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">لیست حواله خروج ها</h1>
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
										<th>شماره فاکتور</th>
										<th>نام محصول</th>
										<th>مقدار</th>
										<th>نام و نام خانوادگی راننده</th>
										<th>مبدا</th>
										<th>مقصد</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res = list_exit_doc();
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['f_id']; ?></td>
										<td><?php echo $row['p_name']; ?></td>
										<td><?php echo $row['fb_quantity']; ?></td>
										<td>ali</td>
										<td>petro saman</td>
										<td><?php echo $row['c_faddress']; ?></td>
									</tr>
									<?php
										$i++;
									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>شماره فاکتور</th>
										<th>نام محصول</th>
										<th>مقدار</th>
										<th>نام و نام خانوادگی راننده</th>
										<th>مبدا</th>
										<th>مقصد</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">لیست رانندگان</h1>
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
										<th>نام و نام خانوادگی</th>
										<th>کد ملی</th>
										<th>شماره موبایل</th>
										<th>شماره پلاک</th>
										<th>تایید مشتری</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res = list_exit_doc();
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['f_id']; ?></td>
										<td><?php echo $row['c_id']; ?></td>
										<td></td>
										<td></td>
									</tr>
									<?php
										$i++;
									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>نام و نام خانوادگی</th>
										<th>کد ملی</th>
										<th>شماره موبایل</th>
										<th>شماره پلاک</th>
										<th>تایید مشتری</th>
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

	<!-- jQuery 2.1.4 -->
	<script src="<?php get_url(); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.4 -->
	<script src="<?php get_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php get_url(); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php get_url(); ?>/plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php get_url(); ?>/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php get_url(); ?>/dist/js/demo.js"></script>
	<!-- page script -->
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