<?php include"../header.php"; include"../nav.php";
	require_once"../customer/functions.php";
	$res = list_factor_body();

	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		update_a_row_fb_factor($verify, $fb_id_verify);
		update_a_row_log_factor($fb_id_verify, $l_details);
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

	<?php breadcrumb("لیست پیشنهادات فروش"); ?>

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
									<th>اسکن پیش فاکتور</th>
									<th>تایید ۱ مدیر</th>
									<th>ارسال مشتری</th>
									<th>تایید مشتری</th>
									<th>اسناد تایید</th>
									<th>تایید مالی</th>
									<th>تایید ۲ مدیر</th>
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
									show_btn_list_factor($row['fb_pre_invoice_scan'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_pre_invoice_scan");
									?>
									</td>
									<td>
									<?php
									if($row['fb_pre_invoice_scan'] == 1){
										show_btn_list_factor($row['fb_verify_admin1'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_admin1");
									}else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_verify_admin1'] == 1) {
										show_btn_list_factor($row['fb_send_customer'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_send_customer");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}

									?>
									</td>
									<td>
									<?php
									if($row['fb_send_customer'] == 1) {
										show_btn_list_factor($row['fb_verify_customer'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_customer");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_verify_customer'] == 1) {
										show_btn_list_factor($row['fb_verify_docs'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_docs");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									$fb_id = $row['fb_id'];
									$m_type = "pre_invoice_sale";
									$m_name_file = "signed";
									$sql = "select * from media where bu_id = $fb_id and m_type = '$m_type' and m_name_file = '$m_name_file'";
									$ok = count(get_select_query($sql));
									if($row['fb_verify_docs'] == 1 && $ok >= 1) {
										show_btn_list_factor($row['fb_verify_finan'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_finan");
									}elseif($ok == 0) { ?>
										<button class="btn btn-sm btn-dark" disabled>اسکن</button>
									<?php
									}else{ ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_verify_finan'] == 1) {
										show_btn_list_factor($row['fb_verify_admin2'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_admin2");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_verify_admin2'] == 1) {
										show_btn_list_factor($row['fb_ready_bar'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_ready_bar");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_ready_bar'] == 1) {
										show_btn_list_factor($row['fb_get_sample'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_get_sample");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_get_sample'] == 1) {
										show_btn_list_factor($row['fb_verify_bar'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_bar");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_verify_bar'] == 1) {
										show_btn_list_factor($row['fb_exit_doc'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_exit_doc");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if($row['fb_exit_doc'] == 1) {
										show_btn_list_factor($row['fb_result_analyze'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_result_analyze");
									} else { ?>
										<button class="btn btn-sm btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<!--a class="btn btn-info btn-xs" href="edit-factor.php?id=<?php //echo $row['fb_id']; ?>">ویرایش</a-->
											<a class="btn btn-info btn-xs" href="log-factor.php?id=<?php echo $row['fb_id']; ?>">تاریخچه</a>
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
									<th>اسکن پیش فاکتور</th>
									<th>تایید ۱ مدیر</th>
									<th>ارسال مشتری</th>
									<th>تایید مشتری</th>
									<th>اسناد تایید</th>
									<th>تایید مالی</th>
									<th>تایید ۲ مدیر</th>
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
	</section>
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
