<?php
$title = 'لیست محصولات'; include"../header.php"; include"../nav.php"; include"functions.php";
require_once"../customer/functions.php";
	$res = list_factor_body();
	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		update_a_row_fb($verify,$fb_id_verify);
		update_a_row_log($l_details);
	}
	if(isset($_POST['f_update'])) {
		$array = array();
		array_push($array, $_POST['p_id']);
		array_push($array, $_POST['p_name']);
		array_push($array, $_POST['p_cat']);
		array_push($array, $_POST['p_unit']);
		update_factor($array);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
?> 
<div class="content-wrapper">
	
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">محصولات</a></li>
			<li class="active">لیست محصولات</li>
		</ol>
	</section>
		
	<section class="content-header">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">لیست فاکتورها</h1>
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
									<th>فاکتور</th>
									<th>مشتری</th>
									<th>تایید ۱ مدیر</th>
									<th>ارسال مشتری</th>
									<th>تایید مشتری</th>
									<th>اسناد تایید</th>
									<th>تایید مالی</th>
									<th>تایید ۲ مدیر</th>
									<th>منتظر بارگیری</th>
									<th>آماده تحویل</th>
									<th>نمونه برداری</th>
									<th>تایید بارگیری</th>
									<th>حواله خروج</th>
									<th>نتیجه آنالیز</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
								$res = list_factor_body();
								foreach ($res as $row) {
									$fb_id = $row['fb_id'];
									?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo get_customer_name($row['c_id']); ?></td>
									<td>
									<?php
									show_btn_list($row['fb_verify_admin1'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_admin1");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_send_customer'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_send_customer");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_verify_customer'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_customer");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_verify_docs'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_docs");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_verify_finan'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_finan");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_verify_admin2'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_admin2");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_wait_bar'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_wait_bar");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_ready_bar'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_ready_bar");
									?>	
									</td>
									<td>
									<?php
									show_btn_list($row['fb_get_sample'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_get_sample");
									?>
									</td>
									<td>
									<?php
									show_btn_list($row['fb_verify_bar'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_bar");
									?>	
									</td>
									<td>
									<?php
									show_btn_list($row['fb_exit_doc'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_exit_doc");
									?>
									</td>
									<td>	
									<?php
									show_btn_list($row['fb_result_analyze'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_result_analyze");
									?>	
									</td>
									<td>
										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<a class="btn btn-info btn-xs" href="edit-factor.php?id=<?php echo $row['fb_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
											<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['fb_id']; ?>">
											<?php
											if(isset($_POST['delete-list'])){
												$p_id = $_POST['delete-text'];
												delete_product($p_id);
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
									<th>فاکتور</th>
									<th>مشتری</th>
									<th>تایید 1 مدیر</th>
									<th>ارسال مشتری</th>
									<th>تایید مشتری</th>
									<th>اسناد تایید</th>
									<th>تایید مالی</th>
									<th>تایید 2 مدیر</th>
									<th>منتظر بارگیری</th>
									<th>آماده تحویل</th>
									<th>نمونه برداری</th>
									<th>تایید بارگیری</th>
									<th>حواله خروج</th>
									<th>نتیجه آنالیز</th>
									<th>عملیات</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	s</section>
</div>
<div class="control-sidebar-bg"></div>

<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
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