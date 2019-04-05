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

function update_product($array){
	$p_id = $array[0];
	$p_name = $array[1];
	$p_cat = $array[2];
	$p_unit = $array[3];
	$sql = "update product set p_name = '$p_name', p_cat = '$p_cat', p_unit = '$p_unit' where p_id = $p_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_product($p_id){
	$sql = "delete from product where p_id = '$p_id'";
	$res = ex_query($sql);
}


function list_factor_body() {
	$sql = "select * from factor inner join factor_body on factor.f_id = factor_body.f_id";
	$res = get_select_query($sql);
	return $res;
}

function list_factor_log() {
	$sql = "select * from factor inner join factor_log on factor.f_id = factor_log.f_id inner join users on users.u_id = factor.u_id";
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
	$sql = "select * from factor_body where f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}
?>