<?php
function insert_group($array){
	$g_name = $array[0];
	$g_sup_1 = $array[1];
	$g_sup_2 = $array[2];
	$g_sup_3 = $array[3];
	$g_sup_4 = $array[4];
	$g_sup_5 = $array[5];
	$g_driver_1 = $array[6];
	$g_driver_2 = $array[7];
	$sql = "insert into group_info(g_name, g_sup_1, g_sup_2, g_sup_3, g_sup_4, g_sup_5, g_driver_1, g_driver_2) values('$g_name', '$g_sup_1', '$g_sup_2', '$g_sup_3', '$g_sup_4', '$g_sup_5', '$g_driver_1', '$g_driver_2')";
	$res = ex_query($sql);
	return $res;
}

function update_group($array){
	$g_id = $array[0];
	$g_name = $array[1];
	$g_sup_1 = $array[2];
	$g_sup_2 = $array[3];
	$g_sup_3 = $array[4];
	$g_sup_4 = $array[5];
	$g_sup_5 = $array[6];
	$g_driver_1 = $array[7];
	$g_driver_2 = $array[8];
	$sql = "update group_info set g_name = '$g_name', g_sup_1 = '$g_sup_1', g_sup_2 = '$g_sup_2', g_sup_3 = '$g_sup_3', g_sup_4 = '$g_sup_4', g_sup_5 = '$g_sup_5', g_driver_1 = '$g_driver_1', g_driver_2 = '$g_driver_2' where g_id = $g_id";
	$res = ex_query($sql);
	
	return $res;	
}

function list_group() {
	$sql = "SELECT * FROM group_info";
	$res = get_select_query($sql);
	return $res;
}

function delete_group($g_id){
	$sql = "delete from group_info where g_id = $g_id";
	$res = ex_query($sql);
}
?>