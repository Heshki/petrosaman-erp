<?php include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_category();
?> 
	<div class="content-wrapper">
		
		<?php breadcrumb("مدیریت دسته بندی ها"); ?>

		<section class="content">
			<form action="" method="post">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام دسته بندی</span>
							</div>
							<input id="cat_name" type="text" name="cat_name" placeholder="نام دسته بندی" class="form-control">
						</div>					
						<div class="col-md-8 text-right">
							<button type="submit" class="btn btn-success btn-lg" id="cat_submit" name="cat_submit">اضافه کردن</button>
							<?php 
							if(isset($_POST['cat_submit']) && $_POST['cat_name'] != "") {
								include_once"functions.php";
								$array = array();
								if(isset($_POST['cat_name'])){
									array_push($array, $_POST['cat_name']);
									insert_category($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}
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
							<h3 class="box-title">لیست دسته بندی ها</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>کد دسته بندی</th>
										<th>نام دسته بندی</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
								<?php
								foreach ($asb as $a){ ?>
									<tr>
										<td><?php echo per_number($a['cat_id']); ?></td>
										<td><?php echo per_number($a['cat_name']); ?></td>
										<td>	
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-warning btn-sm" href="edit-category.php?id=<?php echo $a['cat_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['cat_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$cat_id = $_POST['delete-text'];
													delete_category($cat_id);
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
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>
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