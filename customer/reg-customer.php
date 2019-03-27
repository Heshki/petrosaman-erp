<?php $title = "ثبت مشتری"; include"../header.php"; include"../nav.php"; ?>
	  <div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ثبت مشتری</h1>
						</div>
					 	<!-- /.col-lg-12 -->
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">مشتریان</a></li>
					<li class="active">ثبت مشتری</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام </span>
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
									<span class="input-group-text">تاریخ انقضا</span>
								</div>
								<div class="col-md-4 col-xs-4">
									<div class="input-group-prepend">
										<span class="input-group-text">روز</span>
									</div>
									<select class="form-control" id="c_dvat" name="c_dvat">
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
										<option>16</option>
										<option>17</option>
										<option>18</option>
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option>30</option>
										<option>31</option>
									</select>
								</div>
								<div class="col-md-4 col-xs-4">
									<div class="input-group-prepend">
										<span class="input-group-text">ماه</span>
									</div>
									<select class="form-control" id="c_mvat" name="c_mvat">
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
								</div>
								<div class="col-md-4 col-xs-4">
									<div class="input-group-prepend">
										<span class="input-group-text">سال</span>
									</div>
									<select class="form-control" id="c_yvat" name="c_yvat">
										<option>1397</option>
										<option>1398</option>
										<option>1399</option>
										<option>1400</option>
										<option>1401</option>
										<option>1402</option>
										<option>1403</option>
										<option>1404</option>
										<option>1405</option>
										<option>1406</option>
										<option>1407</option>
										<option>1408</option>
									</select>
								</div>
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
											array_push($array, $_POST['c_dvat']);
											array_push($array, $_POST['c_mvat']);
											array_push($array, $_POST['c_yvat']);
											array_push($array, $_POST['c_customertype']);
											insert_customer($array);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
									}
								?>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section><!-- /.content -->
		</div><!-- /.container -->
	</div><!-- /.content-wrapper -->
</div>
<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">افزودن محصول</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
				<form action="" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام محصول</span>
								</div>
								<input id="p_name" type="text" name="p_name" placeholder="نام محصول" class="form-control">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد دسته بندی</span>
								</div>
								<input id="p_cat" type="text" name="p_cat" placeholder="کد دسته بندی" class="form-control">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">واحد کالا</span>
								</div>
								<input id="p_unit" type="text" name="p_unit" placeholder="واحد کالا" class="form-control">
							</div>
							<div class="item col-md-4">
								<button type="submit" class="btn btn-success btn-lg" id="p_submit" name="p_submit">اضافه کردن</button>
								<?php 
									if(isset($_POST['p_submit']) && $_POST['p_name'] != "" && $_POST['p_cat'] != "" && $_POST['p_unit'] != "") {
										include_once"functions.php";
										$array = array();
										array_push($array, $_POST['p_name']);
										array_push($array, $_POST['p_cat']);
										array_push($array, $_POST['p_unit']);
										insert_product($array);
										echo "<meta http-equiv='refresh' content='0'/>";
									}
								?>
							</div>
						</div>
					</div>
				</form>
			</section>
<!-- ./wrapper -->
<script src="<?php get_url(); ?>customer/js/customer.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>