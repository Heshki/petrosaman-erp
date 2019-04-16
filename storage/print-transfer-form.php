<?php $title = 'چاپ فرم حواله خروج'; include"../header.php"; include"../nav.php"; include"functions.php";
$tl_id = $_GET['tl_id']; 
$res = form_exit_doc($tl_id);
?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">انبار</a></li>
				<li class="active">چاپ فرم حواله خروج</li>
			</ol>
		</section>
		
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">چاپ فرم حواله خروج</h1>
					</div>
				</div>
			</div>
		</section>
		<div class="col-xs-3"></div>
		<section class="col-xs-6" id="trasfer-form">
			
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">پترو سامان</h3>
				</div>
				<div class="box-body no-padding">
					<table class="table table-condensed">
						<tr>
							<th colspan="2" class="bold">مجوز ترخیص بار</th>
							<th colspan="2" class="bold">شماره: ۲۲۲۲</th>
						</tr>
						<tr>
							<td class="bold">مشتری</td>
							<td class="bold">امیرعلی</td>
							<td class="bold">تاریخ</td>
							<td class="bold">۱۳۹۷/۰۸/۱۲</td>
						</tr>
						<tr>
							<td class="bold">ردیف</td>
							<td class="bold">شرح کالا</td>
							<td class="bold">وزن</td>
							<td class="bold">بسته بندی</td>
						</tr>
						<?php
						$i=1;
						foreach ($res as $row) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>شرح کالا</td>
							<td>وزن</td>
							<td>بسته بندی</td>
						</tr>
						<?php
						$i++;
						}
						?>
					</table>
				</div>
			</div>

		</section>
		<div class="col-xs-3"></div>
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