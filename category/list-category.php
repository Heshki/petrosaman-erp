<?php $title = 'لیست دسته بندی ها'; include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_category();
?>
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">دسته بندی </a></li>
			<li class="active">لیست دسته بندی ها</li>
		  </ol>
		</section>

		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">اضافه کردن دسته بندی</h1>
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
									<span class="input-group-text">نام دسته بندی</span>
								</div>
								<input id="cat_name" type="text" name="cat_name" placeholder="نام دسته بندی" class="form-control">
							</div>
						</div>
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
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
				</form>
			</section>

		<section class="content-header">
			<h1>لیست دسته بندی ها</h1>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="box">
				<div class="box-header">
				  <h3 class="box-title">لیست دسته بندی ها</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>شماره دسته بندی</th>
						<th>نام دسته بندی</th>
						<th>عملیات</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach ($asb as $a ) {
						?>
					  <tr>
						<td><?php echo $a['cat_id']; ?></td>
						<td><?php echo $a['cat_name']; ?></td>
						<td>
							<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
								<a href="edit-category.php?id=<?php echo $a['cat_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
						<?php } ?>
					</tbody>
					<tfoot>
					  <tr>
						<th>شماره دسته بندی</th>
						<th>نام دسته بندی</th>
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
