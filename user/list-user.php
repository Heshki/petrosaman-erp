<?php $title = 'لیست مشتریان'; include"../header.php"; include"../nav.php"; include"functions.php";
	$asb = list_user();
?>  
	<div class="content-wrapper">

		<section class="content-header">
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">مشتریان</a></li>
			<li class="active">لیست مشتریان</li>
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
				  			<h3 class="box-title">لیست مشتریان</h3>
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
												<option>مدیر</option>
												<option>فروش</option>
												<option>مالی</option>
												<option>انبار</option>
											</select>
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_username" placeholder="نام کاربری" class="form-control">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
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
					  				</tr>
								</thead>
								<tbody>
								<?php foreach ($asb as $a ) { ?>
						  			<tr>
										<td><?php echo $a['u_name']; ?></td>
										<td><?php echo $a['u_family']; ?></td>
										<td><?php echo $a['u_level']; ?></td>
										<td><?php echo $a['u_username']; ?></td>
										<td><?php echo $a['u_password']; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a href="show-customer.php?id=<?php echo $a['c_id']; ?>">مشاهده</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-user">حذف</button>
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