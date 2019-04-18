<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php"; include"functions.php"; ?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container-fluid">
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ثبت فاکتور جدید</h1>
						</div>
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">فاکتور</a></li>
					<li class="active">تایید فاکتور</li>
				</ol>
			</section>
			<section class="content">
				<div id="details" class="col-xs-12">	
					<?php
						$fb_id = $_GET['fb_id'];
						$type_confirm = $_GET['typee'];
						$res = get_factor_body_confirm($fb_id);
						if ($type_confirm == 'fb_verify_admin1') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_send_customer') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مشتری عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_verify_customer') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول بازرگانی عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_verify_docs') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>ثبت اسناد عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_verify_finan') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول مالی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_verify_admin2') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_wait_bar') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_ready_bar') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<input type="text" name="verify"  id="verify" class="hidden">
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_get_sample') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول آزمایشگاه عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_verify_bar') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'fb_exit_doc') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
								<input type="text" name="fb_id" id="fb_id" value="<?php echo $fb_id; ?>">
								<input type="text" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<input type="text" name="verify" id="verify" class="hidden" value="<?php echo $type_confirm; ?>">
							<input type="text" name="fb_id" id="fb_id" class="hidden" value="<?php echo $fb_id; ?>">
							<div class="col-xs-12">
								<p>نگهبانی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}
					


					if($type_confirm=="fb_result_analyze"){ ?>
					<button type="button" data-toggle="modal" data-target="#result<?php echo $i; ?>" class="btn btn-primary btn-xs">ثبت نتیجه</button>
					<div class="modal" id="result<?php echo $i; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><?php echo $row['fb_id'] ?></h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<textarea name="fb_result_analyze" id="fb_result_analyze" cols="20" rows="5"><?php echo $row['fb_result_analyze']; ?></textarea>
										<input type="text" class="text" name="fb_id" id="fb_id">
										<button type="submit" name="result_submit" id="result_submit" class="btn btn-warning">ثبت</button>
									</form>
									<?php
									if(isset($_POST['result_submit'])){
										$fb_result_analyze = $_POST['fb_result_analyze'];
										$fb_id = $_POST['fb_id'];
										exe_result_analyze($fb_id, $fb_result_analyze);
									}
									?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
								</div>
							</div>
						</div>
					</div>
					<?php
					} ?>



				</div>
			</section>
		</div>
	</div>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>