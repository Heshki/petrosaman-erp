<?php include"header.php"; include"nav.php";
	require_once("customer/functions.php");
	?>
	<div class="content-wrapper">
	<?php echo per_number("1213123"); ?>
        <section class="content-header">
			<h1>
				پیشخوان
				<small>پنل مدیریت</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li class="active">پیشخوان</li>
			</ol>
        </section>
		
        <section class="content">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>۱۵۰</h3>
							<p>سفارش جدید</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner">
							<h3>۵۳<sup style="font-size: 20px">%</sup></h3>
							<p>افزایش آمار</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo per_number(customer_count()); ?></h3>
							<p>مشتری فعال</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?php get_url(); ?>customer/list-customer.php?action=customer" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo per_number(customer_expire_count()); ?></h3>
							<p>گواهی ارزش افزوده منقضی</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?php get_url(); ?>customer/list-customer.php?action=expire" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<section class="col-lg-7 connectedSortable">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs pull-right">
							<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
							<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
							<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
						</ul>
						<div class="tab-content no-padding">
							<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
							<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
						</div>
					</div>
				</section>
				<section class="col-lg-5 connectedSortable">
					<div class="box box-solid bg-teal-gradient">
						<div class="box-header">
							<i class="fa fa-th"></i>
							<h3 class="box-title">نمودار فروش</h3>
							<div class="box-tools pull-left">
								<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body border-radius-none">
							<div class="chart" id="line-chart" style="height: 250px;"></div>
						</div>
					</div>          
				</section>
			</div>
        </section>
    </div>
</div>
<?php include"left-nav.php"; include"footer.php"; ?>
