<?php include"../header.php"; include"../nav.php"; include"functions.php"; ?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">انبار</a></li>
				<li class="active">چاپ فرم حواله خروج</li>
			</ol>
		</section>
		<?php 
		require_once"../customer/functions.php";
		require_once"../product/functions.php";
		$fb_id = $_GET['fb_id']; 
		$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id inner join driver on driver.dr_id = factor_body.dr_id where factor_body.fb_id = $fb_id";
		$res = get_select_query($sql);
		?>
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">چاپ فرم حواله خروج</h1>
					</div>
				</div>
			</div>
		</section>
		<div class="col-xs-3"></div>
		<section class="col-xs-6" id="trasfer-form">
			
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<img src="<?php get_url(); ?>/dist/img/azar-logo.png">
					</h3>
				</div>
				<div class="box-body no-padding">
					<table class="table table-condensed">
						<tr>
							<th style="background: #f9f9f9" colspan="2" class="bold">مجوز ترخیص بار</th>
							<th style="background: #f9f9f9" colspan="2" class="bold">شماره: <?php echo per_number($fb_id); ?></th>
						</tr>
						<tr>
							<td class="bold" colspan="2">مشتری: <?php if($res) echo get_customer_name($res[0]['c_id']); ?></td>
							<td class="bold" colspan="2">تاریخ: <?php echo per_number(jdate('Y/m/d H:i')); ?></td>
						</tr>
						<tr>
							<th class="bold">ردیف</th>
							<th class="bold">شرح کالا</th>
							<th class="bold">وزن</th>
							<th class="bold">بسته بندی</th>
						</tr>
						<?php
						$i=1;
						foreach ($res as $row) {
						?>
						<tr>
							<td><?php echo per_number($i); ?></td>
							<td><?php echo get_product_name($row['p_id']); ?></td>
							<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
							<td><?php echo per_number(number_format(get_product_unit($row['p_id']))); ?></td>
						</tr>
						<tr>
							<th style="background: #f9f9f9" colspan="4">مشخصات تحویل گیرنده</th>
						</tr>
						<tr>
							<th>نام:</th>
							<td><?php echo $row['dr_name']; ?></td>
							<th>نام خانوادگی:</th>
							<td><?php echo $row['dr_family']; ?></td>
						</tr>
						<tr>
							<th>خودرو:</th>
							<td><?php echo per_number($row['dr_car']); ?></td>
							<th>پلاک:</th>
							<td><?php echo per_number($row['dr_plaque']); ?></td>
						</tr>
						<tr>
							<th>کد ملی:</th>
							<td><?php echo per_number($row['dr_national']); ?></td>
							<th>تلفن:</th>
							<td><?php echo per_number($row['dr_mobile']); ?></td>
						</tr>
						<?php
							$i++;
						} ?>
						<tr>
							<td colspan="4">کالاهای فوق صحیح و سالم و به صورت کامل تحویل داده شد.</td>
						</tr>
					</table>
					<br>
					<table class="table">
						<tr>
							<td>
								تایید بازرگانی 
								<br><br><br><br>
							</td>
							<td>
								تایید مالی 
								<br><br><br><br>
							</td>
							<td>
								تایید مدیریت 
								<br><br><br><br>
							</td>
						</tr>
						
					</table>
				</div>
			</div>

		</section>
		<div class="col-xs-3"></div>
	</div>

	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
	  });
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>