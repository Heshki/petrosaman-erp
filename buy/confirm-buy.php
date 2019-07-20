<?php $title = "فاکتور خرید"; include"../header.php"; include"../nav.php"; include"functions.php";
require_once"../partner/functions.php";
 ?>
<div class="content-wrapper">
	<?php
	breadcrumb("تایید پیشنهاد خرید");
	$bu_id = $_GET['bu_id'];
	$type_confirm = $_GET['typee'];
	$typee = "";

	if(isset($_POST['delete-img'])){
		$filename1 = $_POST['filename'];
		$image_id = $_POST['image_id'];
		
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "uploads/" . $filename1);
		
		if(unlink($path)){
			$sql = "delete from media where m_id = $image_id";
			ex_query($sql);
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		echo $url;
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}

	if(isset($_POST['up_file'])){
		$type = $_POST['typee'];
		$bu_id = $_POST['bu_id'];
		$filename = $_FILES['fileToUpload']['name'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$size = $_FILES['fileToUpload']['size'];
		user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
		if($type=="invoice"){
			$sql1 = "update factor_buy set bu_scan_invoice = 1 where bu_id = $bu_id";
		}else if($type=="receipt"){
			$sql1 = "update factor_buy set bu_send_customer = 1 where bu_id = $bu_id";
		}
		ex_query($sql1);
	}	
	
	if(isset($_POST['verify_admin1'])){
		$value = $_POST['verify_admin1'];
		$bu_id = $_POST['bu_id'];
		ex_query("update factor_buy set bu_verify_admin1 = $value where bu_id = $bu_id");
	}
	if(isset($_POST['verify_fiscal'])){
		$value = $_POST['verify_fiscal'];
		$bu_id = $_POST['bu_id'];
		ex_query("update factor_buy set bu_send_fiscal = $value where bu_id = $bu_id");
	}
	?>
	<section class="content">
		<div id="details">		
			<div class="box">
				<div class="box-body">
					<h4>جدول اقلام خرید</h4>
					<?php
					load_factor_buy($bu_id);
					if($type_confirm == 'bu_scan_invoice') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<div class="row">
								<div class="col-md-6">
									<h4>بارگزاری پیش فاکتور اسکن شده</h4><br>
									<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
									<input type="hidden" name="typee" value="invoice">
									<button type="submit" class="btn btn-success" name="up_file">بارگزاری فایل</button>
									<input type="hidden" name="bu_id" value="<?php echo $_GET['bu_id']; ?>">
								</div>
								<div class="col-md-6">
									<img class="img-responsive" id="output">
								</div>
							</div>
						</form>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>نمایش پیش  فاکتور اسکن شده</h4>
								<?php get_invoice_files($bu_id); ?>
							</div>
						</div>
						<script>
				  			var loadFile = function(event) {
						    	var output = document.getElementById('output');
					    		output.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
						<?php
					}else if($type_confirm == 'bu_verify_admin1') { ?>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش پیش  فاکتور اسکن شده</h4>
									<?php get_invoice_files($bu_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<form action="" method="post">
									<div class="col-md-12"><h4>تایید پیش فاکتور خرید توسط مدیر</h4></div>
									<div class="col-md-6">
										<textarea class="form-control" name="l_details" placeholder="در صورتی که توضیح خاصی نیاز است وارد کنید..." rows="4" cols="50" ></textarea>
										<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
										<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
									</div>
									<div class="col-md-6">
										<button type="submit" name="verify_admin1" value="1" class="btn btn-success">مورد تایید است</button>
										<button type="submit" name="verify_admin1" value="0" class="btn btn-danger">مورد تایید نیست</button>
									</div>
								</form>
							</div>
							<script>
								var loadFile = function(event) {
									var output2 = document.getElementById('output2');
									output2.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>
						<?php
					}else if($type_confirm=='bu_send_fiscal') { ?>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش پیش  فاکتور اسکن شده</h4>
									<?php get_invoice_files($bu_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش رسید اسکن شده</h4>
									<?php get_receipt_files($bu_id); ?>
								</div>
							</div>
							<div class="row">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="col-md-6">
										<h4>بارگزاری رسید پرداخت اسکن شده</h4><br>
										<input type="file" accept="image/*" onchange="loadFile3(event)" name="fileToUpload" id="verify_file"><br>
										<input type="hidden" name="typee" value="receipt">
										<button type="submit" class="btn btn-success" name="up_file">بارگزاری فایل</button>
										<input type="hidden" name="bu_id" value="<?php echo $_GET['bu_id']; ?>">
									</div>
									<div class="col-md-6">
										<img class="img-responsive" id="output3">
									</div>
								</form>
							</div>
							<div class="row">
								<form action="" method="post">
									<div class="col-md-12"><h4>تایید پرداخت توسط واحد مالی</h4></div>
									<div class="col-md-6">
										<textarea class="form-control" name="l_details" placeholder="در صورتی که توضیح خاصی نیاز است وارد کنید..." rows="4" cols="50"></textarea>
										<input type="hidden" name="bu_id" value="<?php echo $bu_id; ?>">
										<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
									</div>
									<div class="col-md-6">
										<button type="submit" name="verify_fiscal" value="1" class="btn btn-success">مورد تایید است</button>
										<button type="submit" name="verify_fiscal" value="0" class="btn btn-danger">مورد تایید نیست</button>
									</div>
								</form>
							</div>
							<script>
								var loadFile3 = function(event) {
									var output3 = document.getElementById('output3');
									output3.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>
					<?php
					}else if($type_confirm == 'bu_send_customer') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش پیش  فاکتور اسکن شده</h4>
									<?php get_invoice_files($bu_id); ?>
								</div>
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
					}else if($type_confirm == 'bu_out') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<div class="col-md-12">
								<h4>انتخاب همکار مورد نظر</h4>	
							</div>
							<br>
							<div class="col-md-6">
								<?php 
								$res = list_partner();?>
								<select class="form-control">
								<?php
								foreach($res as $row){?>
									<option><?php echo $row['pa_company']; ?></option>
								<?php 
								}?>
								</select>
							<div>
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