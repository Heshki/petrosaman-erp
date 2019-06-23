<?php $title = "فاکتور خرید"; include"../header.php"; include"../nav.php"; include"functions.php";
	require_once"../product/functions.php";
	
	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$bu_id_verify = $_POST['bu_id'];
		$l_details = $_POST['l_details'];
		update_a_row_bu($verify, $bu_id_verify);
		update_a_row_log($bu_id_verify, $l_details);
	}
?> 
<div class="content-wrapper">
	
	<?php breadcrumb("لیست پیشنهادات خرید"); ?>

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
									<th>وزن بار</th>
									<th>وزن بار رسیده</th>
									<th>اسکن پیش فاکتور</th>
									<th>تایید مدیریت</th>
									<th>تایید واحد مالی</th>
									<th>ارسال رسید به مشتری</th>
									<th>برون سپاری</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$res = list_factor_buy();
								$c = count($res);
								for ($i=0 ; $i<$c ; $i++) {
									$bu_id = $res[$i]['bu_id'];
									?>
								<tr>
									<td><?php echo per_number($res[$i][0]); ?></td>
									<td><?php echo per_number($res[$i]['f_id']); ?></td>
									<td><?php echo get_product_name('p_id'); ?></td>
									<td><?php echo per_number($res[$i]['bu_quantity']); ?></td>
									<td><?php echo per_number($res[$i]['bu_quantity_r']); ?></td>
									<td>
									<?php
									show_btn_list($res[$i]['bu_scan_invoice'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_scan_invoice");
									?>
									</td>
									<td>
									<?php
									show_btn_list($res[$i]['bu_verify_admin1'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_verify_admin1");
									?>
									</td>
									<td>
										<?php
										show_btn_list($res[$i]['bu_send_fiscal'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_send_fiscal");
										?>	
									</td>
									<td>
										<?php
										show_btn_list($res[$i]['bu_send_customer'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_send_customer");
										?>	
									</td>
									<td>
										<?php
										show_btn_list($res[$i]['bu_out'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_out");
										?>	
									</td>
								</tr>
								<?php
								} ?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>نام محصول</th>
									<th>اسکن پیش فاکتور</th>
									<th>وزن بار</th>
									<th>وزن بار رسیده</th>
									<th>تایید مدیریت</th>
									<th>ارسال به واحد مالی</th>
									<th>ارسال رسید به مشتری</th>
									<th>برون سپاری</th>
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