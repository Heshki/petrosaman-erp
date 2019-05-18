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

function send_sms($number, $msg){
	$url = "37.130.202.188/services.jspd";	
	$rcpt_nm = array($number);
	$param = array(
		'uname' => 'mahdavi1456',
		'pass' => 'm54692764o',
		'from' => '+985000125475',
		'message' => $msg,
		'to' => json_encode($rcpt_nm),
		'op' => 'send'
	);				
	$handler = curl_init($url);             
	curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($handler, CURLOPT_POSTFIELDS, $param);                       
	curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
	$response2 = curl_exec($handler);
		
	$response2 = json_decode($response2);
	$res_code = $response2[0];
	$res_data = $response2[1];	
}

function upload_file($filename, $tmp_name, $size, $type,$bu_id){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    $check = getimagesize($tmp_name);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
        
    if ($size > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($tmp_name, $target_file)) {
            echo "The file ". basename($filename). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $sql = "insert into media(m_name, m_type, m_name_file, bu_id) values('$filename', 'buy', '$type', $bu_id)";
    $res = ex_query($sql);
}

function get_media($bu_id, $type){
    $sql = "select m_name from media where bu_id = $bu_id and m_name_file = '$type'";
    $res = get_var_query($sql);
    $src = get_the_url() . 'buy/uploads/' . $res;
    return $src;
}
?>