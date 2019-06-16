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
?>