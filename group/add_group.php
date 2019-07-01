<?php include"../header.php"; include"../nav.php"; include"functions.php"; 
	$asb = list_group();
	?>
	<div class="content-wrapper">
		
		<?php breadcrumb("تعریف گروه"); ?>
		
		<section class="content">
			<div id="details" class="col-xs-12">	
				<div class="row">
					<form action="" method="post">
						<div id="details" class="col-xs-12">
							<div class="row">
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام گروه</span>
									</div>
									<input type="text" name="g_name" placeholder="نام گروه" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">سرپرست کوره</span>
									</div>
									<input type="text" name="g_fur_sup" placeholder="سرپرست کوره" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">سرپرست دانه بندی</span>
									</div>
									<input type="text" name="g_gra_sup" placeholder="سرپرست دانه بندی" class="form-control">
								</div>
								<div class="item col-md-4">
									<button type="submit" class="btn btn-success btn-lg" name="g_submit">اضافه کردن</button>
								<?php 
								if(isset($_POST['g_submit'])) {
									$array = array();
									array_push($array, $_POST['g_name']);
									array_push($array, $_POST['g_fur_sup']);
									array_push($array, $_POST['g_gra_sup']);
									insert_group($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}
								?>
								</div>
							</div>
						</div>
					</form>

					<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
						<thead>
			  				<tr>
								<th>نام گروه</th>
								<th>سرپرس کوره</th>
								<th>سرپرست دانه بندی</th>
			  				</tr>
						</thead>
						<tbody>
						<?php
						if(isset($_POST['g_edit'])) {

							$array = array();
							array_push($array, $_POST['g_id']);
							array_push($array, $_POST['g_name']);
							array_push($array, $_POST['g_fur_sup']);
							array_push($array, $_POST['g_gra_sup']);

							update_group($array);
							
							echo "<meta http-equiv='refresh' content='0'/>";
						}

						foreach ($asb as $a ) {
							$g_id = $a['g_id'];
							?>
				  			<tr>
								<td><?php echo $a['g_name']; ?></td>
								<td><?php echo $a['g_fur_sup']; ?></td>
								<td><?php echo $a['g_gra_sup']; ?></td>
								<td>
									<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $g_id; ?>">ویرایش</button>
									<div class="modal fade text-xs-left" id="edit_modal<?php echo $g_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $g_id; ?>" style="display: none;" aria-hidden="true">
										<div class="modal-dialog" role="document" id="user_edit">
											<form action="" method="post">
											<input type="hidden" name="g_id" value="<?php echo $g_id; ?>">
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
																	<span class="input-group-text">نام گروه</span>
																</div>
																<input type="text" name="g_name" placeholder="نام گروه" class="form-control" value="<?php echo $a['g_name']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست کوره</span>
																</div>
																<input type="text" name="g_fur_sup" placeholder="سرپرست کوره" class="form-control" value="<?php echo $a['g_fur_sup']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست دانه بندی</span>
																</div>
																<input type="text" name="g_gra_sup" placeholder="سرپرست دانه بندی" class="form-control" value="<?php echo $a['g_gra_sup']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary" name="g_edit">ویرایش</button>
												</div>
											</div>
											</form>
										</div>
									</div>
								</td>
								<td>
									<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
										<button class="btn btn-danger btn-sm" type="submit" name="delete_group">حذف</button>
										<input class="hidden" type="text" name="delete-text" value="<?php echo $a['g_id']; ?>">
										<?php
										if(isset($_POST['delete_group'])){
											$g_id = $_POST['delete-text'];
											delete_group($g_id);
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
								<th>نام گروه</th>
								<th>سرپرس کوره</th>
								<th>سرپرست دانه بندی</th>
			  				</tr>
						</tfoot>
		  			</table>
				</div>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>