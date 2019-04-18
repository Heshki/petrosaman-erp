<?php $title = 'لیست موجودی ها'; include"../header.php"; include"../nav.php"; include"functions.php";
$asb = list_stock();
if(isset($_POST['s_update'])) {
	$array = array();
	array_push($array, $_POST['s_id']);
	array_push($array, $_POST['p_id']);
	array_push($array, $_POST['s_amount']);
	update_stock($array);
	echo "<meta http-equiv='refresh' content='0'/>";
}
?>  
	<div class="content-wrapper">
		
		<section class="content-header">
		  	<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">موجودی</a></li>
				<li class="active">لیست موجودی</li>
		  	</ol>
		</section>

		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">اضافه کردن موجودی</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<form action="" method="post">
				<div id="details" class="col-xs-12">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">کد محصول</span>
							</div>
							<input id="s_product" type="text" name="s_product" placeholder="کد محصول" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">مقدار</span>
							</div>
							<input id="s_amount" type="text" name="s_amount" placeholder="مقدار" class="form-control">
						</div>
						<div class="item col-md-4">
							<button type="submit" class="btn btn-success btn-lg" id="s_submit" name="s_submit">اضافه کردن</button>
							<?php 
							if(isset($_POST['s_submit']) && $_POST['s_product'] != "" && $_POST['s_amount'] != "") {
								include_once"functions.php";
								$array = array();
								if(isset($_POST['s_product']) && isset($_POST['s_amount'])){
									array_push($array, $_POST['s_product']);
									array_push($array, $_POST['s_amount']);
									insert_stock($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}
								}
								?>
							</div>
						</div>
					</div>
				</form>
			</section>

		<section class="content-header">
			<h1>لیست موجودی ها</h1>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">لیست موجودی</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>شماره موجودی</th>
						<th>کد محصول</th>
						<th>مقدار</th>
						<th>عملیات</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach ($asb as $a ) {
						?>
					  <tr>
						<td><?php echo $a['s_id']; ?></td>
						<td><?php echo $a['p_id']; ?></td>
						<td><?php echo $a['s_amount']; ?></td>
						<td>
							<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
								<a href="edit-stock.php?id=<?php echo $a['s_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
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
						<?php } ?>
					</tbody>
					<tfoot>
					  <tr>
						<th>شماره موجودی</th>
						<th>کد محصول</th>
						<th>مقدار</th>
						<th>عملیات</th>
					  </tr>
					</tfoot>
				  </table>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
			</div><!-- /.col -->
		  </div><!-- /.row -->
		</section><!-- /.content -->
	  </div><!-- /.content-wrapper -->
	  <div class="control-sidebar-bg"></div>
	</div><!-- ./wrapper -->
	
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
