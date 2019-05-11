<?php include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_user();
	if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
		$asd = select_a_user($u_id);
	}
?>
	<div class="content-wrapper">
	
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">کاربران</a></li>
				<li class="active">لیست کاربران</li>
			</ol>
		</section>

		<section class="content-header">
			<h1>لیست کاربران</h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">لیست کاربران</h3>
						</div>
						<div class="box-body">
							<form action="" method="post">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام</span>
											</div>
											<input type="text" name="u_name" placeholder="نام" class="form-control" value="<?php if(isset($_GET['u_id'])) { echo $asd[0]['u_name'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_family" placeholder="نام خانوادگی" class="form-control" value="<?php if(isset($_GET['u_id'])) { echo $asd[0]['u_family'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سطح دسترسی</span>
											</div>
											<select name="u_level" class="form-control">
												<option><?php if(isset($_GET['u_id'])) { echo $asd[0]['u_level'];}else{ echo ''; } ?></option>
												<option>مدیر</option>
												<option>فروش</option>
												<option>مالی</option>
												<option>انبار</option>
											</select>
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام کاربری</span>
											</div>
											<input type="text" name="u_username" placeholder="نام کاربری" class="form-control" value="<?php if(isset($_GET['u_id'])) { echo $asd[0]['u_username'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">رمز ورود</span>
											</div>
											<input type="text" name="u_password" placeholder="رمز ورود" class="form-control" value="<?php if(isset($_GET['u_id'])) { echo $asd[0]['u_password'];}else{ echo ''; } ?>">
											<input type="text" class="hidden" name="u_id" value="<?php echo $_GET['u_id']; ?>"
										</div>
										<div class="item col-md-4">
											<?php if(isset($_GET['u_id'])){
												?>
												<button type="submit" class="btn btn-warning btn-lg" name="u_edit">ویرایش</button>
												<?php
											}else{ ?>
											<button type="submit" class="btn btn-success btn-lg" name="u_submit">اضافه کردن</button>
											 <?php } ?>
										<?php 
										if(isset($_POST['u_submit'])) {
											include_once"functions.php";
											$array = array();
											array_push($array, $_POST['u_name']);
											array_push($array, $_POST['u_family']);
											array_push($array, $_POST['u_level']);
											array_push($array, $_POST['u_username']);
											array_push($array, $_POST['u_password']);
											insert_user($array);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
										if(isset($_POST['u_edit'])) {
											include_once"functions.php";
											$array = array();
											array_push($array, $_POST['u_id']);
											array_push($array, $_POST['u_name']);
											array_push($array, $_POST['u_family']);
											array_push($array, $_POST['u_level']);
											array_push($array, $_POST['u_username']);
											array_push($array, $_POST['u_password']);
											update_user($array);
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
										<th>نام دسترسی</th>
										<th>نام کاربری</th>
										<th>رمز ورود</th>
					  				</tr>
								</thead>
								<tbody>
								<?php foreach ($asb as $a ) { ?>
						  			<tr>
										<td><?php echo $a['u_name']; ?></td>
										<td><?php echo $a['u_family']; ?></td>
										<td><?php echo $a['u_level']; ?></td>
										<td><?php echo $a['u_username']; ?></td>
										<td><?php echo $a['u_password']; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a href="list-user.php?u_id=<?php echo $a['u_id']; ?>">مشاهده</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-user">حذف</button>
												<input class="hidden" type="text" name="delete-text" value="<?php echo $a['u_id']; ?>">
												<?php
												if(isset($_POST['delete-user'])){
													$u_id = $_POST['delete-text'];
													delete_user($u_id);
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
										<th>نام دسترسی</th>
										<th>نام کاربری</th>
										<th>رمز ورود</th>
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