<?php 
function insert_user($array){
	$u_name = $array[0];
	$u_family = $array[1];
	$u_level = $array[2];
	$u_username = $array[3];
	$u_password = $array[4];
	$sql = "insert into user(u_name, u_family, u_level, u_username, u_password) values('$u_name', '$u_family', '$u_level', '$u_username', '$u_password')";
	$res = ex_query($sql);
	return $res;
}

function update_user($array){
	$u_id = $array[0];
	$u_name = $array[1];
	$u_family = $array[2];
	$u_level = $array[3];
	$u_username = $array[4];
	$u_password = $array[5];
	$u_father = $array[6];
	$u_meli = $array[7];
	$u_birth = $array[8];
	$u_live_city = $array[9];
	$u_destination = $array[10];
	$u_mobile = $array[11];
	$u_tell = $array[12];
	$u_address = $array[13];
	$u_pre = $array[14];
	$u_description = $array[15];
	$u_group = $array[16];
	$sql = "update user set u_name = '$u_name', u_family = '$u_family', u_level = '$u_level', u_username = '$u_username', u_password = '$u_password', u_father = '$u_father', u_meli = '$u_meli', u_birth = '$u_birth', u_live_city = '$u_live_city', u_destination = '$u_destination', u_mobile = '$u_mobile', u_tell = '$u_tell', u_address = '$u_address', u_pre = '$u_pre', u_group = '$u_group', u_description = '$u_description' where u_id = $u_id";
	$res = ex_query($sql);
	
	return $res;	
}

function delete_user($u_id){
	$sql = "delete from user where u_id = $u_id";
	$res = ex_query($sql);
}

function select_a_user($u_id){
	$sql = "select * from user where u_id = $u_id";
	$res = get_select_query($sql);
	return $res;
}

function list_user() {
	$sql = "select * from user";
	$res = get_select_query($sql);
	return $res;
}

?>