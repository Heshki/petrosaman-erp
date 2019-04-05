<?php
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

function list_factor_body() {
	$sql = "select * from factor_body";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body($f_id) {
	$sql = "select * from factor_body where f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}
?>