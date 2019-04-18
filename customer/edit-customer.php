<?php $title = "ویرایش مشتری"; include"../header.php"; include"../nav.php"; include"functions.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
?>
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>ویرایش مشتری</h1>
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">ویرایش مشتری</li>
		  </ol>
		</section>

		<!-- Main content -->
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
						<span class="input-group-text">نام : </span>
					</div>
					<input id="c_name" type="text" name="c_name" placeholder="نام " class="form-control" value="<?php echo $customer[0]['c_name']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام خانوادگی: </span>
					</div>
					<input id="c_family" type="text" name="c_family" placeholder="نام خانوادگی" class="form-control" value="<?php echo $customer[0]['c_family']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام شرکت: </span>
					</div>
					<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" value="<?php echo $customer[0]['c_company']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">شماره ملی: </span>
					</div>
					<input id="c_national" type="text" name="c_national" placeholder="شماره ملی" class="form-control" value="<?php echo $customer[0]['c_national']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">کد اقتصادی: </span>
					</div>
					<input id="c_economic" type="text" name="c_economic" placeholder="کد اقتصادی" class="form-control" value="<?php echo $customer[0]['c_economic']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">تلفن: </span>
					</div>
					<input id="c_phone" type="text" name="c_phone" placeholder="تلفن" class="form-control" value="<?php echo $customer[0]['c_phone']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">فکس: </span>
					</div>
					<input id="c_fax" type="text" name="c_fax" placeholder="فکس" class="form-control" value="<?php echo $customer[0]['c_fax']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">موبایل: </span>
					</div>
					<input id="c_mobile" type="text" name="c_mobile" placeholder="موبایل" class="form-control" value="<?php echo $customer[0]['c_mobile']; ?>">
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس دفتر: </span>
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
						<span class="input-group-text">تاریخ انقضا: </span>
					</div>
					<div class="col-md-4 col-xs-4">
						<div class="input-group-prepend">
							<span class="input-group-text">روز: </span>
						</div>
						<select class="form-control" id="c_dvat" name="c_dvat">
							<option class="bg-danger" value="<?php echo $customer[0]['c_dvat']; ?>"><?php echo $customer[0]['c_dvat']; ?></option>
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
							<span class="input-group-text">ماه: </span>
						</div>
						<select class="form-control" id="c_mvat" name="c_mvat">
							<option class="bg-danger" value="<?php echo $customer[0]['c_mvat']; ?>"><?php echo $customer[0]['c_mvat']; ?></option>
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
							<span class="input-group-text">سال: </span>
						</div>
						<select class="form-control" id="c_yvat" name="c_yvat">
							<option class="bg-danger" value="<?php echo $customer[0]['c_yvat']; ?>"><?php echo $customer[0]['c_yvat']; ?></option>
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
		</div><!-- /.box -->
	</section>
</form><!-- /.content -->
</div><!-- /.content-wrapper -->
	  <!-- Control Sidebar -->
	  <!-- /.control-sidebar -->
	  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
	  <div class="control-sidebar-bg"></div>
	  <script type="text/javascript" src="js/customer.js"></script>
	</div><!-- ./wrapper -->
<?php include"../left-nav.php"; include"../footer.php"; ?>
