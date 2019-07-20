<?php include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_product();
	if(isset($_POST['p_update'])) {
		$array = array();
		array_push($array, $_POST['p_id']);
		array_push($array, $_POST['p_name']);
		array_push($array, $_POST['cat_id']);
		array_push($array, $_POST['p_unit']);
		update_product($array);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	?>
	<div class="content-wrapper">
		
		<?php breadcrumb("مدیریت محصولات"); ?>

		<section class="content">
			<form action="" method="post">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام محصول</span>
							</div>
							<input id="p_name" type="text" name="p_name" placeholder="نام محصول" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">واحد کالا</span>
							</div>
							<input id="p_unit" type="text" name="p_unit" placeholder="واحد کالا" class="form-control">
						</div>
						<div class="item col-md-4">
							<button type="submit" class="btn btn-success btn-lg" id="p_submit" name="p_submit">اضافه کردن</button>
							<?php 
							if(isset($_POST['p_submit']) && $_POST['p_name'] != "" && $_POST['p_unit'] != "") {
								$array = array();
								array_push($array, $_POST['p_name']);
								array_push($array, $_POST['p_unit']);
								insert_product($array);
								echo "<meta http-equiv='refresh' content='0'/>";
							}
							?>
						</div>
					</div>
				</div>
			</form>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">لیست موجودی</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>کد محصول</th>
										<th>نام محصول</th>
										<th>واحد کالا</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
								<?php
								foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($a['p_id']); ?></td>
										<td><?php echo $a['p_name']; ?></td>
										<td><?php echo $a['p_unit']; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-warning btn-sm" href="edit-product.php?id=<?php echo $a['p_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['p_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$p_id = $_POST['delete-text'];
													delete_product($p_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
									</tr>
								<?php
								} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>کد محصول</th>
										<th>نام محصول</th>
										<th>واحد کالا</th>
										<th>عملیات</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>
	<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>