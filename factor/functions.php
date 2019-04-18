<?php
require_once"../include/database.php";
function insert_factor($array){
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

function delete_factor_body ($fb_id){
	$sql = "delete from factor_body where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;	
}


//factor_body
function list_factor_body() {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body($f_id) {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id where factor_body.f_id = $f_id";
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

function update_a_row_log($l_details) {
	$date = jdate('Y/m/d H:i');
	$sql = "insert into factor_log(u_id, l_date, f_id, l_details) values(1, '$date', 1, '$l_details')";
	$res = ex_query($sql);
	return $res;
}

function exe_result_analyze($fb_id, $fb_result_analyze){
	$sql = "update factor_body set fb_result_analyze = $fb_result_analyze where fb_id = $fb_id";
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

?>