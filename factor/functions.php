<?php
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