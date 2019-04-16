<?php $title = 'لیست محصولات'; include"../header.php"; include"../nav.php"; include"functions.php";
	$res = list_factor_body();
	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		update_a_row_fb($verify,$fb_id_verify);
		update_a_row_log($l_details);
	}
?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">محصولات</a></li>
				<li class="active">لیست محصولات</li>
			</ol>
		</section>
		
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">لیست فاکتورها</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>فاکتور</th>
										<th>مشتری</th>
										<th>تایید 1 مدیر</th>
										<th>ارسال مشتری</th>
										<th>تایید مشتری</th>
										<th>اسناد تایید</th>
										<th>تایید مالی</th>
										<th>تایید 2 مدیر</th>
										<th>منتظر بارگیری</th>
										<th>آماده تحویل</th>
										<th>نمونه برداری</th>
										<th>تایید بارگیری</th>
										<th>حواله خروج</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res = list_factor_body();
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['f_id']; ?></td>
										<td><?php echo $row['c_id']; ?></td>
										<td>
											<?php if($row['fb_verify_admin1'] == '0'){?>
												<a href="confirm-factor.php?fb_id=<?php echo $row['fb_id']; ?>&typee=fb_verify_admin1" class="btn btn-warning">نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_send_customer'] == '0'){?>
												<a href="<?php if($row['fb_verify_admin1'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_send_customer'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_admin1'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_verify_customer'] == '0'){?>
												<a href="<?php if($row['fb_send_customer'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_verify_customer'; } ?>" class="btn btn-warning"<?php if($row['fb_send_customer'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_verify_docs'] == '0'){?>
												<a href="<?php if($row['fb_verify_customer'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_verify_docs'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_customer'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_verify_finan'] == '0'){?>
												<a href="<?php if($row['fb_verify_docs'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_verify_finan'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_docs'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_verify_admin2'] == '0'){?>
												<a href="<?php if($row['fb_verify_finan'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_verify_admin2'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_finan'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_wait_bar'] == '0'){?>
												<a href="<?php if($row['fb_verify_admin2'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_wait_bar'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_admin2'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_ready_bar'] == '0'){?>
												<a href="<?php if($row['fb_wait_bar'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_ready_bar'; } ?>" class="btn btn-warning"<?php if($row['fb_wait_bar'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_get_sample'] == '0'){?>
												<a href="<?php if($row['fb_ready_bar'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_get_sample'; } ?>" class="btn btn-warning"<?php if($row['fb_ready_bar'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_verify_bar'] == '0'){?>
												<a href="<?php if($row['fb_get_sample'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_verify_bar'; } ?>" class="btn btn-warning"<?php if($row['fb_get_sample'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<?php if($row['fb_exit_doc'] == '0'){?>
												<a href="<?php if($row['fb_verify_bar'] == '0'){ echo '#'; } else{ echo 'confirm-factor.php?fb_id=' . $row['fb_id'] . '&typee=fb_exit_doc'; } ?>" class="btn btn-warning"<?php if($row['fb_verify_bar'] == '0'){ echo ' disabled'; }?>>نشده</a>
											<?php }else{ ?>
												<button class="btn btn-success" disabled>شده</button>
											<?php } ?>
										</td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a href="edit-product.php?id=<?php echo $row['fb_id']; ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['fb_id']; ?>">
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
										$i++;
									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>فاکتور</th>
										<th>مشتری</th>
										<th>تایید 1 مدیر</th>
										<th>ارسال مشتری</th>
										<th>تایید مشتری</th>
										<th>اسناد تایید</th>
										<th>تایید مالی</th>
										<th>تایید 2 مدیر</th>
										<th>منتظر بارگیری</th>
										<th>آماده تحویل</th>
										<th>نمونه برداری</th>
										<th>تایید بارگیری</th>
										<th>حواله خروج</th>
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

	<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
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