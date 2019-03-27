<?php
function insert_product($array){
	$p_name = $array[0];
	$p_cat = $array[1];
	$p_unit = $array[2];
	$sql = "insert into product(p_name, p_cat, p_unit) values('$p_name', '$p_cat', '$p_unit')";
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

function list_product() {
	$sql = "select * from product";
	$res = get_select_query($sql);
	return $res;
}

function a_product($p_id) {
	$sql = "select * from product where p_id = '$p_id'";
	$res = get_select_query($sql);
	return $res;
}

?>