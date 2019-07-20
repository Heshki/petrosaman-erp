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
		$dr_id = $_POST['dr_id'];
		$sql = "update factor_body set dr_id = $dr_id where fb_id = $fb_id";
		ex_query($sql);
	}

	if(isset($_POST['confirm_bar'])) {
		$fb_id = $_POST['confirm_bar'];
		$sql = "update factor_body set fb_exit_bar = '1' where fb_id = $fb_id";
		ex_query($sql);
		insert_bar_bring_factor($fb_id);
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
									<th>شماره ردیف</th>
									<th>نام محصول</th>
									<th>مقدار</th>
									<th>نام و نام خانوادگی راننده</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$sql = "select * from factor_body where factor_body.fb_exit_doc = 1 order by fb_id desc";
							$res = get_select_query($sql);
							foreach ($res as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo get_product_name($row['p_id']); ?></td>
									<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
									<td>
									<?php
									$driver_choose = driver_choose($row['fb_id']);
									if($driver_choose > 0) { ?>
										<button class="btn btn-sm btn-success disabled">راننده انتخاب شده</button>
									<?php
									} else { ?>
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#selectdriver<?php echo $i; ?>">
											انتخاب راننده
										</button>
									<?php
									}
									?>
									</td>
									<td>
										<a class="btn btn-info btn-sm" href="print-transfer-form.php?fb_id=<?php echo $row['fb_id']; ?>">چاپ حواله خروج</a>
										<?php
										$fb_exit_bar = $row['fb_exit_bar'];
										$fb_id = $row['fb_id'];
										$dr_id = check_dr($fb_id);
										if($fb_exit_bar == 0 && $dr_id > 0){ ?>
										<form style="display: inline-block" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
											<button value="<?php echo $row['fb_id']; ?>" name="confirm_bar" class="btn btn-success btn-sm">تایید انجام بارگیری</button>
										</form>
										<?php
										} elseif(!$dr_id) {
											?>
											<button class="btn btn-danger btn-sm disabled">راننده انتخاب نشده </button>
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
													<label> مشخصات راننده</label>
													<select name="dr_id">
														<?php
														$res1 = drivers();
														if(count($res1) > 0){
															foreach ($res1 as $row1) { ?>
																<option value="<?php echo $row1['dr_id']; ?>"><?php echo $row1['dr_name'] . " " . $row1['dr_family'] . " (" . $row1['dr_car'] . " (" . $row1['dr_plaque'] . ")) "; ?></option>
															<?php
															}
														} else { ?>
															<option class="bg-danger">راننده ای در لیست وجود ندارد</option>
														<?php
														}
														?>
													</select>
													<input type="hidden" name="fb_id" id="fb_id" value="<?php echo $row['fb_id']; ?>"/>
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
