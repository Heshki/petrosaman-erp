<?php
function insert_stock($array){
	$s_product = $array[0];
	$s_amount = $array[1];
	$sql = "insert into stock(s_product, s_amount) values('$s_product', '$s_amount')";
	$res = ex_query($sql);
	return $res;
}

function update_stock($array){
	$s_id = $array[0];
	$s_product = $array[1];
	$s_amount = $array[2];
	$sql = "update stock set s_product = '$s_product', s_amount = '$s_amount' where s_id = $s_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_stock($s_id){
	$sql = "delete from stock where s_id = '$s_id'";
	$res = ex_query($sql);
}

function list_stock() {
	$sql = "select * from stock";
	$res = get_select_query($sql);
	return $res;
}

function a_stock($s_id) {
	$sql = "select * from stock where s_id = $s_id";
	$res = get_select_query($sql);
	return $res;
}

?>