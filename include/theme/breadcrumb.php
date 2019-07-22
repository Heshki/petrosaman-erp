<?php
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
			if(isset($_SERVER['HTTP_REFERER'])){
				$_SESSION['user_interactions'][] = $_SERVER['HTTP_REFERER'];
			} else{
				$_SESSION['user_interactions'][] = 'index.php';	
			}
			$previous_page = end($_SESSION['user_interactions']);
		?>
		<ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php" class="btn btn-success" style="color:white;"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="<?php echo $previous_page; ?>" class="btn btn-primary" style="color:white;">بازگشت</a></li>
		</ol>
	</section>
<?php
}