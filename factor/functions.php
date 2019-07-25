<?php
function singed_pre_invoice_scan($fb_id) {
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'check'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<form action="" method="post" onclick="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
				<input type="hidden" name="filename" value="<?php echo $o['m_name']; ?>">
				<input type="hidden" name="image_id" value="<?php echo $o['m_id']; ?>">
				<button name="delete-img" class="btn btn-danger btn-sm">حذف</button>
			</div>
		</form>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>موردی یافت نشد!</div>";
	}
}

function show_singed_pre_invoice_scan($fb_id) {
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'check'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
		foreach($out as $o){
			if($o!=""){
				$src = get_the_url() . "uploads/" . $o['m_name'];
			}else{
				$src = get_the_url() . "dist/img/no-img.jpg";
			}
			?>
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
			</div>
			<br>
			<?php
		}
	}else{
		echo "<div class='alert alert-danger'>موردی یافت نشد!</div>";
	}
}

function show_pre_invoice_scan($fb_id) {
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'no_signed'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
			<img class="img-responsive" src="<?php echo $src; ?>"><br>
		</div>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>هیچ پیش فاکتوری در سیستم بارگزاری نشده است</div>";
	}
}

function pre_invoice_scan($fb_id){
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'no_signed'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<form action="" method="post" onclick="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
				<input type="hidden" name="filename" value="<?php echo $o['m_name']; ?>">
				<input type="hidden" name="image_id" value="<?php echo $o['m_id']; ?>">
				<button name="delete-img" class="btn btn-danger btn-sm">حذف</button>
			</div>
		</form>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>هیچ پیش فاکتوری در سیستم بارگزاری نشده است</div>";
	}
}

function load_factor_body($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ردیف</th>
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
			foreach($res as $row){ ?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo per_number($row['p_name']); ?></td>
					<td><?php echo per_number($row['cat_name']); ?></td>
					<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
					<td><?php echo per_number(number_format($row['fb_price'])); ?></td>
					<td><?php echo per_number(number_format($row['fb_quantity'] * $row['fb_price'])); ?></td>
				</tr>
			<?php
			$i++;
			} ?>
		</tbody>
	</table>
<?php
}

function load_factor_body_total_tabel($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	$total = 0;
	foreach($res as $row){
		$total += ($row['fb_quantity'] * $row['fb_price']);
	}
	$tax = $total * (9/100);
	$final_price = $total + $tax;
	?>
	<div class="table-responsive">
		<p>جمع</p>
		<table class="table">
			<tr>
				<th style="width:50%">جمع:</th>
				<td><?php echo per_number(number_format($total)); ?> تومان</td>
			</tr>
			<tr>
				<th>مالیات (<?php echo per_number('9'); ?> درصد):</th>
				<td><?php echo per_number(number_format($tax)); ?> تومان</td>
			</tr>
			<tr>
				<th>قابل پرداخت:</th>
				<td><?php echo per_number(number_format($final_price)); ?> تومان</td>
			</tr>
		</table>
	</div>
<?php
}

function insert_factor_factor($array){
	$c_id = $array[0];
	$f_date = $array[1];
	$u_id = $array[2];
	$sql = "insert into factor(c_id, f_date, u_id) values($c_id, '$f_date', $u_id)";
	$res = ex_query($sql);
	return $res;
}

function insert_factor_body($array){
	$f_id = $array[0];
	$p_id = $array[1];
	$cat_id = $array[2];
	$fb_quantity = $array[3];
	$fb_price = $array[4];
	$sql = "insert into factor_body(f_id, p_id, cat_id, fb_quantity, fb_price, fb_verify_admin1, fb_send_customer, fb_verify_customer, fb_verify_docs, fb_verify_finan, fb_verify_admin2, fb_wait_bar, fb_get_sample, fb_verify_bar, fb_exit_doc) ";
	$sql .= "values ($f_id, $p_id, $cat_id, $fb_quantity, $fb_price, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
	$res = ex_query($sql);
	return $res;
}

function list_factor_log_factor() {
	$sql = "select * from factor_log inner join factor_body on factor_body.fb_id = factor_log.fb_id inner join user on user.u_id = factor_log.u_id order by factor_log.l_id desc";
	$res = get_select_query($sql);
	return $res;
}

function insert_factor_log_factor($array){
	$u_id = $array[0];
	$l_date = $array[1];
	$f_id = $array[2];
	$l_details = $array[3];
	$sql = "insert into factor_log(u_id, l_date, f_id, l_details) values($u_id, '$l_date', $f_id, '$l_details')";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_log_factor ($l_id){
	$sql = "delete from factor_log where l_id = $l_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_body ($fb_id){
	$sql = "delete from factor_body where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;	
}


//factor_body
function list_factor_body() {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id order by factor_body.fb_id desc";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_factor($f_id) {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id where factor_body.f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_log($fb_id) {
	$sql = "select * from factor_log where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_confirm_factor($fb_id) {
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join category on category.cat_id = factor_body.cat_id inner join product on product.p_id = factor_body.p_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function update_a_row_fb_factor($verify,$fb_id_verify) {
	$sql = "update factor_body set $verify = '1' where fb_id = $fb_id_verify";
	$res = ex_query($sql);
	return $res;
}

function update_a_row_log_factor($fb_id, $l_details) {
	$date = jdate('Y/m/d H:i');
	$u_id = $_SESSION['user_id'];
	$sql = "insert into factor_log(u_id, l_date, fb_id, l_details) values($u_id, '$date', $fb_id, '$l_details')";
	$res = ex_query($sql);
	return $res;
}

function exe_result_analyze($fb_id, $fb_result_analyze){
	$sql = "update factor_body set fb_result_analyze = $fb_result_analyze where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;
}

function select_a_factor($fb_id){
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join product on product.p_id = factor_body.p_id inner join category on category.cat_id = factor_body.cat_id inner join customer on customer.c_id = factor.c_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function show_btn_list_factor($st, $url){
	if($st==0){ ?>
		<a href="<?php echo $url; ?>" class="btn btn-warning btn-xs">خیر</a>
	<?php
	} else { ?>
		<a href="<?php echo $url; ?>" class="btn btn-success btn-xs">بله</a>
	<?php
	}
}

function pre_factor_v2_header($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	?>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<img src="<?php get_url(); ?>/dist/img/azar-logo.png">
				<small class="pull-left">تاریخ: <?php if($res && isset($res[0]['f_date'])) echo per_number($res[0]['f_date']); ?></small>
			</h2>
		</div>
	</div>
	<div class="row invoice-info" dir="rtl">
		<div class="col-sm-4 invoice-col invoice-col-fixer">
			<strong>پیش فاکتور فروش شرکت</strong><br>
			پتروسامان آذرتتیس<br>
			<strong>آدرس دفتر: </strong><br>
			<address></address>
		</div>
		<div class="col-sm-4 invoice-col invoice-col-fixer">
			<strong>نام مشتری:‌</strong> <?php if($res && isset($res[0]['c_name']) && isset($res[0]['c_family'])) echo $res[0]['c_name'] . " " . $res[0]['c_family']; ?><br>
			<strong>نام شرکت:</strong> <?php if($res && isset($res[0]['c_company'])) echo $res[0]['c_company']; ?><br>
			<strong>آدرس دفتر: </strong><br>
			<address><?php if($res && isset($res[0]['c_oaddress'])) echo $res[0]['c_oaddress']; ?></address>
		</div>
	</div>
	<?php
}

?>