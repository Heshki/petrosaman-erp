<?php $title = 'لیست مشتریان'; include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_customer();
?>
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">لیست مشتریان</li>
		  </ol>
		</section>

		<section class="content-header">
			<h1>لیست مشتریان</h1>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">لیست مشتریان</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>شماره مشتری</th>
						<th>نام و نام خانوادگی</th>
						<th>نام شرکت</th>
						<th>مشتری یا تامین کننده</th>
						<th>عملیات</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach ($asb as $a ) {
						?>
					  <tr>
						<td><?php echo $a['c_id']; ?></td>
						<td><?php echo $a['c_name'] . " " . $a['c_family']; ?></td>
						<td><?php echo $a['c_company']; ?></td>
						<td><?php echo $a['c_customertype']; ?></td>
						<td>
							<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
								<a href="show-customer.php?id=<?php echo $a['c_id']; ?>">مشاهده</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
								<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['c_id']; ?>">
								<?php
									if(isset($_POST['delete-list'])){
										$c_id = $_POST['delete-text'];
										delete_customer($c_id);
										echo "<meta http-equiv='refresh' content='0'/>";
										exit();
									}
								?>
							</form>
						</td>
					  </tr>
						<?php } ?>
					</tbody>
					<tfoot>
					  <tr>
						<th>شماره مشتری</th>
						<th>نام و نام خانوادگی</th>
						<th>نام شرکت</th>
						<th>مشتری یا تامین کننده</th>
						<th>عملیات</th>
					  </tr>
					</tfoot>
				  </table>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
			</div><!-- /.col -->
		  </div><!-- /.row -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  <div class="control-sidebar-bg"></div>
	</div><!-- ./wrapper -->
	<!-- jQuery 2.1.4 -->
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.4 -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="../plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../dist/js/demo.js"></script>
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
