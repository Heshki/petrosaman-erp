<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php"; ?>
<div class="content-wrapper">
	<?php
	$fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];
	if($type_confirm == 'fb_pre_invoice_scan') {
		$echo_type = "اسکن پیش فاکتور";
	}elseif($type_confirm == 'fb_verify_admin1') {
		$echo_type = "تایید مدیر 1";
	}elseif($type_confirm == 'fb_send_customer') {
		$echo_type = "ارسال برای مشتری";
	}elseif($type_confirm == 'fb_verify_customer') {
		$echo_type = "تایید مشتری";
	}elseif($type_confirm == 'fb_verify_docs') {
		$echo_type = "تایید اسناد";
	}elseif($type_confirm == 'fb_verify_finan') {
		$echo_type = "تایید مالی";
	}elseif($type_confirm == 'fb_verify_admin2') {
		$echo_type = "تایید مدیر 2";
	}elseif($type_confirm == 'fb_wait_bar') {
		$echo_type = "تایید انبار";
	}elseif($type_confirm == 'fb_ready_bar') {
		$echo_type = "آماده بارگیری";
	}elseif($type_confirm == 'fb_get_sample') {
		$echo_type = "نمونه برداری";
	}elseif($type_confirm == 'fb_verify_bar') {
		$echo_type = "تایی بارگیری";
	}elseif($type_confirm == 'fb_exit_doc') {
		$echo_type = "حواله خروج";
	}elseif($type_confirm == 'fb_result_analyze') {
		$echo_type = "نتیجه آنالیز";
	}

	breadcrumb("تایید پیشنهاد فروش" . " (" . $echo_type . ")");

	$fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];
	if(isset($_POST['up_file'])){
		$type = $_POST['typee'];
		$fb_id = $_POST['fb_id'];
		$filename = $_FILES['fileToUpload']['name'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$size = $_FILES['fileToUpload']['size'];
		$m_name = upload_file($filename, $tmp_name, $size, $type, $fb_id);
		$m_type = "pre_invoice_sale";
		$m_name_file = "no_signed";
		if($m_name) {
			$sql = "insert into media (m_name, m_type, m_name_file, bu_id) values ('$m_name', '$m_type', '$m_name_file', $fb_id)";
			ex_query($sql);
			$sql1 = "update factor_body set fb_pre_invoice_scan = 1 where fb_id = $fb_id";
			ex_query($sql1);
		}
	}

	if(isset($_POST['up_file_singed'])){
		$type = $_POST['typee'];
		$fb_id = $_POST['fb_id'];
		$filename = $_FILES['fileToUpload']['name'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$size = $_FILES['fileToUpload']['size'];
		$m_name = upload_file($filename, $tmp_name, $size, $type, $fb_id);
		$m_type = "pre_invoice_sale";
		$m_name_file = "signed";
		if($m_name) {
			$sql = "insert into media (m_name, m_type, m_name_file, bu_id) values ('$m_name', '$m_type', '$m_name_file', $fb_id)";
			ex_query($sql);
		}
	}

	if(isset($_POST['delete-img'])){
		$filename1 = $_POST['filename'];
		$image_id = $_POST['image_id'];

		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/" . $filename1);
		$sql = "delete from media where m_id = $image_id";
			ex_query($sql);
		if(unlink($path)){
			$sql = "delete from media where m_id = $image_id";
			ex_query($sql);
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}
	?>
	<section class="content">
		<div id="details" class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<?php load_factor_body($fb_id); ?>
				</div>
			</div>
			<?php
			if($type_confirm == 'fb_pre_invoice_scan') { ?>
				<form action="" method="post" enctype="multipart/form-data">
					<br>
					<div class="row">
						<div class="col-md-6">
							<h4>بارگزاری پیش فاکتور اسکن شده</h4><br>
							<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
							<input type="hidden" name="typee" value="invoice">
							<input type="hidden" name="fb_id" value="<?php echo $_GET['fb_id']; ?>">
							<button type="submit" class="btn btn-success" name="up_file">بارگزاری فایل</button>
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
						<?php pre_invoice_scan($fb_id); ?>
					</div>
				</div>
				<script>
		  			var loadFile = function(event) {
				    	var output = document.getElementById('output');
			    		output.src = URL.createObjectURL(event.target.files[0]);
		  			};
				</script>
				<a href="<?php get_view("factor"); ?>list-factor.php" class="btn btn-primary">بازگشت</a>
				<?php
			}
			elseif($type_confirm == 'fb_verify_admin1') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm=='fb_send_customer') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مشتری عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm == 'fb_verify_customer') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول بازرگانی عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm == 'fb_verify_docs') { ?>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<h4>بارگزاری پیش فاکتور اسکن شده (امضا شده توسط مشتری و تایید شده توسط واحد اسناد)</h4><br>
							<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
							<input type="hidden" name="typee" value="invoice">
							<input type="hidden" name="fb_id" value="<?php echo $_GET['fb_id']; ?>">
							<button type="submit" class="btn btn-success" name="up_file_singed">بارگزاری فایل</button>
						</div>
						<div class="col-md-6">
							<img class="img-responsive" id="output">
						</div>
					</div>
				</form>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<h4>نمایش پیش  فاکتور اسکن شده (امضا شده توسط مشتری وتایید شده توسط واحد اسناد)</h4>
						<?php singed_pre_invoice_scan($fb_id); ?>
					</div>
				</div>
				<script>
		  			var loadFile = function(event) {
				    	var output = document.getElementById('output');
			    		output.src = URL.createObjectURL(event.target.files[0]);
		  			};
				</script>
				<form action="list-factor.php" method="post">
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>ثبت اسناد عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_verify_finan') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول مالی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_verify_admin2') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}else if($type_confirm=='fb_wait_bar'){ ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_ready_bar') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<input type="text" name="verify"  id="verify" class="hidden">
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_get_sample') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول آزمایشگاه عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_verify_bar') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<div class="col-xs-12">
						<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}elseif ($type_confirm == 'fb_exit_doc') { ?>
				<form action="list-factor.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<h4>نمایش پیش  فاکتور اسکن شده</h4>
							<?php show_singed_pre_invoice_scan($fb_id); ?>
						</div>
					</div>
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
						<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
						<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
					</div>
					<input type="text" name="verify" id="verify" class="hidden" value="<?php echo $type_confirm; ?>">
					<input type="text" name="fb_id" class="hidden" value="<?php echo $fb_id; ?>">
					<div class="col-xs-12">
						<p>نگهبانی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
						<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
						<a href="list-factor.php" class="btn btn-danger">خیر</a>
					</div>
				</form>
			<?php
			}
			if($type_confirm=="fb_result_analyze"){ ?>
				<button type="button" data-toggle="modal" data-target="#result<?php echo $i; ?>" class="btn btn-primary btn-xs">ثبت نتیجه</button>
				<div class="modal" id="result<?php echo $i; ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><?php echo $row['fb_id'] ?></h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="" method="post">
									<textarea name="fb_result_analyze" id="fb_result_analyze" cols="20" rows="5"><?php echo $row['fb_result_analyze']; ?></textarea>
									<input type="text" class="text" name="fb_id" value="<?php echo $fb_id; ?>">
									<button type="submit" name="result_submit" id="result_submit" class="btn btn-warning">ثبت</button>
								</form>
								<?php
								if(isset($_POST['result_submit'])){
									$fb_result_analyze = $_POST['fb_result_analyze'];
									$fb_id = $_POST['fb_id'];
									exe_result_analyze($fb_id, $fb_result_analyze);
								}
								?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
							</div>
						</div>
					</div>
				</div>
			<?php
			} ?>
		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>
