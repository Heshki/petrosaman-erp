<?php include"../header.php"; include"../nav.php"; include"functions.php";
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
											<input type="text" name="u_password" placeholder="رمز ورود" class="form-control">
										</div>
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success btn-lg" name="u_submit">اضافه کردن</button>
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
										<th>گروه</th>
										<th>ویرایش</th>
										<th>حذف</th>
										<th>مشاهده</th>
					  				</tr>
								</thead>
								<tbody>
								<?php
								if(isset($_POST['u_edit'])) {
									include_once"functions.php";
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

									update_user($array);

									$bu_id = $uid;

									if(isset($_FILES['melicart_img']) && $_FILES['melicart_img']['size']>0){
										$filename = $_FILES['melicart_img']['name'];
										$tmp_name = $_FILES['melicart_img']['tmp_name'];
										$size = $_FILES['melicart_img']['size'];
										$type = "melicart";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}

									if(isset($_FILES['identify_img']) && $_FILES['identify_img']['size']>0){
										$filename = $_FILES['identify_img']['name'];
										$tmp_name = $_FILES['identify_img']['tmp_name'];
										$size = $_FILES['identify_img']['size'];
										$type = "identify";
										user_upload_file($filename, $tmp_name, $size, $type, $bu_id);
									}
									
									echo "<meta http-equiv='refresh' content='0'/>";
								}

								foreach ($asb as $a ) {
									$u_id = $a['u_id'];
									$asd = select_a_user($u_id);
									?>
						  			<tr>
										<td><?php echo $a['u_name']; ?></td>
										<td><?php echo $a['u_family']; ?></td>
										<td><?php echo $a['u_level']; ?></td>
										<td><?php echo $a['u_username']; ?></td>
										<td><?php echo per_number( $a['u_password'] ); ?></td>
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
																		<input type="text" name="u_password" placeholder="رمز ورود" class="form-control" value="<?php echo $asd[0]['u_password']; ?>">
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
																			<option><?php echo $asd[0]['u_group']; ?></option>
																			<option>A</option>
																			<option>B</option>
																			<option>C</option>
																			<option>D</option>
																		</select>
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<label>کارت ملی</label>
																		<input type="file" name="melicart_img" accept="image/*" onchange="loadFile1(event)">
																		<img src="<?php echo user_get_media($u_id, 'melicart'); ?>" class="img-responsive list-user-up-img" id="output1">
																	</div>
																	<div class="item col-md-6">
																		<label>شناسنامه</label>
																		<input type="file" name="identify_img" accept="image/*" onchange="loadFile2(event)">
																		<img src="<?php echo user_get_media($u_id, 'identify'); ?>" class="img-responsive list-user-up-img" id="output2">
																	</div>
																</div>
																<script type="text/javascript">
																	var loadFile1 = function(event) {
																		var output1 = document.getElementById('output1');
																		output1.src = URL.createObjectURL(event.target.files[0]);
																	};

																	var loadFile2 = function(event) {
																		var output2 = document.getElementById('output2');
																		output2.src = URL.createObjectURL(event.target.files[0]);
																	};
																</script>
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
																		<td><?php echo per_number( $asd[0]['u_password'] ); ?></td>
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
																		<td>کارت ملی</td>
																		<td>
																			<a target="_blank" href="<?php echo user_get_media($u_id, 'melicart'); ?>">مشاهده</a>
																		</td>
																	</tr>
																	<tr>
																		<td>شناسنامه</td>
																		<td>
																			<a target="_blank" href="<?php echo user_get_media($u_id, 'identify'); ?>">مشاهده</a>
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
										<th>گروه</th>
										<th>ویرایش</th>
										<th>حذف</th>
										<th>مشاهده</th>
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