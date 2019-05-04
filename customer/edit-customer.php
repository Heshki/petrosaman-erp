<?php $title = "ویرایش مشتری"; include"../header.php"; include"../nav.php"; include"functions.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
?>
	<div class="content-wrapper">
		<?php breadcrumb("ویرایش مشتری"); ?>
		<form action="list-customer.php" method="post">
			<section class="content">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">شماره مشتری: </span>
								<span class="bold"><?php echo $customer[0]['c_id']; ?></span>
							</div>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام:</span>
							</div>
							<input id="c_name" type="text" name="c_name" placeholder="نام " class="form-control" value="<?php echo $customer[0]['c_name']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام خانوادگی:</span>
							</div>
							<input id="c_family" type="text" name="c_family" placeholder="نام خانوادگی" class="form-control" value="<?php echo $customer[0]['c_family']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام شرکت:</span>
							</div>
							<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" value="<?php echo $customer[0]['c_company']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">شماره ملی:</span>
							</div>
							<input id="c_national" type="text" name="c_national" placeholder="شماره ملی" class="form-control" value="<?php echo $customer[0]['c_national']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">کد اقتصادی:</span>
							</div>
							<input id="c_economic" type="text" name="c_economic" placeholder="کد اقتصادی" class="form-control" value="<?php echo $customer[0]['c_economic']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">تلفن:</span>
							</div>
							<input id="c_phone" type="text" name="c_phone" placeholder="تلفن" class="form-control" value="<?php echo $customer[0]['c_phone']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">فکس:</span>
							</div>
							<input id="c_fax" type="text" name="c_fax" placeholder="فکس" class="form-control" value="<?php echo $customer[0]['c_fax']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">موبایل:</span>
							</div>
							<input id="c_mobile" type="text" name="c_mobile" placeholder="موبایل" class="form-control" value="<?php echo $customer[0]['c_mobile']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس دفتر:</span>
							</div>
							<input id="c_oaddress" type="text" name="c_oaddress" placeholder="آدرس دفتر" class="form-control" value="<?php echo $customer[0]['c_oaddress']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس کارخانه: </span>
							</div>
							<input id="c_faddress" type="text" name="c_faddress" placeholder="آدرس کارخانه" class="form-control" value="<?php echo $customer[0]['c_faddress']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس پست الکترونیک: </span>
							</div>
							<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control" value="<?php echo $customer[0]['c_email']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">ارزش افزوده: </span>
							</div>
							<select class="form-control" id="c_vat" name="c_vat">
								<option value="<?php echo $customer[0]['c_vat']; ?>">
									<?php
									if($customer[0]['c_vat'] == 'yes'){
										echo "دارد";
									}else{
										echo "ندارد";
									}
									?>		
								</option>
								<option value="yes">دارد</option>
								<option value="no">ندارد</option>
							</select>
						</div>
						<div id="vatdate" class="item col-md-4 col-xs-12">
							<div class="input-group-prepend">
								<span class="input-group-text">تاریخ انقضا:</span>
							</div>
							<input autocomplete="off" class="form-control" type="text" id="c_date" name="c_expire_vat" value="<?php echo $customer[0]['c_expire_vat']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">نوع مشتری: </span>
							</div>
							<select class="form-control" id="c_customertype" name="c_customertype">
								<option class="bg-danger" value="<?php echo $customer[0]['c_customertype']; ?>"><?php echo $customer[0]['c_customertype']; ?></option>
								<option value="مشتری">مشتری</option>
								<option value="تامین کننده">تامین کننده</option>
							</select>
						</div>
						<input class="hidden" type="text" id="c_id" name="c_id" value="<?php echo $c_id; ?>">
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<button type="submit" class="btn btn-success btn-lg" id="edit_customer" name="edit_customer">ذخیره</button>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
	<div class="control-sidebar-bg"></div>
	<script type="text/javascript" src="js/customer.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>