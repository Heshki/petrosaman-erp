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
	$sql = "update user set u_name = '$u_name', u_family = '$u_family', u_level = '$u_level', u_username = '$u_username', u_password = '$u_password'";
	$res = ex_query($sql);
	return $res;	
}

function delete_user($u_id){
	$sql = "delete from user where u_id = $u_id";
	$res = ex_query($sql);
}

function list_user() {
	$sql = "select * from user";
	$res = get_select_query($sql);
	return $res;
}

?>