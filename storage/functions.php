<?php
require_once"../include/database.php";

function insert_transfer_list($array){
	$u_id = $array[0];
	$fb_id = $array[1];
	$dr_name = $array[2];
	$dr_family = $array[3];
	$dr_national = $array[4];
	$dr_mobile = $array[5];
	$dr_car = $array[6];
	$dr_plaque = $array[7];
	$sql = "insert into transfer_list(u_id, fb_id, dr_name, dr_family, dr_national, dr_mobile, dr_car, dr_plaque) ";
	$sql .= "values ($u_id, $fb_id, '$dr_name', '$dr_family', '$dr_national', '$dr_mobile', '$dr_car', '$dr_plaque')";
	$res = ex_query($sql);
	return $res;
}

function list_exit_doc() {
	$sql = "select * from factor_body inner join transfer_list on factor_body.fb_id = transfer_list.fb_id where factor_body.fb_exit_doc = 1";
	$res = get_select_query($sql);
	return $res;
}

function form_exit_doc($fb_id) {
	$sql = "select * from factor_body inner join product on product.p_id = factor_body.p_id inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join transfer_list on factor_body.fb_id = transfer_list.fb_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function insert_factor_log ($array){
	$u_id = $array[0];
	$l_date = $array[1];
	$l_time = $array[2];
	$f_id = $array[3];
	$l_text = $array[4];
	$sql = "insert into factor_log(u_id, l_date, l_time, f_id, l_text) values($u_id, '$l_date', '$l_time', $f_id, '$l_text')";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_log ($l_id){
	$sql = "delete from factor_log where l_id = $l_id";
	$res = ex_query($sql);
	return $res;	
}

function get_factor_body($f_id) {
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id where f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_confirm($fb_id) {
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join category on category.cat_id = factor_body.cat_id inner join product on product.p_id = factor_body.p_id inner stock on product.p_id = stock.p_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function update_a_row_fb($verify,$fb_id_verify) {
	$sql = "update factor_body set $verify = '1' where fb_id = $fb_id_verify";
	$res = ex_query($sql);
	return $res;
}

function update_a_row_log($details) {
	$date = j_date('y/m/d H:i');
	$sql = "insert into factor_log(u_id, l_date, f_id, l_details) values(1, '$date', 1, '$details')";
	$res = ex_query($sql);
	return $res;
}

//inpute store
function insert_store($array){
	$s_type = $array[0];
	$s_weight = $array[1];
	$s_date = $array[2];
	$s_time = $array[3];
	$dr_name = $array[4];
	$sql = "insert into store(s_type, s_weight, s_date, s_time, dr_name) values('$s_type', '$s_weight', '$s_date', '$s_time', '$dr_name')";
	$res = ex_query($sql);
	return $res;
}

function update_store($array){
	$s_id = $array[0];
	$s_type = $array[1];
	$s_weight = $array[2];
	$s_date = $array[3];
	$s_time = $array[4];
	$dr_name = $array[5];
	$sql = "update store set s_type = '$s_type', s_weight = '$s_weight', s_date = '$s_date', s_time = '$s_time', dr_name = '$dr_name' where s_id = $s_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_store($s_id){
	$sql = "delete from store where s_id = $s_id";
	$res = ex_query($sql);
}

function select_a_store($s_id){
	$sql = "select * from store where s_id = $s_id";
	$res = get_select_query($sql);
	return $res;
}

function list_store() {
	$sql = "select * from store";
	$res = get_select_query($sql);
	return $res;
}

function get_waybill_files($s_id){
	$sql = "select m_id, m_name from media where s_id = $s_id and m_name_file = 'waybill'";
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
		echo "<div class='alert alert-danger'>هیچ بارنامه ای در سیستم بارگذاری نشده</div>";
	}
}
function get_bill_files($s_id){
	$sql = "select m_id, m_name from media where s_id = $s_id and m_name_file = 'bill'";
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
		echo "<div class='alert alert-danger'>هیچ بارنامه ای در سیستم بارگذاری نشده</div>";
	}
}


function load_store($s_id){
	$sql = "select * from store where s_id = $s_id";
	$res = get_select_query($sql); ?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>نوع بار</th>
				<th>وزن</th>
				<th>تاریخ ورود</th>
				<th>زمان ورود</th>
				<th>راننده</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$c = count($res);
			for($i=0 ; $i<$c ; $i++){ ?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo per_number($res[$i]['s_type']); ?></td>
					<td><?php echo per_number($res[$i]['s_weight']); ?></td>
					<td><?php echo per_number($res[$i]['s_date']); ?></td>
					<td><?php echo per_number($res[$i]['s_time']); ?></td>
					<td><?php echo per_number($res[$i]['dr_id']); ?></td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
<?php
}
?>