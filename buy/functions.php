<?php
function load_factor_buy($f_id){
	$sql = "select * from factor_buy where f_id = $f_id";
	$res = get_select_query($sql); ?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>شماره فاکتور</th>
				<th>نام محصول</th>
				<th>وزن بار</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$c = count($res);
			for($i=0 ; $i<$c ; $i++){ ?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo per_number($res[$i]['f_id']); ?></td>
					<td><?php echo get_product_name('p_id'); ?></td>
					<td><?php echo per_number($res[$i]['bu_quantity']); ?></td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
<?php
}

function insert_factor($array){
	$c_id = $array[0];
	$f_date = $array[1];
	$u_id = $array[2];
	$sql = "insert into factor(c_id, f_date, u_id) values($c_id, '$f_date', $u_id)";
	$res = ex_query($sql);
	$sql_f_id = "select f_id from factor order by f_id desc limit 1";
	$f_id = get_var_query($sql_f_id);
	return $f_id;
}

function insert_factor_buy($array){
	$f_id = $array[0];
	$p_id = $array[1];
	$bu_quantity = $array[2];
	$bu_outsourcing = $array[3];
	$sql = "insert into factor_buy(f_id, p_id, bu_scan_invoice,bu_quantity, bu_verify_admin1, bu_send_fiscal, bu_send_customer, bu_quantity_r, bu_outsourcing) ";
	$sql .= "values ($f_id, $p_id,0, $bu_quantity, 0, 0, 0, 0, $bu_outsourcing)";
	$res = ex_query($sql);
	return $res;
}

function delete_factor_buy ($bu_id){
	$sql = "delete from factor_buy where bu_id = $bu_id";
	$res = ex_query($sql);
	return $res;	
}

function list_factor_buy() {
	$sql = "select * from factor_buy inner join factor on factor_buy.f_id = factor.f_id order by factor.f_id desc";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_buy($f_id) {
	$sql = "select * from factor_buy inner join factor on factor_buy.f_id = factor.f_id where factor_buy.f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}

function update_a_row_bu($verify,$bu_id_verify) {
	$sql = "update factor_buy set $verify = '1' where bu_id = $bu_id_verify";
	$res = ex_query($sql);
	return $res;
}

function show_btn_list($st, $url){
	if($st==0){ ?>
		<a href="<?php echo $url; ?>" class="btn btn-warning btn-xs">خیر</a>
	<?php
	} else { ?>
		<a href="<?php echo $url; ?>" class="btn btn-success btn-xs">بله</a>
	<?php
	}
}


function get_invoice_files($bu_id){
	$sql = "select m_id, m_name from media where bu_id = $bu_id and m_name_file = 'invoice'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "buy/uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<form action="" method="post">
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

function get_receipt_files($bu_id){
	$sql = "select m_id, m_name from media where bu_id = $bu_id and m_name_file = 'receipt'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
		foreach($out as $o){
			if($o!=""){
				$src = get_the_url() . "buy/uploads/" . $o['m_name'];
			}else{
				$src = get_the_url() . "dist/img/no-img.jpg";
			}
			?>
			<form action="" method="post">
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

?>