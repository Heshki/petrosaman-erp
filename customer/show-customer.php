<?php $title = "نمایش مشتری"; include"../header.php"; include"../nav.php"; include"functions.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>نمایش مشتری</h1>
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">نمایش مشتری</li>
		</ol>
	</section>

	<section class="content">
		<div id="details-show" class="col-xs-12">
			<div class="row">
			  	<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
				  		<span class="input-group-text">شماره مشتری:</span>
				  		<span class="bold"><?php echo per_number($customer[0]['c_id']); ?></span>
					</div>
			  	</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام:</span>
						<span class="bold"><?php echo $customer[0]['c_name']; ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام خانوادگی:</span>
						<span class="bold"><?php echo $customer[0]['c_family']; ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام شرکت:</span>
						<span class="bold"><?php echo $customer[0]['c_company']; ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">شماره ملی:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_national']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">کد اقتصادی:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_economic']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">تلفن:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_phone']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">فکس:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_fax']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">موبایل:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_mobile']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس دفتر:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_oaddress']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس کارخانه:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_faddress']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس پست الکترونیک:</span>
						<span class="bold"><?php echo $customer[0]['c_email']; ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">ارزش افزوده:</span>
						<span class="bold">
						<?php
				  		if($customer[0]['c_vat'] == 'yes'){
				  			echo "دارد";
				  			$date = $customer[0]['c_expire_vat'];
				  		}else{
				  			echo "ندارد";
				  			$date = $customer[0]['c_expire_vat'];
				  		}
						?>	
						</span>
					</div>
				</div>
				<div id="vatdate" class="item col-md-4 col-xs-12">
					<div class="input-group-prepend">
						<span class="input-group-text">تاریخ انقضا:</span>
						<span class="bold"><?php echo per_number($date); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">نوع مشتری:</span>
						<span class="bold"><?php echo $customer[0]['c_customertype']; ?></span>
					</div>
				</div>
				<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
					<a href="edit-customer.php?id=<?php echo $customer[0]['c_id']; ?>" class="btn btn-success btn-lg" id="editc_submit">ویرایش</a>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="control-sidebar-bg"></div>
<?php include"../left-nav.php"; include"../footer.php"; ?>