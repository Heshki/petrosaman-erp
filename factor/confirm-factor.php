<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php"; include"functions.php"; ?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container-fluid">
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ثبت فاکتور جدید</h1>
						</div>
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">فاکتور</a></li>
					<li class="active">تایید فاکتور</li>
				</ol>
			</section>
			<section class="content">
				<div id="details" class="col-xs-12">	
					<?php
						$type_confirm = $_GET['typee'];
						if ($type_confirm == 'verify_admin1') {
						?>
						<div class="col-xs-12">
							<p>در صورتی که این فاکتور مورد تایید شما میباشد کلید تاپید ا بزنید.</p>
							<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
							<a href="list-factor.php" class="btn btn-warning">خیر</a>
						</div>
						<?php
						}elseif ($type_confirm == 'send_customer') {

						}elseif ($type_confirm == 'verify_customer') {

						}elseif ($type_confirm == 'verify_docs') {

						}elseif ($type_confirm == 'verify_finan') {

						}elseif ($type_confirm == 'verify_admin2') {

						}elseif ($type_confirm == 'verify_wait_bar') {

						}elseif ($type_confirm == 'verify_ready_bar') {

						}elseif ($type_confirm == 'verify_get-sample') {

						}elseif ($type_confirm == 'verify_bar1') {

						}elseif ($type_confirm == 'verify_bar2') {

						}
					?>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>