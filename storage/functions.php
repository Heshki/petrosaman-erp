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

function insert_transfer_list($array){
	$u_id = $array[0];
	$fb_id = $array[1];
	$dr_name = $array[2];
	$dr_national = $array[3];
	$dr_mobile = $array[4];
	$dr_plaque = $array[5];
	$sql = "insert into transfer_list(u_id, fb_id, dr_name, dr_national, dr_mobile, dr_plaque) ";
	$sql .= "values ($u_id, $fb_id, '$dr_name', '$dr_national', '$dr_mobile', '$dr_plaque')";
	$res = ex_query($sql);
	return $res;
}

function list_exit_doc() {
	$sql = "select * from factor_body inner join product on product.p_id = factor_body.p_id inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id where fb_exit_doc = 1";
	$res = get_select_query($sql);
	return $res;
}

function form_exit_doc($f_id) {
	$sql = "select * from factor_body inner join product on product.p_id = factor_body.p_id inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join transfer_list on factor_body.fb_id = transfer_list.fb_id where f_id = $f_id";
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

?>