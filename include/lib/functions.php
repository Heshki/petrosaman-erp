<?php
function timeDiff($time2, $time1){
	$list2 = explode('/', $time2);
    $time2 = jalali_to_gregorian($list2[0], $list2[1], $list2[2], '-');
    $list1 = explode('/', $time1);
    $time1 = jalali_to_gregorian($list1[0], $list1[1], $list1[2], '-');
    $diff = strtotime($time2) - strtotime($time1);
	return ($diff / 3600) / 24;
}

function alert($type, $msg){ ?>
	<div class="alert alert-<?php echo $type; ?> alert-dismissible">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $msg; ?>
    </div>
	<?php
}

function per_number($number){
    return str_replace(
        range(0, 9),
        array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'),
        $number
    );
}

function eng_number($number){
    return str_replace(
        array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'),
        range(0, 9),
        $number
    );
}

function get_user_type($username){
    $user_type = get_select_query("select user_type from user where u_sername='$username'");
    return $user_type;
}

function get_user_id($username){
    $user_id = get_select_query("select u_id from user where u_username='$username'");
    return $user_id;
}

function is_admin($level){
    if($level=="مدیر")
        return true;
    else
        return false;
}