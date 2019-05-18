<?php $title = "لیست راننده ها"; include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_driver();
	if(isset($_GET['dr_id'])){
		$dr_id = $_GET['dr_id'];
		$asd = select_a_driver($dr_id);
	}
?>
	<div class="content-wrapper">
	
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">راننده ها</a></li>
				<li class="active">لیست راننده ها</li>
			</ol>
		</section>

		<section class="content-header">
			<h1>لیست راننده ها </h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">لیست راننده ها</h3>
						</div>
						<div class="box-body">
							<form action="" method="post">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام</span>
											</div>
											<input type="text" name="dr_name" placeholder="نام" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_name'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="dr_family" placeholder="نام خانوادگی" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_family'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">کد ملی</span>
											</div>
											<input type="text" name="dr_kmeli" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_kmeli'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نوع ماشین</span>
											</div>
											<input type="text" name="dr_car"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_car'];}else{ echo ''; } ?>">
											<input type="text" class="hidden" name="dr_id" value="<?php echo $_GET['dr_id']; ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">پلاک ماشین</span>
											</div>
											<input type="text" name="dr_plate"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_plate'];}else{ echo ''; } ?>">
											<input type="text" class="hidden" name="dr_id" value="<?php echo $_GET['dr_id']; ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">موبایل</span>
											</div>
											<input type="text" name="dr_mobile"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_mobile'];}else{ echo ''; } ?>">
											<input type="text" class="hidden" name="dr_id" value="<?php echo $_GET['dr_id']; ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">وضعیت</span>
											</div>
											<input type="text" name="dr_status"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_status'];}else{ echo ''; } ?>">
											<input type="text" class="hidden" name="dr_id" value="<?php echo $_GET['dr_id']; ?>">
										</div>
										<div class="item col-md-4">
											<?php if(isset($_GET['dr_id'])){
												?>
												<button type="submit" class="btn btn-warning btn-lg" name="dr_edit">ویرایش</button>
												<?php
											}else{ ?>
											<button type="submit" class="btn btn-success btn-lg" name="dr_submit">اضافه کردن</button>
											 <?php } ?>
										<?php 
										if(isset($_POST['dr_submit'])) {
											include_once"functions.php";
											$array = array();
											array_push($array, $_POST['dr_name']);
											array_push($array, $_POST['dr_family']);
											array_push($array, $_POST['dr_kmeli']);
											array_push($array, $_POST['dr_car']);
											array_push($array, $_POST['dr_plate']);
											array_push($array, $_POST['dr_mobile']);
											array_push($array, $_POST['dr_status']);
											insert_driver($array);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
										if(isset($_POST['dr_edit'])) {
											include_once"functions.php";
											$array = array();
											array_push($array, $_POST['dr_id']);
											array_push($array, $_POST['dr_name']);
											array_push($array, $_POST['dr_family']);
											array_push($array, $_POST['dr_kmeli']);
											array_push($array, $_POST['dr_car']);
											array_push($array, $_POST['dr_plate']);
											array_push($array, $_POST['dr_mobile']);
											array_push($array, $_POST['dr_status']);
											update_driver($array);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
										?>
										</div>
									</div>
								</div>
							</form>

				  			<table id="example1" class="table table-bordered table-striped">
								<thead>
					  				<tr>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>کدملی</th>
										<th>نوع ماشین</th>
										<th>پلاک ماشین</th>
										<th>شماره همراه</th>
										<th>وضعیت</th>
					  				</tr>
								</thead>
								<tbody>
								<?php 
								$asb = get_select_query("select * from driver");
								foreach ($asb as $a ) { ?>
						  			<tr>
										<td><?php echo $a['dr_name']; ?></td>
										<td><?php echo $a['dr_family']; ?></td>
										<td><?php echo $a['dr_kmeli']; ?></td>
										<td><?php echo $a['dr_car']; ?></td>
										<td><?php echo $a['dr_plate']; ?></td>
										<td><?php echo $a['dr_mobile']; ?></td>
										<td><?php echo $a['dr_status']; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a href="list-driver.php?dr_id=<?php echo $a['dr_id']; ?>">مشاهده</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-driver">حذف</button>
												<input class="hidden" type="text" name="delete-text" value="<?php echo $a['dr_id']; ?>">
												<?php
												if(isset($_POST['delete-driver'])){
													$u_id = $_POST['delete-text'];
													delete_driver($u_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
						  			</tr>
								<?php } ?>
								</tbody>
								<tfoot>
					  				<tr>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>کدملی</th>
										<th>نوع ماشین</th>
										<th>پلاک ماشین</th>
										<th>شماره همراه</th>
										<th>وضعیت</th>
					  				</tr>
								</tfoot>
				  			</table>
						</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>