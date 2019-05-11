<?php include"../header.php"; include"../nav.php"; include"functions.php"; ?>
<div class="content-wrapper">
	<?php
	breadcrumb("تایید پیشنهاد فروش");
	
	$bu_id = $_GET['bu_id'];
	$type_confirm = $_GET['typee'];
	?>
	<script>
	  var loadFile = function(event) {
	    var output = document.getElementById('output');
	    output.src = URL.createObjectURL(event.target.files[0]);
	  };
	</script>
	<section class="content">
		<div id="details" class="col-xs-12">		
			<div class="box">
				<div class="box-body">
					<?php load_factor_buy($bu_id); ?>
				</div>
			</div>
			<?php
			if($type_confirm == 'bu_scan_invoice') { ?>
				<form action="list-buy.php" method="post">
					<div class="col-xs-12">
						<p>لطفا پیش فاکتور را اسکن  کنید</p>
						<input type="file" accept="image/*" onchange="loadFile(event)" name="verify_file" id="verify_file">
						<img id="output" src=""/>
						<?php
							$url = 
							INSERT INTO table_name (column1, column2, column3,...)
							VALUES (value1, value2, value3,...)
						?>
					</div>
				</form>
			<?php
			}else if($type_confirm == 'bu_verify_admin1') { ?>
				<form action="list-buy.php" method="post">
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50" required></textarea>
						<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
						<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<input type="file" accept="image/*" onchange="loadFile(event)" name="verify_file" id="verify_file">
						<img id="output" src=""/>
					</div>
					<div class="col-xs-12">
						<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-buy.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm=='bu_send_fiscal') { ?>
				<form action="list-buy.php" method="post">
					<div class="col-xs-12">
						<span>تایید مدیریت : </span>
						<?php
							$res = list_factor_buy();
							$c = count($res);
							for ($i=0 ; $i<$c ; $i++) {
							$bu_id = $res[$i]['bu_id'];
							show_btn_list($res[$i]['bu_verify_admin1'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_verify_admin1");
							}
						?>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
						<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسئول واحد مالی در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-buy.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm == 'bu_send_customer') { ?>
				<form action="list-buy.php" method="post">
					<div class="col-xs-12">
						<span>تایید مدیریت : </span>
						<?php
							$res = list_factor_buy();
							$c = count($res);
							for ($i=0 ; $i<$c ; $i++) {
							$bu_id = $res[$i]['bu_id'];
							show_btn_list($res[$i]['bu_verify_admin1'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_verify_admin1");
							
						?>
						<br/>
						<span>تایید واحد مالی</span>
						<?php
							show_btn_list($res[$i]['bu_send_fiscal'], "confirm-buy.php?bu_id=" . $bu_id . "&typee=bu_send_fiscal");
							}
						?>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
						<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسئول واحد مالی عزیز در صورتی که رسید برای مشتری ارسال شده کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-buy.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}
			 ?>
		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>