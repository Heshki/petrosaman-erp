<?php
function upload_file($filename, $tmp_name, $size, $type, $bu_id){

	$ext = explode(".", $filename);
	$ext = end($ext);
	$filename = time() . "." . $ext;
	
	$target_dir = "uploads/";
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    $check = getimagesize($tmp_name);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
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
		   // echo "The file ". basename($filename). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function user_upload_file($filename, $tmp_name, $size, $type, $bu_id){

    $ext = explode(".", $filename);
    $ext = end($ext);
    $filename = $type . time() . "." . $ext;
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    $check = getimagesize($tmp_name);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
        
    if ($size > 2000000) {
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
           // echo "The file ". basename($filename). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql2 = "SELECT count(m_id) FROM media WHERE bu_id = $bu_id AND m_name_file = '$type'";
    $check = get_var_query($sql2);
    if ( $check > 0 ) {
        $sql = "UPDATE media SET m_name = '$filename', m_type = 'user', m_name_file = '$type', bu_id = $bu_id WHERE bu_id = $bu_id AND m_name_file = '$type'";
    } else {
        $sql = "INSERT INTO media(m_name, m_type, m_name_file, bu_id) VALUES('$filename', 'user', '$type', $bu_id)";
    }
    $res = ex_query($sql);
}

function user_get_media($bu_id, $type){
    $sql = "select m_name from media where bu_id = $bu_id and m_name_file = '$type'";
    $res = get_var_query($sql);
    if( !is_null ( $res ) ){
        $src = get_the_url() . 'user/uploads/' . $res;
        return $src;
    }else{
        return "";
    }
}

function get_media($bu_id, $type){
    $sql = "select m_name from media where bu_id = $bu_id and m_name_file = '$type'";
    $res = get_var_query($sql);
    $src = get_the_url() . 'buy/uploads/' . $res;
    return $src;
}