<?php $title = "نمایش مشتری"; include"../header.php"; include"../nav.php"; include"functions.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
?>
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>نمایش مشتری</h1>
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">نمایش مشتری</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div id="details-show" class="col-xs-12">
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
				  <span class="bold"><?php echo $customer[0]['c_name']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">نام خانوادگی: </span>
				  <span class="bold"><?php echo $customer[0]['c_family']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">نام شرکت: </span>
				  <span class="bold"><?php echo $customer[0]['c_company']; ?></span>
				</div>
			  </div>

			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">شماره ملی: </span>
				  <span class="bold"><?php echo $customer[0]['c_national']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">کد اقتصادی: </span>
				  <span class="bold"><?php echo $customer[0]['c_economic']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">تلفن: </span>
				  <span class="bold"><?php echo $customer[0]['c_phone']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">فکس: </span>
				  <span class="bold"><?php echo $customer[0]['c_fax']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">موبایل: </span>
				  <span class="bold"><?php echo $customer[0]['c_mobile']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">آدرس دفتر: </span>
				  <span class="bold"><?php echo $customer[0]['c_oaddress']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">آدرس کارخانه: </span>
				  <span class="bold"><?php echo $customer[0]['c_faddress']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">آدرس پست الکترونیک: </span>
				  <span class="bold"><?php echo $customer[0]['c_email']; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="margin-tb input-group-prepend">
				  <span class="input-group-text">ارزش افزوده: </span>
				  <span class="bold">
				  	<?php
				  		if($customer[0]['c_vat'] == 'yes'){
				  			echo "دارد";
				  			$date = $customer[0]['c_yvat'] . "/" . $customer[0]['c_mvat'] . "/" . $customer[0]['c_dvat'];
				  		}else{
				  			echo "ندارد";
				  			$date = "_________________";
				  		}
				  	?>	
				  </span>
				</div>
			  </div>
			  <div id="vatdate" class="item col-md-4 col-xs-12">
				<div class="input-group-prepend">
				  <span class="input-group-text">تاریخ انقضا: </span>
				  <span class="bold"><?php echo $date; ?></span>
				</div>
			  </div>
			  <div class="item col-md-4">
				<div class="input-group-prepend">
				  <span class="input-group-text">نوع مشتری: </span>
				  <span class="bold"><?php echo $customer[0]['c_customertype']; ?></span>
				</div>
			  </div>
			  <div style="text-align: center; margin: 20px 0;" class="col-xs-12">
				<a href="edit-customer.php?id=<?php echo $customer[0]['c_id']; ?>" class="btn btn-success btn-lg" id="editc_submit">ویرایش</a>
				</div>
			  </div>
			</div><!-- /.box -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  <!-- Control Sidebar -->
	  <!-- /.control-sidebar -->
	  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
	  <div class="control-sidebar-bg"></div>
	</div><!-- ./wrapper -->
<?php include"../left-nav.php"; include"../footer.php"; ?>
