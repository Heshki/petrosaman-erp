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

									<form action="" method="post">

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
										<th>چاپ</th>
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
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectdriver<?php echo $i; ?>">
												انتخاب راننده
											</button>
										</td>
										<td>petro saman</td>
										<td><?php echo $row['c_faddress']; ?></td>
										<td><a href="print-transfer-form.php?f_id=<?php echo $row['f_id']; ?>"></a></td>
									</tr>
										<div class="modal" id="selectdriver<?php echo $i; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">مشخصات راننده</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<span>نام و نام خانوادگی</span>
														<input type="text" name="dr_name" id="dr_name" placeholder="نام و نام خانوادگی" required/><br/>
														<span>کد ملی</span>
														<input type="text" name="dr_national" id="dr_national" placeholder="کد ملی" required/><br/>
														<span>شماره موبایل</span>
														<input type="text" name="dr_mobile" id="dr_mobile" placeholder="شماره موبایل" required/><br/>
														<span>شماره پلاک</span>
														<input type="text" name="dr_plaque" id="dr_plaque" placeholder="شماره پلاک" required/><br/>
														<input class="hidden" type="text" name="fb_id" id="fb_id" value="<?php echo $row['fb_id']; ?>"/>
													</div>
													<div class="modal-footer">
														<button type="submit" id="close-sub" class="btn btn-success" name="tl_submit">ثبت</button>
													</div>
												</div>
											</div>
										</div>
								

										<?php
										$i++;
									}
									?>
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
										<th>چاپ</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>		
			</form>
	</div>


	<?php
	if(isset($_POST['tl_submit'])) {
		$user_id = 1;
		$fb_id = $_POST['fb_id'];
		$dr_name = $_POST['dr_name'];
		$dr_national = $_POST['dr_national'];
		$dr_mobile = $_POST['dr_mobile'];
		$dr_plaque = $_POST['dr_plaque'];
		$array = array();
		array_push($array, $user_id);
		array_push($array, $fb_id);
		array_push($array, $dr_name);
		array_push($array, $dr_national);
		array_push($array, $dr_mobile);
		array_push($array, $dr_plaque);
		insert_transfer_list($array);
	}
	?>



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