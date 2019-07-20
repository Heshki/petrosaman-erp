<?php
function get_the_url() {
	return "http://localhost/petrosaman-erp/";
}

function get_url() {
	echo "http://localhost/petrosaman-erp/";
}

function get_view($view){
	return "http://localhost/petrosaman-erp/" . $view . "/";
}

function check_active($current){
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename==$current)
		echo 'active';
}
include ( $_SERVER['DOCUMENT_ROOT'] . "/petrosaman-erp/include/theme/breadcrumb.php" );