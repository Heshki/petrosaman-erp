<?php include"../header.php"; include"../nav.php"; include"functions.php"; ?>
<div class="content-wrapper">
	<?php
	breadcrumb("تایید پیشنهاد فروش");
	
	$fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];
	?>
	<section class="content">
		<div id="details" class="col-xs-12">		
			<div class="box">
				<div class="box-body">
					<?php load_factor_body($fb_id); ?>
				</div>
			</div>
			<?php
			if($type_confirm == 'fb_verify_admin1') { ?>
				<form action="list-factor.php" method="post">
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
				<form action="list-factor.php" method="post">
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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
					<div class="col-xs-12">
						<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
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