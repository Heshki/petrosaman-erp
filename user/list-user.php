<?php include"../header.php"; include"../nav.php";
	$asb = list_user();
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
											<input type="text" name="u_name" placeholder="نام" class="form-control">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_family" placeholder="نام خانوادگی" class="form-control">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سطح دسترسی</span>
											</div>
											<select name="u_level" class="form-control">
												<option></option>
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
											<input type="text" name="u_username" placeholder="نام کاربری" class="form-control">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">رمز ورود</span>
											</div>
											<input type="password" name="u_password" placeholder="رمز ورود" class="form-control">
										</div>
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success btn-lg" name="u_submit">اضافه کردن</button>
										<?php 
										if(isset($_POST['u_submit'])) {
											$array = array();
											array_push($array, $_POST['u_name']);
											array_push($array, $_POST['u_family']);
											array_push($array, $_POST['u_level']);
											array_push($array, $_POST['u_username']);
											array_push($array, $_POST['u_password']);
											insert_user($array);
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
					  					<th>ردیف</th>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>نام دسترسی</th>
										<th>نام کاربری</th>
										<th>رمز ورود</th>
										<th>گروه</th>
										<th>ویرایش</th>
										<th>حذف</th>
										<th>مشاهده</th>
										<th>محاسبه حقوق</th>
					  				</tr>
								</thead>
								<tbody>
								<?php
								if(isset($_POST['u_edit'])) {
									$uid = $_POST['uid'];

									$array = array();
									array_push($array, $uid);
									array_push($array, $_POST['u_name']);
									array_push($array, $_POST['u_family']);
									array_push($array, $_POST['u_level']);
									array_push($array, $_POST['u_username']);
									array_push($array, $_POST['u_password']);
									array_push($array, $_POST['u_father']);
									array_push($array, $_POST['u_meli']);
									array_push($array, $_POST['u_birth']);
									array_push($array, $_POST['u_live_city']);
									array_push($array, $_POST['u_destination']);
									array_push($array, $_POST['u_mobile']);
									array_push($array, $_POST['u_tell']);
									array_push($array, $_POST['u_address']);
									array_push($array, $_POST['u_pre']);
									array_push($array, $_POST['u_description']);
									array_push($array, $_POST['u_group']);
									array_push($array, $_POST['u_pcode']);
									array_push($array, $_POST['u_wtype']);
									array_push($array, $_POST['u_marital']);
									array_push($array, $_POST['u_evidence']);
									array_push($array, $_POST['u_child_count']);
									array_push($array, $_POST['u_daily_wage']);
									array_push($array, $_POST['u_fix_right']);
									array_push($array, $_POST['u_fin_contract']);

									update_user($array);

									$bu_id = $uid;

									if(isset($_FILES['melicart_img']) && $_FILES['melicart_img']['size']>0){
										$filename = $_FILES['melicart_img']['name'];
										$tmp_name = $_FILES['melicart_img']['tmp_name'];
										$size = $_FILES['melicart_img']['size'];
										$type = "melicart";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['identify_1_img']) && $_FILES['identify_1_img']['size']>0){
										$filename = $_FILES['identify_1_img']['name'];
										$tmp_name = $_FILES['identify_1_img']['tmp_name'];
										$size = $_FILES['identify_1_img']['size'];
										$type = "identify_1";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['identify_2_img']) && $_FILES['identify_2_img']['size']>0){
										$filename = $_FILES['identify_2_img']['name'];
										$tmp_name = $_FILES['identify_2_img']['tmp_name'];
										$size = $_FILES['identify_2_img']['size'];
										$type = "identify_2";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['identify_3_img']) && $_FILES['identify_3_img']['size']>0){
										$filename = $_FILES['identify_3_img']['name'];
										$tmp_name = $_FILES['identify_3_img']['tmp_name'];
										$size = $_FILES['identify_3_img']['size'];
										$type = "identify_3";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['identify_4_img']) && $_FILES['identify_4_img']['size']>0){
										$filename = $_FILES['identify_4_img']['name'];
										$tmp_name = $_FILES['identify_4_img']['tmp_name'];
										$size = $_FILES['identify_4_img']['size'];
										$type = "identify_4";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['u_contract_img']) && $_FILES['u_contract_img']['size']>0){
										$filename = $_FILES['u_contract_img']['name'];
										$tmp_name = $_FILES['u_contract_img']['tmp_name'];
										$size = $_FILES['u_contract_img']['size'];
										$type = "u_contract";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['u_insurance_img']) && $_FILES['u_insurance_img']['size']>0){
										$filename = $_FILES['u_insurance_img']['name'];
										$tmp_name = $_FILES['u_insurance_img']['tmp_name'];
										$size = $_FILES['u_insurance_img']['size'];
										$type = "u_insurance";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['u_guarantee_img']) && $_FILES['u_guarantee_img']['size']>0){
										$filename = $_FILES['u_guarantee_img']['name'];
										$tmp_name = $_FILES['u_guarantee_img']['tmp_name'];
										$size = $_FILES['u_guarantee_img']['size'];
										$type = "u_guarantee";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['u_recognizance_img']) && $_FILES['u_recognizance_img']['size']>0){
										$filename = $_FILES['u_recognizance_img']['name'];
										$tmp_name = $_FILES['u_recognizance_img']['tmp_name'];
										$size = $_FILES['u_recognizance_img']['size'];
										$type = "u_recognizance";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['u_signature_img']) && $_FILES['u_signature_img']['size']>0){
										$filename = $_FILES['u_signature_img']['name'];
										$tmp_name = $_FILES['u_signature_img']['tmp_name'];
										$size = $_FILES['u_signature_img']['size'];
										$type = "u_signature";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}
									
									echo "<meta http-equiv='refresh' content='0'/>";
								}

								if($asb){
								$row = 1;
								foreach ($asb as $a ) {
									$u_id = $a['u_id'];
									$asd = select_a_user($u_id);
									?>
						  			<tr>
						  				<td><?php echo $row; ?></td>
										<td><?php echo $a['u_name']; ?></td>
										<td><?php echo $a['u_family']; ?></td>
										<td><?php echo $a['u_level']; ?></td>
										<td><?php echo $a['u_username']; ?></td>
										<td>***</td>
										<td><?php echo $a['u_group']; ?></td>
										<td>
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $u_id; ?>">ویرایش</button>
											<div class="modal fade text-xs-left" id="edit_modal<?php echo $u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $u_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="user_edit">
													<form action="" method="post" enctype="multipart/form-data">
													<input type="hidden" name="uid" value="<?php echo $u_id; ?>">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel3">ویرایش اطلاعات</h4>
														</div>
														<div class="modal-body">
															<div class="col-xs-12 no-padd">
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نام</span>
																		</div>
																		<input type="text" name="u_name" placeholder="نام" class="form-control" value="<?php echo $asd[0]['u_name']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نام خانوادگی</span>
																		</div>
																		<input type="text" name="u_family" placeholder="نام خانوادگی" class="form-control" value="<?php echo $asd[0]['u_family']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">سطح دسترسی</span>
																		</div>
																		<select name="u_level" class="form-control">
																			<option><?php echo $asd[0]['u_level']; ?></option>
																			<option>مدیر</option>
																			<option>فروش</option>
																			<option>مالی</option>
																			<option>انبار</option>
																		</select>
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نام کاربری</span>
																		</div>
																		<input type="text" name="u_username" placeholder="نام کاربری" class="form-control" value="<?php echo $asd[0]['u_username']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">رمز ورود</span>
																		</div>
																		<input type="password" name="u_password" placeholder="رمز ورود" class="form-control" value="<?php echo $asd[0]['u_password']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نام پدر</span>
																		</div>
																		<input type="text" name="u_father" placeholder="نام پدر" class="form-control" value="<?php echo $asd[0]['u_father']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">کد ملی</span>
																		</div>
																		<input type="text" name="u_meli" placeholder="کد ملی" class="form-control" value="<?php echo $asd[0]['u_meli']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">تاریخ تولد</span>
																		</div>
																		<input type="text" name="u_birth" placeholder="تاریخ تولد" autocomplete="off" class="form-control" id="f_date" value="<?php echo $asd[0]['u_birth']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شهر محل سکونت</span>
																		</div>
																		<input type="text" name="u_live_city" placeholder="شهر محل سکونت" class="form-control" value="<?php echo $asd[0]['u_live_city']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">مسافت تا کارخانه</span>
																		</div>
																		<input type="text" name="u_destination" placeholder="مسافت تا کارخانه" class="form-control" value="<?php echo $asd[0]['u_destination']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">موبایل</span>
																		</div>
																		<input type="text" name="u_mobile" placeholder="موبایل" class="form-control" value="<?php echo $asd[0]['u_mobile']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">تلفن ثابت</span>
																		</div>
																		<input type="text" name="u_tell" placeholder="تلفن ثابت" class="form-control" value="<?php echo $asd[0]['u_tell']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">آدرس</span>
																		</div>
																		<textarea name="u_address" placeholder="آدرس" class="form-control"><?php echo $asd[0]['u_address']; ?></textarea>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">سنوات</span>
																		</div>
																		<textarea name="u_pre" placeholder="سنوات" class="form-control"><?php echo $asd[0]['u_pre']; ?></textarea>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">توضیحات</span>
																		</div>
																		<textarea name="u_description" placeholder="توضیحات" class="form-control"><?php echo $asd[0]['u_description']; ?></textarea>
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">گروه</span>
																		</div>
																		<select name="u_group" class="form-control">
																			<?php
																			$all_groups = list_group();
																			foreach ($all_groups as $a_group) {
																				?>
																				<option <?php if($asd[0]['u_group']==$a_group['g_name']) echo "selected"; ?>><?php echo $a_group['g_name']; ?></option>
																				<?php
																			}
																			?>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شماره پرسنل</span>
																		</div>
																		<input type="text" name="u_pcode" placeholder="شماره پرسنل" class="form-control" value="<?php echo $asd[0]['u_pcode']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">سمت</span>
																		</div>
																		<input type="text" name="u_wtype" placeholder="سمت" class="form-control" value="<?php echo $asd[0]['u_wtype']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">وضعیت تاهل</span>
																		</div>
																		<select name="u_marital" class="form-control">
																			<option <?php if($asd[0]['u_marital']=="مجرد") echo "selected"; ?>>مجرد</option>
																			<option <?php if($asd[0]['u_marital']=="متاهل") echo "selected"; ?>>متاهل</option>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">تعداد فرزند</span>
																		</div>
																		<input type="text" name="u_child_count" placeholder="تعداد فرزند" class="form-control" value="<?php echo $asd[0]['u_child_count']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">مدرک</span>
																		</div>
																		<input type="text" name="u_evidence" placeholder="مدرک" class="form-control" value="<?php echo $asd[0]['u_evidence']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">دستمزد روزانه</span>
																		</div>
																		<input type="text" name="u_daily_wage" placeholder="دستمزد روزانه" class="form-control" value="<?php echo $asd[0]['u_daily_wage']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">اضافه ثابت حقوق</span>
																		</div>
																		<input type="text" name="u_fix_right" placeholder="اضافه ثابت حقوق" class="form-control" value="<?php echo $asd[0]['u_fix_right']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">تاریخ انقضای قرارداد</span>
																		</div>
																		<input type="text" name="u_fin_contract" placeholder="تاریخ انقضای قرارداد" autocomplete="off" class="form-control pdp-el" id="f_date" value="<?php echo $asd[0]['u_fin_contract']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>کارت ملی</label>
																		<input type="file" name="melicart_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'melicart'); ?>" class="img-responsive list-user-up-img">
																	</div>
																	<div class="item col-md-6">
																		<label>شناسنامه ۱</label>
																		<input type="file" name="identify_1_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'identify_1'); ?>" class="img-responsive list-user-up-img">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>شناسنامه ۲</label>
																		<input type="file" name="identify_2_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'identify_2'); ?>" class="img-responsive list-user-up-img">
																	</div>
																	<div class="item col-md-6">
																		<label>شناسنامه ۳</label>
																		<input type="file" name="identify_3_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'identify_3'); ?>" class="img-responsive list-user-up-img">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>شناسنامه ۴</label>
																		<input type="file" name="identify_4_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'identify_4'); ?>" class="img-responsive list-user-up-img">
																	</div>
																	<div class="item col-md-6">
																		<label>تصویر برگ قرارداد</label>
																		<input type="file" name="u_contract_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'u_contract'); ?>" class="img-responsive list-user-up-img">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>تصویر دفترچه بیمه</label>
																		<input type="file" name="u_insurance_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'u_insurance'); ?>" class="img-responsive list-user-up-img">
																	</div>
																	<div class="item col-md-6">
																		<label>تصویر صفحه ضمانت انجام کار</label>
																		<input type="file" name="u_guarantee_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'u_guarantee'); ?>" class="img-responsive list-user-up-img">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>برگ تعهدنامه حسن انجام کار</label>
																		<input type="file" name="u_recognizance_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'u_recognizance'); ?>" class="img-responsive list-user-up-img">
																	</div>
																	<div class="item col-md-6">
																		<label>امضای الکترونیکی</label>
																		<input type="file" name="u_signature_img" accept="image/*">
																		<img src="<?php echo user_get_media($u_id, 'u_signature'); ?>" class="img-responsive list-user-up-img">
																	</div>
																</div>
																<script src="<?php get_url(); ?>include/media/script.js"></script>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-primary" name="u_edit">ویرایش</button>
														</div>
													</div>
													</form>
												</div>
											</div>
										</td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-sm" type="submit" name="delete-user">حذف</button>
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
										<td>
											<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#view_modal<?php echo $u_id; ?>">مشاهده</button>
											<div class="modal fade text-xs-left" id="view_modal<?php echo $u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#view_modal<?php echo $u_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="user_view">
													<form action="" method="post">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel3">اطلاعات کاربر</h4>
														</div>
														<div class="modal-body">
															<div class="col-xs-12 no-padd">
																<table id="example1" class="table table-bordered table-striped">
																	<tr>
																		<td>نام</td>
																		<td><?php echo $asd[0]['u_name']; ?></td>
																	</tr>
																	<tr>
																		<td>نام خانوادگی</td>
																		<td><?php echo $asd[0]['u_family']; ?></td>
																	</tr>
																	<tr>
																		<td>سطح دسترسی</td>
																		<td><?php echo $asd[0]['u_level']; ?></td>
																	</tr>
																	<tr>
																		<td>نام کاربری</td>
																		<td><?php echo $asd[0]['u_username']; ?></td>
																	</tr>
																	<tr>
																		<td>رمز ورود</td>
																		<td>***</td>
																	</tr>
																	<tr>
																		<td>نام پدر</td>
																		<td><?php echo $asd[0]['u_father']; ?></td>
																	</tr>
																	<tr>
																		<td>کد ملی</td>
																		<td><?php echo per_number( $asd[0]['u_meli'] ); ?></td>
																	</tr>
																	<tr>
																		<td>تاریخ تولد</td>
																		<td><?php echo per_number( $asd[0]['u_birth'] ); ?></td>
																	</tr>
																	<tr>
																		<td>شهر محل سکونت</td>
																		<td><?php echo $asd[0]['u_live_city']; ?></td>
																	</tr>
																	<tr>
																		<td>مسافت تا کارخانه</td>
																		<td><?php echo per_number( $asd[0]['u_destination'] ); ?></td>
																	</tr>
																	<tr>
																		<td>موبایل</td>
																		<td><?php echo per_number( $asd[0]['u_mobile'] ); ?></td>
																	</tr>
																	<tr>
																		<td>تلفن ثابت</td>
																		<td><?php echo per_number( $asd[0]['u_tell'] ); ?></td>
																	</tr>
																	<tr>
																		<td>آدرس</td>
																		<td><?php echo $asd[0]['u_address']; ?></td>
																	</tr>
																	<tr>
																		<td>سنوات</td>
																		<td><?php echo $asd[0]['u_pre']; ?></td>
																	</tr>
																	<tr>
																		<td>توضیحات</td>
																		<td><?php echo $asd[0]['u_description']; ?></td>
																	</tr>
																	<tr>
																		<td>کد گروه</td>
																		<td><?php echo $asd[0]['u_group']; ?></td>
																	</tr>
																	<tr>
																		<td>شماره پرسنل</td>
																		<td><?php echo per_number($asd[0]['u_pcode']); ?></td>
																	</tr>
																	<tr>
																		<td>سمت</td>
																		<td><?php echo $asd[0]['u_wtype']; ?></td>
																	</tr>
																	<tr>
																		<td>وضعیت تاهل</td>
																		<td><?php echo $asd[0]['u_marital']; ?></td>
																	</tr>
																	<tr>
																		<td>تعداد فرزند</td>
																		<td><?php echo per_number($asd[0]['u_child_count']); ?></td>
																	</tr>
																	<tr>
																		<td>مدرک</td>
																		<td><?php echo $asd[0]['u_evidence']; ?></td>
																	</tr>
																	<tr>
																		<td>دستمزد روزانه</td>
																		<td><?php echo per_number(number_format($asd[0]['u_daily_wage'])); ?></td>
																	</tr>
																	<tr>
																		<td>اضافه ثابت حقوق</td>
																		<td><?php echo per_number(number_format($asd[0]['u_fix_right'])); ?></td>
																	</tr>
																	<tr>
																		<td>تاریخ انقضای قرارداد</td>
																		<td><?php echo per_number($asd[0]['u_fin_contract']); ?></td>
																	</tr>
																	<tr>
																		<td>کارت ملی</td>
																		<td>
																			<?php
																			$melicart_url = user_get_media($u_id, 'melicart');
																			if($melicart_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'melicart'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>شناسنامه ۱</td>
																		<td>
																			<?php
																			$identify_1_url = user_get_media($u_id, 'identify_1');
																			if($identify_1_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'identify_1'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>شناسنامه ۲</td>
																		<td>
																			<?php
																			$identify_2_url = user_get_media($u_id, 'identify_2');
																			if($identify_2_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'identify_2'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>شناسنامه ۳</td>
																		<td>
																			<?php
																			$identify_3_url = user_get_media($u_id, 'identify_3');
																			if($identify_3_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'identify_3'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>شناسنامه ۴</td>
																		<td>
																			<?php
																			$identify_4_url = user_get_media($u_id, 'identify_4');
																			if($identify_4_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'identify_4'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>تصویر برگ قرارداد</td>
																		<td>
																			<?php
																			$u_contract_url = user_get_media($u_id, 'u_contract');
																			if($u_contract_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'u_contract'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>تصویر دفترچه بیمه</td>
																		<td>
																			<?php
																			$u_insurance_url = user_get_media($u_id, 'u_insurance');
																			if($u_insurance_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'u_insurance'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>تصویر صفحه ضمانت انجام کار</td>
																		<td>
																			<?php
																			$u_guarantee_url = user_get_media($u_id, 'u_guarantee');
																			if($u_guarantee_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'u_guarantee'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>برگ تعهدنامه حسن انجام کار</td>
																		<td>
																			<?php
																			$u_recognizance_url = user_get_media($u_id, 'u_recognizance');
																			if($u_recognizance_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'u_recognizance'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																	<tr>
																		<td>امضای الکترونیکی</td>
																		<td>
																			<?php
																			$u_signature_url = user_get_media($u_id, 'u_signature');
																			if($u_signature_url == ""){
																				echo "موجود نیست!";
																			}else{
																				?>
																				<a target="_blank" href="<?php echo user_get_media($u_id, 'u_signature'); ?>">مشاهده</a>
																				<?php
																			}
																			?>
																		</td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
													</form>
												</div>
											</div>
										</td>
										<td>
											<a href="<?php echo get_url(); ?>user/raw_rights.php/?uid=<?php echo $u_id; ?>&month=<?php echo $myYear . "_" . $myMonth; ?>"><button class="btn btn-warning btn-sm" type="submit" name="delete-user">محاسبه حقوق</button></a>
										</td>
						  			</tr>
						  		<?php $row++; ?>
								<?php }
								} else { ?>
								<tr>
									<td colspan="10">داده ای موجود نیست.</td>
								</tr>
								<?php
								}
								?>
								</tbody>
								<tfoot>
					  				<tr>
					  					<th>ردیف</th>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>نام دسترسی</th>
										<th>نام کاربری</th>
										<th>رمز ورود</th>
										<th>گروه</th>
										<th>ویرایش</th>
										<th>حذف</th>
										<th>مشاهده</th>
										<th>محاسبه حقوق</th>
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