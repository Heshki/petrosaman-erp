<?php include"../header.php"; include"../nav.php"; include"functions.php";

require_once"../driver/functions.php";
require_once"../buy/functions.php";
	
	if(isset($_GET['s_id'])){
		$u_id = $_GET['s_id'];
		$asd = select_a_store($s_id);
	}
?>
<div class="content-wrapper">
	
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">انبار</a></li>
			<li class="active">ورودی انبار</li>
		</ol>
	</section>

	<section class="content-header">
		<h1>ورودی انبار</h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form action="" method="post">
							<div id="details" class="col-xs-12">
								<div class="row">
									<div class="item col-md-4">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">فاکتور خرید</span>
										</div>
										<?php
										$res = list_factor_buy();
										?>
										<select class="form-control">
											<?php
											foreach($res as $row){
											?>
											<option><?php echo $row['f_id'] . "-" . $row['f_date']; ?></option>
											<?php 
											} ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="item col-md-4">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">نوع بار</span>
										</div>
										<?php
										$res = list_product();
										?>
										<select class="form-control">
											<?php
											foreach($res as $row){
											?>
											<option><?php echo $row['p_name']; ?></option>
											<?php 
											} ?>
										</select>
									</div>
									<div class="item col-md-4">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">وزن</span>
										</div>
										<input type="text" name="s_weight" class="form-control" value="<?php if(isset($_GET['s_id'])) { echo $asd[0]['s_weight'];}else{ echo ''; } ?>">
									</div>
									<div class="item col-md-4">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">تاریخ ورود</span>
										</div>
										<input type="text" name="s_date" id="f_date" class="form-control" value="<?php if(isset($_GET['s_id'])) { echo $asd[0]['s_date'];}else{ echo ''; } ?>">
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">زمان ورود</span>
										</div>
										<input type="text" name="s_time" class="form-control" value="<?php if(isset($_GET['s_id'])) { echo $asd[0]['s_time'];}else{ echo ''; } ?>">
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">راننده</span>
										</div>
										<?php
										$res = list_driver();
										?>
										<select class="form-control">
											<?php
											foreach($res as $row){
											?>
											<option><?php echo $row['dr_name']; ?></option>
											<?php 
											} ?>
										</select>
										
									</div>
									<div class="item col-md-4">
										<?php if(isset($_GET['u_id'])){
										?>
										<button type="submit" class="btn btn-warning btn-lg" name="s_edit">ویرایش</button>
										<?php
										} else { ?>
										<button type="submit" class="btn btn-success btn-lg" name="s_submit">اضافه کردن</button>
										<?php
										}
										?>
									</div>
								</div>
							</div>
						</form>

						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>نوع بار</th>
									<th>وزن</th>
									<th>تاریخ ورود</th>
									<th>زمان ورود</th>
									<th>راننده</th>
									<th>اسکن بارنامه</th>
									<th>تایید واحد مالی</th>
									<th>تایید مدیریت</th>
									<th>تایید مدیر کنترل کیفی</th>
									<th>اسکن قبض باسکول</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$list = list_store();
							foreach ($list as $row) {
								$s_id = $row['s_id']; ?>
								<tr>
									<td><?php echo per_number($row['s_type']); ?></td>
									<td><?php echo $row['s_weight']; ?></td>
									<td><?php echo $row['s_date']; ?></td>
									<td><?php echo $row['s_time']; ?></td>
									<td><?php echo get_driver_name($row['dr_id']); ?></td>
									<td>
										<?php
										show_btn_list($row['s_scan_b'], "confirm-store.php?s_id=" . $s_id . "&typee=s_scan_b");
										?>
									</td>
									<td>
										<?php
										show_btn_list($row['s_verify_fiscal'], "confirm-store.php?s_id=" . $s_id . "&typee=s_verify_fiscal");
										?>
									</td>
									<td>
										<?php
										show_btn_list($row['s_verify_admin'], "confirm-store.php?s_id=" . $s_id . "&typee=s_verify_admin");
										?>
									</td>
									<td>
										<?php
										show_btn_list($row['s_verify_admin_Quality'], "confirm-store.php?s_id=" . $s_id . "&typee=s_verify_admin_Quality");
										?>
									</td>
									<td>
										<?php
										show_btn_list($row['s_scan_gh'], "confirm-store.php?s_id=" . $s_id . "&typee=s_scan_gh");
										?>
									</td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>نوع بار</th>
									<th>وزن</th>
									<th>تاریخ ورود</th>
									<th>زمان ورود</th>
									<th>راننده</th>
									<th>اسکن بارنامه</th>
									<th>تایید واحد مالی</th>
									<th>تایید مدیریت</th>
									<th>تایید مدیر کنترل کیفی</th>
									<th>اسکن قبض باسکول</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>