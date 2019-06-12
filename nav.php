<?php $filename = basename($_SERVER['PHP_SELF']); ?>
<div class="wrapper">
	<?php include"top-nav.php"; ?>
	<aside class="main-sidebar">
		<section class="sidebar">
		  	<div class="user-panel">
				<div class="pull-right image">
					<img src="<?php get_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
			  		<p><?php echo $_SESSION['name'] . " " . $_SESSION['family']; ?></p>
			  		<a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
				</div>
		  	</div>
		  	<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
			  		<input type="text" name="q" class="form-control" placeholder="جستجو...">
			  		<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
			  		</span>
				</div>
		  	</form>
		  	<ul class="sidebar-menu">
				<li class="header">ناوبری اصلی</li>
			
				<li class="<?php check_active('index.php'); ?> treeview">
					<li class="<?php check_active('index.php'); ?>">
						<a href="<?php get_url(); ?>index.php"><i class="fa fa-circle-o"></i> پیشخوان </a>
					</li>
				</li>
				
				
				<li class="<?php check_active('reg-customer.php'); check_active('list-customer.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span> مشتریان</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('reg-customer.php'); ?>"><a href="<?php get_url(); ?>customer/reg-customer.php"><i class="fa fa-circle-o"></i> ثبت مشتری</a></li>
						<li class="<?php check_active('list-customer.php'); ?>"><a href="<?php get_url(); ?>customer/list-customer.php"><i class="fa fa-circle-o"></i> لیست مشتریان</a></li>
			  		</ul>
				</li>
				
				<li class="<?php check_active('reg-product.php'); check_active('list-product.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>محصولات</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-product.php'); ?>"><a href="<?php get_url(); ?>product/list-product.php"><i class="fa fa-circle-o"></i>مدیریت محصولات</a></li>
			  		</ul>
				</li>

				<li class="<?php check_active('list-category.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>دسته بندی ها</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-category.php'); ?>"><a href="<?php get_url(); ?>category/list-category.php"><i class="fa fa-circle-o"></i>مدیریت دسته بندی ها</a></li>
			  		</ul>
				</li>
				
				<li class="<?php check_active('list-stock.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>موجودی</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-stock.php'); ?>"><a href="<?php get_url(); ?>stock/list-stock.php"><i class="fa fa-circle-o"></i>لیست موجودی ها</a></li>
			  		</ul>
				</li>
				
				<li class="<?php check_active('reg-factor.php'); check_active('list-factor.php'); check_active('log-factor.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span> فاکتور فروش</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('reg-factor.php'); ?>"><a href="<?php get_url(); ?>factor/reg-factor.php"><i class="fa fa-circle-o"></i>ثبت فاکتور</a></li>
						<li class="<?php check_active('list-factor.php'); ?>"><a href="<?php get_url(); ?>factor/list-factor.php"><i class="fa fa-circle-o"></i>لیست فاکتورها</a></li>
			  		</ul>
				</li>
				
				<li class="<?php check_active('reg-factor.php'); check_active('list-factor.php'); check_active('log-factor.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>فاکتور خرید</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('reg-buy.php'); ?>"><a href="<?php get_url(); ?>buy/reg-buy.php"><i class="fa fa-circle-o"></i>ثبت فاکتور</a></li>
						<li class="<?php check_active('list-buy.php'); ?>"><a href="<?php get_url(); ?>buy/list-buy.php"><i class="fa fa-circle-o"></i>لیست فاکتورها</a></li>
			  		</ul>
				</li>

				<li class="<?php check_active('list-storage.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>انبار</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-storage.php'); ?>"><a href="<?php get_url(); ?>storage/list-storage.php"><i class="fa fa-circle-o"></i>لیست حواله خروج</a></li>
			  		</ul>
				</li>
				<?php
				include_once"include/jdf.php";
				$myDate = jdate('Y/n/j');
				$myDataArray = explode('/', $myDate);
				$myMonth = $myDataArray[1];
				?>
				<li class="<?php check_active('list-user.php'); check_active('set_schedule.php'); check_active('get_schedule.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>کاربران</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-user.php'); ?>"><a href="<?php get_url(); ?>user/list-user.php"><i class="fa fa-circle-o"></i>لیست کاربران</a></li>
						<li class="<?php check_active('set_schedule.php'); ?>"><a href="<?php get_url(); ?>group/set_schedule.php/?group=A&month=<?php echo $myMonth; ?>&sch_submit=1"><i class="fa fa-circle-o"></i>برنامه ریزی شیفت ها</a></li>
						<li class="<?php check_active('get_schedule.php'); ?>"><a href="<?php get_url(); ?>group/get_schedule.php/?group=A&sch_submit=1"><i class="fa fa-circle-o"></i>مشاهده گروه ها</a></li>
			  		</ul>
				</li>
				<li class="<?php check_active('list-driver.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>راننده ها</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-driver.php'); ?>"><a href="<?php get_url(); ?>driver/list-driver.php"><i class="fa fa-circle-o"></i>لیست راننده ها</a></li>
			  		</ul>
				</li>
				
		  	</ul>
		</section>
	</aside>