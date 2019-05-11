<?php
require_once"../include/database.php";
require_once"../product/functions.php";

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
	return $res;
}

function insert_factor_buy($array){
	$f_id = $array[0];
	$p_id = $array[1];
	$bu_quantity = $array[2];
	$sql = "insert into factor_buy(f_id, p_id, bu_scan_invoice,bu_quantity, bu_verify_admin1, bu_send_fiscal, bu_send_customer) ";
	$sql .= "values ($f_id, $p_id,0, $bu_quantity, 0, 0, 0)";
	$res = ex_query($sql);
	return $res;
}

function list_factor_log() {
	$sql = "select * from factor inner join factor_log on factor.f_id = factor_log.f_id inner join users on users.u_id = factor.u_id";
	$res = get_select_query($sql);
	return $res;
}

function insert_factor_log($array){
	$u_id = $array[0];
	$l_date = $array[1];
	$f_id = $array[2];
	$l_details = $array[3];
	$sql = "insert into factor_log(u_id, l_date, f_id, l_details) values($u_id, '$l_date', $f_id, '$l_details')";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_log ($l_id){
	$sql = "delete from factor_log where l_id = $l_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_buy ($fb_id){
	$sql = "delete from factor_buy where bu_id = $bu_id";
	$res = ex_query($sql);
	return $res;	
}


//factor_body
function list_factor_buy() {
	$sql = "select * from factor_buy inner join factor on factor_buy.f_id = factor.f_id order by factor_buy.bu_id desc";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_buy($f_id) {
	$sql = "select * from factor_buy inner join factor on factor_buy.f_id = factor.f_id where factor_buy.f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_log($fb_id) {
	$sql = "select * from factor_log where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_confirm($fb_id) {
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join category on category.cat_id = factor_body.cat_id inner join product on product.p_id = factor_body.p_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function update_a_row_bu($verify,$bu_id_verify) {
	$sql = "update factor_buy set $verify = '1' where bu_id = $bu_id_verify";
	$res = ex_query($sql);
	return $res;
}

function update_a_row_log($bu_id, $l_details) {
	$date = jdate('Y/m/d H:i');
	$u_id = $_SESSION['user_id'];
	$sql = "insert into factor_log(u_id, l_date, bu_id, l_details) values($u_id, '$date', $bu_id, '$l_details')";
	$res = ex_query($sql);
	return $res;
}

function exe_result_analyze($fb_id, $fb_result_analyze){
	$sql = "update factor_body set fb_result_analyze = $fb_result_analyze where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;
}

function select_a_factor($fb_id){
	$sql = "select * from factor_buy inner join factor on factor.f_id = factor_buy.f_id inner join product on product.p_id = factor_buy.p_id inner join category on category.cat_id = factor_body.cat_id inner join customer on customer.c_id = factor.c_id where fb_id = $fb_id";
	$res = get_select_query($sql);
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

?>