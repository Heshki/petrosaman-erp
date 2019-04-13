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
			  		<p>محمد شریفی</p>
			  		<a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
				</div>
		  	</div>
		  	<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
			  		<input type="text" name="q" class="form-control" placeholder="جستوجو ...">
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
						<li class="<?php check_active('reg-product.php'); ?>"><a href="<?php get_url(); ?>product/reg-product.php"><i class="fa fa-circle-o"></i>ثبت محصول</a></li>
						<li class="<?php check_active('list-product.php'); ?>"><a href="<?php get_url(); ?>product/list-product.php"><i class="fa fa-circle-o"></i>لیست محصولات</a></li>
			  		</ul>
				</li>

				<li class="<?php check_active('list-stock.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>موجودی</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-stock.php'); ?>"><a href="<?php get_url(); ?>stock/list-stock.php"><i class="fa fa-circle-o"></i>لیست موجودی ها</a></li>
			  		</ul>
				</li>

				<li class="<?php check_active('list-category.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>دسته بندی</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-category.php'); ?>"><a href="<?php get_url(); ?>category/list-category.php"><i class="fa fa-circle-o"></i>لیست دسته بندی ها</a></li>
			  		</ul>
				</li>
				
				<li class="<?php check_active('reg-factor.php'); check_active('list-factor.php'); check_active('log-factor.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span> فاکتور فروش</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('reg-factor.php'); ?>"><a href="<?php get_url(); ?>factor/reg-factor.php"><i class="fa fa-circle-o"></i> ثبت فاکتور</a></li>
						<li class="<?php check_active('list-factor.php'); ?>"><a href="<?php get_url(); ?>factor/list-factor.php"><i class="fa fa-circle-o"></i> لیست فاکتورها</a></li>
						<li class="<?php check_active('log-factor.php'); ?>"><a href="<?php get_url(); ?>factor/log-factor.php"><i class="fa fa-circle-o"></i>تاریخچه فاکتور ها</a></li>
			  		</ul>
				</li>

				<li class="<?php check_active('list-storage.php'); ?> treeview">
			  		<a href="#"><i class="fa fa-files-o"></i><span>انبار</span></a>
			  		<ul class="treeview-menu">
						<li class="<?php check_active('list-storage.php'); ?>"><a href="<?php get_url(); ?>storage/list-storage.php"><i class="fa fa-circle-o"></i>لیست حواله خروج</a></li>
			  		</ul>
				</li>
				
		  	</ul>
		</section>
	</aside>