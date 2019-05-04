<?php include"../header.php"; include"../nav.php"; include"functions.php"; ?> 
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
	
	<?php
	require_once"../product/functions.php";
	if(isset($_POST['tl_submit'])) {
		$user_id = $_SESSION['user_id'];
		$fb_id = $_POST['fb_id'];
		$fb_dname = $_POST['fb_dname'];
		$fb_dfamily = $_POST['fb_dfamily'];
		$fb_mellicode = $_POST['fb_mellicode'];
		$fb_mobile = $_POST['fb_mobile'];
		$fb_car = $_POST['fb_car'];
		$fb_plaque = $_POST['fb_plaque'];
		$sql = "update factor_body set fb_dname = '$fb_dname', fb_dfamily = '$fb_dfamily', fb_mellicode = '$fb_mellicode', fb_car = '$fb_car', fb_plaque = '$fb_plaque', fb_mobile = '$fb_mobile' where fb_id = $fb_id";
		ex_query($sql);
	}
	
	if(isset($_POST['confirm_bar'])) {
		$fb_id = $_POST['confirm_bar'];
		$sql = "update factor_body set fb_exit_bar = '1' where fb_id = $fb_id";
		ex_query($sql);
	}
	?>
	
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
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$sql = "select * from factor_body where factor_body.fb_exit_doc = 1";
							$res = get_select_query($sql);
							foreach ($res as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo get_product_name($row['p_id']); ?></td>
									<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
									<td>
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#selectdriver<?php echo $i; ?>">
											انتخاب راننده
										</button>
									</td>
									<td>
										<a class="btn btn-info btn-sm" href="print-transfer-form.php?fb_id=<?php echo $row['fb_id']; ?>">چاپ حواله خروج</a>
										<?php
										$fb_exit_bar = $row['fb_exit_bar'];
										if($fb_exit_bar==0){ ?>
										<form style="display: inline-block" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
											<button value="<?php echo $row['fb_id']; ?>" name="confirm_bar" class="btn btn-success btn-sm">تایید انجام بارگیری</button>
										</form>
										<?php
										} else {
											?>
											<button class="btn btn-danger btn-sm disabled">بار خارج شده</button>
											<?php
										} ?>
									</td>
								</tr>
								<div class="modal fade" role="dialog" id="selectdriver<?php echo $i; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">مشخصات راننده</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<form action="" method="post">
													<label>نام</label>
													<input class="form-control" value="<?php echo $row['fb_dname']; ?>" type="text" name="fb_dname" placeholder="نام" required/><br/>
													<label>نام خانوادگی</label>
													<input class="form-control" value="<?php echo $row['fb_dfamily']; ?>" type="text" name="fb_dfamily" placeholder="نام خانوادگی" required/><br/>
													<label>کد ملی</label>
													<input class="form-control" value="<?php echo $row['fb_mellicode']; ?>" type="text" name="fb_mellicode" placeholder="کد ملی" required/><br/>
													<label>شماره موبایل</label>
													<input class="form-control" value="<?php echo $row['fb_mobile']; ?>" type="text" name="fb_mobile" placeholder="شماره موبایل" required/><br/>
													<label>خودرو</label>
													<input class="form-control" value="<?php echo $row['fb_car']; ?>" type="text" name="fb_car" placeholder="خودرو" required/><br/>
													<label>شماره پلاک</label>
													<input class="form-control" value="<?php echo $row['fb_plaque']; ?>" type="text" name="fb_plaque" placeholder="شماره پلاک" required/><br/>
													
													<input class="hidden" type="text" name="fb_id" id="fb_id" value="<?php echo $row['fb_id']; ?>"/>
													<input type="submit" class="btn btn-success" name="tl_submit" value="ثبت">
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
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