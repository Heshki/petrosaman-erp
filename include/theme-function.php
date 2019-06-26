<?php
function get_the_url() {
	return "http://localhost/petrosaman-erp/";
}

function get_url() {
	echo "http://localhost/petrosaman-erp/";
}

function get_view($view){
	return "http://localhost/petrosaman-erp/" . $view . "/";
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
		<?php
			$_SESSION['user_interactions'][] = $_SERVER['HTTP_REFERER'];
			$previous_page = end($_SESSION['user_interactions']);
		?>
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php" class="btn btn-success" style="color:white;"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="<?php echo $previous_page; ?>" class="btn btn-primary" style="color:white;">بازگشت</a></li>
		</ol>
	</section>
<?php
}