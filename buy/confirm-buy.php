<?php $title = "فاکتور خرید"; include"../header.php"; include"../nav.php"; include"functions.php"; ?>
<div class="content-wrapper">
	<?php
	breadcrumb("تایید پیشنهاد فروش");
	$bu_id = $_GET['bu_id'];
	$type_confirm = $_GET['typee'];
	$typee = "";

	if(isset($_POST['up_file'])){
		$type = $_POST['typee'];
		$bu_id = $_POST['bu_id'];
		upload_file($_FILES['fileToUpload']['name'], $_FILES['fileToUpload']['tmp_name'], $_FILES['fileToUpload']['size'], $type, $bu_id);
		
		if($type=="invoice"){
			$sql1 = "update factor_buy set bu_scan_invoice = 1 where bu_id = $bu_id";
		}else if($type=="receipt"){
			$sql1 = "update factor_buy set bu_send_customer = 1 where bu_id = $bu_id";
		}

		ex_query($sql1);
	}	
	?>
	<section class="content">
		<div id="details" class="col-xs-12">		
			<div class="box">
				<div class="box-body">
					<?php
					load_factor_buy($bu_id);
					$src = get_up_file($bu_id, "invoice");
					if($type_confirm == 'bu_scan_invoice') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<h4>لطفا پیش فاکتور را اسکن  کنید</h4><br>
							<div class="col-md-6">
								<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
								<img id="output" class="img-responsive" src="<?php echo $src; ?>" />
								<input type="hidden" name="bu_id" value="<?php echo $_GET['bu_id']; ?>">
							</div>
							<div class="col-md-6">
								<label>نوع فایل :</label>
								<select class="form-control" name="typee">
									<option value="invoice">پیش فاکتور</option>
									<option value="receipt">رسید</option>
								</select><br>
								<button class="btn btn-success" type="submit" name="up_file">آپلود</button>
							</div>
						</form>
						<script>
				  			var loadFile = function(event) {
						    	var output = document.getElementById('output');
					    		output.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
						<?php
					}else if($type_confirm == 'bu_verify_admin1') { ?>
						<form action="list-buy.php" method="post">
							<br/>
							<div class="col-md-12 col-xs-12">
								<img id="output2" class="img-responsive" src="<?php echo $src; ?>" />
							</div>
							<br/>
							<div class="col-md-12 col-xs-12">
								<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50" required></textarea>
								<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
								<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
								<br/>
								<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-buy.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<script>
				  			var loadFile = function(event) {
						    	var output2 = document.getElementById('output2');
					    		output2.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
					<?php
					}else if($type_confirm=='bu_send_fiscal') { ?>
						<form action="list-buy.php" method="post">
							<div class="col-xs-12">
								<br/>
								<label class="label">تایید مدیریت</label>
							</div>
							<div class="col-xs-12">
								<br/>
								<img id="output3" class="img-responsive" src="<?php echo $src; ?>" />
								<br/>
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
						<script>
				  			var loadFile = function(event) {
						    	var output3 = document.getElementById('output3');
					    		output3.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
					<?php
					}else if($type_confirm == 'bu_send_customer') {
						$src_r = get_up_file($bu_id, 'receipt');
						echo $src_r;
						?>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="col-xs-12">
								<br/>
								<label class="label">تایید مدیریت</label>
								<label class="label">تایید واحد مالی</label>
							</div>
							<div class="col-xs-12">
								<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
								<img id="output4" class="img-responsive" src="<?php echo $src_r; ?>" />
								<br/>
							</div>
							<div class="col-md-6">
								<input type="hidden" value="receipt" name="typee">
								<br>
								<button class="btn btn-success" type="submit" name="up_file">آپلود</button>
							</div>
							<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
							<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							<div class="col-xs-12">
								<p>مسئول واحد مالی عزیز در صورتی که رسید برای مشتری ارسال شده کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-buy.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<script>
				  			var loadFile = function(event) {
						    	var output4 = document.getElementById('output4');
					    		output4.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>