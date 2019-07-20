<?php include"../header.php"; include"../nav.php"; include"functions.php";
	if(isset($_POST['edit_customer'])) {
		$array = array();
		array_push($array, $_POST['c_id']);
		array_push($array, $_POST['c_name']);
		array_push($array, $_POST['c_family']);
		array_push($array, $_POST['c_company']);
		array_push($array, $_POST['c_national']);
		array_push($array, $_POST['c_economic']);
		array_push($array, $_POST['c_phone']);
		array_push($array, $_POST['c_fax']);
		array_push($array, $_POST['c_mobile']);
		array_push($array, $_POST['c_oaddress']);
		array_push($array, $_POST['c_faddress']);
		array_push($array, $_POST['c_email']);
		array_push($array, $_POST['c_vat']);
		array_push($array, $_POST['c_expire_vat']);
		array_push($array, $_POST['c_customertype']);
		update_customer($array);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	
	if(isset($_GET['action']) && $_GET['action']=="expire"){
		$asb = list_customer_expire();
	}else if(isset($_GET['action']) && $_GET['action']=="customer"){
		$asb = list_just_customer();
	}else{
		$asb = list_customer();
	}
	
	?>
	<div class="content-wrapper">
		
		<?php breadcrumb("لیست مشتریان"); ?>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">لیست مشتریان</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>کد مشتری</th>
										<th>نام و نام خانوادگی</th>
										<th>نام شرکت</th>
										<th>نوع</th>
										<th>اعتبار گواهی ارزش افزوده</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
								<?php
								foreach($asb as $a){ ?>
									<tr>
										<td><?php echo per_number($a['c_id']); ?></td>
										<td><?php echo $a['c_name'] . " " . $a['c_family']; ?></td>
										<td><?php echo $a['c_company']; ?></td>
										<td><?php echo $a['c_customertype']; ?></td>
										<td><?php echo get_expire_time($a['c_id']); ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-warning btn-sm" href="show-customer.php?id=<?php echo $a['c_id']; ?>">مشاهده</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['c_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$c_id = $_POST['delete-text'];
													delete_customer($c_id);
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
										<th>کد مشتری</th>
										<th>نام و نام خانوادگی</th>
										<th>نام شرکت</th>
										<th>نوع</th>
										<th>وضعیت گواهی ارزش افزوده</th>
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