<?php
include"jdf.php";
function get_connection_string(){
    $pdo_conn = new PDO("mysql:host=localhost;dbname=saman;charset=utf8", 'root', '',
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    return $pdo_conn;
}

function ex_query($sql){
	$pdo_conn = get_connection_string();
	$pdo_statement = $pdo_conn->prepare($sql);
	$pdo_statement->execute();
}

function get_select_query($sql){
    $pdo_conn = get_connection_string();
	$pdo_statement = $pdo_conn->prepare($sql);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	return $result;
}

function get_var_query($sql){
    $pdo_conn = get_connection_string();
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
    return $result[0][0];
}

function check_login($u_name, $u_password){
	$res = get_select_query("select * from users where u_name='$u_name' and u_password='$u_password'");
	return count($res);
}

?>