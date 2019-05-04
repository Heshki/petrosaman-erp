<?php include"../header.php"; include"../nav.php"; include"functions.php";
	
	require_once("../product/functions.php");
	require_once("../category/functions.php");

	$asb = list_stock();
	if(isset($_POST['s_update'])) {
		$array = array();
		array_push($array, $_POST['s_update']);
		array_push($array, $_POST['p_id']);
		array_push($array, $_POST['cat_id']);
		array_push($array, $_POST['s_amount']);
		array_push($array, $_POST['s_eprice']);
		array_push($array, $_POST['s_sprice']);
		update_stock($array);
		echo "<meta http-equiv='refresh' content='0'/>";
		
	}
	
	if(isset($_POST['s_submit']) && $_POST['p_id']!= "" && $_POST['cat_id']!="" && $_POST['s_amount'] != "") {
		include_once"functions.php";
		$array = array();
		array_push($array, $_POST['p_id']);
		array_push($array, $_POST['cat_id']);
		array_push($array, $_POST['s_amount']);
		array_push($array, $_POST['s_eprice']);
		array_push($array, $_POST['s_sprice']);
		insert_stock($array);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	
	if(isset($_GET['s_id'])){
		$s_id = $_GET['s_id'];
		$sql = "select * from stock where s_id = $s_id";
		$res = get_select_query($sql);
		$p_id = $res[0]['p_id'];
		$cat_id = $res[0]['cat_id'];
		$s_amount = $res[0]['s_amount'];
		$s_eprice = $res[0]['s_eprice'];
		$s_sprice = $res[0]['s_sprice'];
	}else{
		$p_id = "";
		$cat_id = "";
		$s_amount = "";
		$s_eprice = "";
		$s_sprice = "";
	}
	?>
	<div class="content-wrapper">
		
		<?php breadcrumb("مدیریت موجودی"); ?>

		<section class="content">
			<form action="" method="post">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">محصول</span>
							</div>
							<?php show_product_as_select($p_id); ?>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">دسته بندی</span>
							</div>
							<?php show_category_as_select($cat_id); ?>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">مقدار</span>
							</div>
							<input value="<?php echo $s_amount; ?>" type="text" name="s_amount" placeholder="مقدار" class="form-control">
						</div>
						<div class="item col-md-6">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">قیمت تمام شده</span>
							</div>
							<input value="<?php echo $s_eprice; ?>" type="text" name="s_eprice" placeholder="قیمت تمام شده" class="form-control">
						</div>
						<div class="item col-md-6">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">قیمت فروش</span>
							</div>
							<input value="<?php echo $s_sprice; ?>" type="text" name="s_sprice" placeholder="قیمت فروش" class="form-control">
						</div>
						<div class="item col-md-12 text-center">
							<?php
							if(isset($_GET['s_id'])){ ?>
							<button type="submit" class="btn btn-warning btn-lg" value="<?php echo $_GET['s_id']; ?>" name="s_update">ویرایش</button>
							<?php } else { ?>
							<button type="submit" class="btn btn-success btn-lg" name="s_submit">اضافه کردن</button>
							<?php
							} ?>
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
										<th>کد ردیف</th>
										<th>محصول</th>
										<th>دسته بندی</th>
										<th>موجودی</th>
										<th>قیمت تمام شده</th>
										<th>قیمت فروش</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($a['s_id']); ?></td>
										<td><?php echo per_number(get_product_name($a['p_id'])); ?></td>
										<td><?php echo per_number(get_category_name($a['cat_id'])); ?></td>
										<td><?php echo per_number(number_format($a['s_amount'])); ?></td>
										<td><?php echo per_number(number_format($a['s_eprice'])); ?></td>
										<td><?php echo per_number(number_format($a['s_sprice'])); ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-warning btn-sm" href="list-stock.php?s_id=<?php echo $a['s_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['s_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$s_id = $_POST['delete-text'];
													delete_stock($s_id);
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
										<th>کد ردیف</th>
										<th>محصول</th>
										<th>دسته بندی</th>
										<th>موجودی</th>
										<th>قیمت تمام شده</th>
										<th>قیمت فروش</th>
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