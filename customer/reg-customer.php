<?php $title = "ثبت مشتری"; include"../header.php"; include"../nav.php"; ?>
	
	<div class="content-wrapper">
		<?php breadcrumb("ثبت مشتری"); ?>
	
		<section class="content">
			<form action="" method="post">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام</span>
							</div>
							<input id="c_name" type="text" name="c_name" placeholder="نام " class="form-control" required>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام خانوادگی</span>
							</div>
							<input id="c_family" type="text" name="c_family" placeholder="نام خانوادگی" class="form-control" required>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام شرکت</span>
							</div>
							<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="item col-md-6">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">شماره ملی</span>
							</div>
							<input id="c_national" type="text" name="c_national" placeholder="شماره ملی" class="form-control">
						</div>
						<div class="item col-md-6">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">کد اقتصادی</span>
							</div>
							<input id="c_economic" type="text" name="c_economic" placeholder="کد اقتصادی" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">تلفن</span>
							</div>
							<input id="c_phone" type="text" name="c_phone" placeholder="تلفن" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">فکس</span>
							</div>
							<input id="c_fax" type="text" name="c_fax" placeholder="فکس" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">موبایل</span>
							</div>
							<input id="c_mobile" type="text" name="c_mobile" placeholder="موبایل" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس دفتر</span>
							</div>
							<input id="c_oaddress" type="text" name="c_oaddress" placeholder="آدرس دفتر" class="form-control" required>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس کارخانه</span>
							</div>
							<input id="c_faddress" type="text" name="c_faddress" placeholder="آدرس کارخانه" class="form-control" required>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس پست الکترونیک</span>
							</div>
							<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control" required>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">ارزش افزوده</span>
							</div>
							<select class="form-control" id="c_vat" name="c_vat">
								<option value="yes">دارد</option>
								<option value="no">ندارد</option>
							</select>
						</div>
						<div id="vatdate" class="item col-md-4 col-xs-12">
							<div class="input-group-prepend">
								<span class="input-group-text">تاریخ انقضاء گواهی ارزش افزوده</span>
							</div>
							<input type="text" class="form-control" id="c_date">
						</div>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">نوع مشتری</span>
							</div>
							<select class="form-control" id="c_customertype" name="c_customertype">
								<option value="مشتری">مشتری</option>
								<option value="تامین کننده">تامین کننده</option>
							</select>
						</div>
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<button type="submit" class="btn btn-success btn-lg" id="c_submit" name="c_submit">ذخیره</button>
							<?php 
							if(isset($_POST['c_submit'])) {
								include_once"functions.php";
								$array = array();
								if(isset($_POST['c_name']) && isset($_POST['c_family']) && isset($_POST['c_company']) && isset($_POST['c_national']) && isset($_POST['c_economic']) && isset($_POST['c_phone']) && isset($_POST['c_fax']) && isset($_POST['c_mobile']) && isset($_POST['c_oaddress']) && isset($_POST['c_faddress'])&& isset($_POST['c_email']) && isset($_POST['c_vat']) && isset($_POST['c_dvat']) && isset($_POST['c_mvat']) && isset($_POST['c_yvat']) && isset($_POST['c_customertype'])){
									array_push($array, $_POST['c_name']);
									array_push($array, $_POST['c_family']);
									array_push($array, $_POST['c_company']);
									array_push($array, $_POST['c_national']);
									array_push($array, $_POST['c_economic']);
									array_push($array, $_POST['c_phone']);
									array_push($array, $_POST['c_fax']);
									array_push($array, $_POST['c_mobile']);
									array_push($array, $_POST['c_oaddress']);
									array_push($array, $_POST['c_faddress']);
									array_push($array, $_POST['c_email']);
									array_push($array, $_POST['c_vat']);
									array_push($array, $_POST['c_expire_vat']);
									array_push($array, $_POST['c_customertype']);
									$mobile = $_POST['c_mobile'];
									$mellicode = $_POST['c_national'];
									insert_customer($array);
									send_sms($mobile, "حساب کاربری شما در شرکت پتروسامان با موفقیت ایجاد شد \n نام کاربری: $mellicode \n رمز عبور: $mobile \n آدرس سامانه: http://crm.petrocoke.ir");
									echo "<meta http-equiv='refresh' content='0'/>";
								}
							}
							?>
						</div>
					</div>
				</div>
			</form>
		</section>
	</div>
	<script src="<?php get_url(); ?>customer/js/customer.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>