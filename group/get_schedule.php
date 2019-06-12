<?php include"../header.php"; include"../nav.php"; include"functions.php"; ?>
	<div class="content-wrapper">
		
		<?php breadcrumb("مشاهده گروه ها"); ?>
		
		<section class="content">
			<div id="details" class="col-xs-12">	
				<div class="row">
					<form action="" method="get">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">انتخاب گروه</span>
								<select name="group" class="form-control">
									<option <?php if(isset($_GET['group']) && $_GET['group']=="A"){echo "selected";} ?> value="A">A</option>
									<option <?php if(isset($_GET['group']) && $_GET['group']=="B"){echo "selected";} ?> value="B">B</option>
									<option <?php if(isset($_GET['group']) && $_GET['group']=="C"){echo "selected";} ?> value="C">C</option>
									<option <?php if(isset($_GET['group']) && $_GET['group']=="D"){echo "selected";} ?> value="D">D</option>
								</select>
							</div>
						</div>
						<div class="sch_submit_c item col-md-1">
							<button type="submit" class="btn btn-success btn-sm" name="sch_submit" value="1">انتخاب</button>
						</div>
					</form>
					<?php
					if ( isset ( $_GET["sch_submit"] ) ) {
						if ( ( isset( $_GET["group"] ) && $_GET["group"] != ""  ) ) {
					?>
					<div class="sch_submit_c item col-md-2">
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-keyboard="false" data-target="#sch_modal">مشاهده و چاپ برنامه</button>
						<div class="modal fade text-xs-left" id="sch_modal" tabindex="-1" role="dialog" aria-labelledby="#sch_modal" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document" id="user_edit">
								<input type="hidden" name="uid" value="<?php echo $u_id; ?>">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h4 class="modal-title" id="myModalLabel3">برنامه گروه <?php echo $_GET["group"]; ?></h4>
									</div>
									<div class="modal-body">
										<div class="col-xs-12 no-padd">
											<table class="col-xs-12 table-responsive sch_save_table sc_table_center" id="sch_print">
												<thead>
													<tr>
														<th colspan="4" class="text-center">برنامه شیفت پرسنل شرکت پتروسامان آذر تتیس</th>
										     		</tr>
										     		<tr>
														<th>گروه</th>
														<th>A</th>
														<th>ماه</th>
														<th>خرداد</th>
										     		</tr>
										     		<tr>
														<th>تاریخ / شیفت</th>
														<th>روز</th>
														<th>شب</th>
														<th>استراحت</th>
										     		</tr>
											    </thead>
											    <tbody>
											    	<?php
											    	$myDate = jdate('Y/n/j');
													$myDataArray = explode('/', $myDate);

													$myYear = $myDataArray[0];
													$myMonth = $myDataArray[1];

											    	$sc_month = $myMonth;
													$sc_group = $_GET["group"];

											    	$sql3 = "SELECT sc_schedule FROM schedule WHERE sc_month = '$sc_month' AND sc_group = '$sc_group'";
													$mySchedule = get_var_query($sql3);
													$myScheduleArray = explode('.', $mySchedule);

													if ( $myMonth == 1 || $myMonth == 2 || $myMonth == 3 || $myMonth == 4 || $myMonth == 5 || $myMonth == 6 ) {
														$limit = 31;
													} else if ( $myMonth == 7 || $myMonth == 8 || $myMonth == 9 || $myMonth == 10 || $myMonth == 11 ) {
														$limit = 30;
													} else if ( $myMonth == 12 ) {
														$limit = 29;
													}

											    	for ($i=1; $i <= $limit ; $i++) {
											    		$j = $i-1;
											    		?>
											    		<tr>
															<td><?php echo per_number( $myYear . "/" . $myMonth . "/" . $i ); ?></td>
															<td><?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == "day" ) { echo "*"; } else { echo "-"; } } ?></td>
															<td><?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == "night" ) { echo "*"; } else { echo "-"; } } ?></td>
															<td><?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == "rest" ) { echo "*"; } else { echo "-"; } } ?></td>
														</tr>
											    		<?php
											    	}
											    	?>
											    </tbody>
											    <tfoot>
													<tr>
														<th>تاریخ \ شیفت</th>
														<th>روز</th>
														<th>شب</th>
														<th>استراحت</th>
										     		</tr>
											    </tfoot>
											</table>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" id="sch_printer">چاپ برنامه</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					}
					?>
				</div>

				<?php
				if ( isset( $_GET["group"] ) && $_GET["group"] != "" ) {
				?>

				<div class="row">
					<table id="example1" class="table table-striped table-bordered table-responsive sch_save_table">
						<thead>
			  				<tr>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>نام دسترسی</th>
								<th>نام کاربری</th>
								<th>رمز ورود</th>
								<th>گروه</th>
								<th>مشاهده</th>
			  				</tr>
						</thead>
						<tbody>
						<?php
						$asb = list_user($_GET["group"]);
						if ( $asb ) {
						foreach ($asb as $a ) {
							$u_id = $a['u_id'];
							$asd = select_a_user($u_id);
							?>
				  			<tr>
								<td><?php echo $a['u_name']; ?></td>
								<td><?php echo $a['u_family']; ?></td>
								<td><?php echo $a['u_level']; ?></td>
								<td><?php echo $a['u_username']; ?></td>
								<td><?php echo per_number ($a['u_password']); ?></td>
								<td><?php echo $a['u_group']; ?></td>
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
																<td><?php echo per_number ($asd[0]['u_password']); ?></td>
															</tr>
															<tr>
																<td>نام پدر</td>
																<td><?php echo $asd[0]['u_father']; ?></td>
															</tr>
															<tr>
																<td>کد ملی</td>
																<td><?php echo per_number ($asd[0]['u_meli']); ?></td>
															</tr>
															<tr>
																<td>تاریخ تولد</td>
																<td><?php echo per_number ($asd[0]['u_birth']); ?></td>
															</tr>
															<tr>
																<td>شهر محل سکونت</td>
																<td><?php echo $asd[0]['u_live_city']; ?></td>
															</tr>
															<tr>
																<td>مسافت تا کارخانه</td>
																<td><?php echo per_number ($asd[0]['u_destination']); ?></td>
															</tr>
															<tr>
																<td>موبایل</td>
																<td><?php echo per_number ($asd[0]['u_mobile']); ?></td>
															</tr>
															<tr>
																<td>تلفن ثابت</td>
																<td><?php echo per_number ($asd[0]['u_tell']); ?></td>
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
																	<a target="_blank" href="<?php echo user_get_media($u_id, 'melicart'); ?>"><?php echo user_get_media($u_id, 'melicart'); ?></a>
																</td>
															</tr>
															<tr>
																<td>شناسنامه</td>
																<td>
																	<a target="_blank" href="<?php echo user_get_media($u_id, 'identify'); ?>"><?php echo user_get_media($u_id, 'identify'); ?></a>
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
						<?php 
							}
						} else {
							?>
							<tr>
								<th colspan="7">موردی برای نمایش موجود نیست</th>
							</tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
			  				<tr>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>نام دسترسی</th>
								<th>نام کاربری</th>
								<th>رمز ورود</th>
								<th>گروه</th>
								<th>مشاهده</th>
			  				</tr>
						</tfoot>
		  			</table>
				</div>
				<?php
				}
				?>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>