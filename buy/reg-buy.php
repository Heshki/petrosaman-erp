<?php $title = "ثبت فاکتور جدید"; include"../header.php"; include"../nav.php"; include"functions.php";
include"back.php";
require_once"../customer/functions.php";
require_once"../product/functions.php";
require_once"../category/functions.php";
?>
	<script type="text/javascript" src="<?php get_url(); ?>factor/js/factor.js"></script>
	<div class="content-wrapper">
		
		<?php breadcrumb("پیشنهاد خرید"); ?>
		
		<section class="content">
			<div id="details" class="col-xs-12">	
				<?php
				if(isset($_POST['del-bu'])){
					$bu_id = $_POST['del-bu'];
					delete_factor_buy($bu);
					?>
					<div class="alert alert-success">
						مورد با موفقیت حذف شد
					</div>
					<?php
				}
				
				if(isset($_POST['set_bu'])){
					$f_id = $_GET['f_id'];
					$p_id = $_POST['p_id'];
					$bu_quantity = $_POST['bu_quantity'];
					$array = array();
					array_push($array, $f_id);
					array_push($array, $p_id);						
					array_push($array, $bu_quantity);
					insert_factor_buy($array);
					?>
					<div class="alert alert-success">
						ردیف کالا با موفقیت ثبت شد
					</div>
					<?php
				}
				
				if(isset($_POST['f_submit'])){
					$c_id = $_POST['c_id'];
					$f_date = $_POST['f_date'];
					$u_id = $_SESSION['user_id'];
					$list = array();
					array_push($list, $c_id);
					array_push($list, $f_date);
					array_push($list, $u_id);
					$f_id = insert_factor($list);
					$url = get_url() . "reg-buy.php?f_id=" . $f_id;
					?>
					<script type="text/javascript">
						window.location.href = "<?php echo $url; ?>";
					</script>
				<?php
				}
					
				if(isset($_GET['f_id'])){
					$f_id = $_GET['f_id'];
					$list = get_select_query("select * from factor where f_id = $f_id");
					$f_date = $list[0]['f_date'];
					$c_id = $list[0]['c_id'];
				} else {
					$f_date = "";
					$c_id = "";
				}						
				?>
				<form action="" method="post">
					<div class="row">
						<h3 class="col-md-12">سرفاکتور</h3>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام  مشتری</span>
								<?php show_customer_as_select($c_id); ?>
							</div>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">تاریخ صدور</span>
							</div>	
							<input value="<?php echo $f_date; ?>" autocomplete="off" type="text" id="f_date" name="f_date" placeholder="تاریخ صدور" class="form-control" required>
						</div>
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-success btn-lg" name="f_submit">ساخت سر فاکتور</button>
						</div>
					</div><br>
				</form>
				
				<?php
				if(isset($_GET['f_id'])){
					$f_id = $_GET['f_id']; ?>
				<div class="row">
					<div class="col-md-6">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">بدنه فاکتور</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<tbody>
										<tr>
											<th>#</th>
											<th>نام ماده اولیه</th>
											<th>وزن</th>
										</tr>
										<?php
										$i = 1;
										$list = get_factor_buy($f_id);
										if(count($list)){
											foreach($list as $l){ ?>
											<tr>                   
												<td><?php echo per_number($i); ?></td>
												<td>
												<?php echo get_product_type($l['p_id']); ?>
												</td>
												<td></td>
												<td><?php echo per_number(number_format($l['bu_quantity'])); ?></td>
												
												<td>
													<form onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
														<button name="del-fb" value="<?php echo $l['fb_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
													</form>
												</td>
											</tr>
											<?php
											$i++;
											}
										} else { ?>
											<tr>                   
												<td colspan="6" class="text-center">موردی جهت نمایش موجود نیست</td>
											</tr>
										<?php												
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
					
				<form action="" method="post">
					<div class="row">
						<h3 class="col-md-12">بدنه فاکتور</h3>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">ماده اولیه</span>
							</div>
							<?php 
								$res = list_product();?>
								<select class="form-control">
							<?php
								foreach($res as $row){
									$typee = $row['p_type'];
									if($typee=="Material"){?>
										<option><?php echo $row['p_name']; ?></option>
							<?php 
									}
								}?>
								</select>
						</div>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">وزن</span>
							</div>
							<input type="text" name="bu_quantity" placeholder="وزن" class="form-control" required>
						</div>
						
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-success btn-lg" name="set_bu">ثبت ردیف</button>
						</div>
					</div>
				</form>	
				<?php
				} ?>
			</div>
		</section>
	</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>