<?php
function get_url() {
	echo "http://crm.petrocoke.ir/";
}

function get_view($view){
	return "http://crm.petrocoke.ir/" . $view . "/";
}

function check_active($current){
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename==$current)
		echo 'active';
}

function breadcrumb($title){ ?>
	<section class="content-header">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><?php echo $title; ?></h1>
				</div>
			</div>
		</div>
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">ثبت مشتری</li>
		</ol>
	</section>
<?php
}