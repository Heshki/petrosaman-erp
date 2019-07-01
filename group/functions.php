<?php
function name_month($m){
	switch ($m) {
		case 1:
			return "فروردین";
			break;
		case 2:
			return "اردیبهشت";
			break;
		case 3:
			return "خرداد";
			break;
		case 4:
			return "تیر";
			break;
		case 5:
			return "مرداد";
			break;
		case 6:
			return "شهریور";
			break;
		case 7:
			return "مهر";
			break;
		case 8:
			return "آبان";
			break;
		case 9:
			return "آذر";
			break;
		case 10:
			return "دی";
			break;
		case 11:
			return "بهمن";
			break;
		case 12:
			return "اسفند";
			break;
	}
}

function list_user($group) {
	$sql = "SELECT * FROM user WHERE u_group = '$group'";
	$res = get_select_query($sql);
	return $res;
}

function select_a_user($u_id){
	$sql = "select * from user where u_id = $u_id";
	$res = get_select_query($sql);
	return $res;
}

function insert_group($array){
	$g_name = $array[0];
	$g_fur_sup = $array[1];
	$g_gra_sup = $array[2];
	$sql = "insert into group_info(g_name, g_fur_sup, g_gra_sup) values('$g_name', '$g_fur_sup', '$g_gra_sup')";
	$res = ex_query($sql);
	return $res;
}

function update_group($array){
	$g_id = $array[0];
	$g_name = $array[1];
	$g_fur_sup = $array[2];
	$g_gra_sup = $array[3];
	$sql = "update group_info set g_name = '$g_name', g_fur_sup = '$g_fur_sup', g_gra_sup = '$g_gra_sup' where g_id = $g_id";
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