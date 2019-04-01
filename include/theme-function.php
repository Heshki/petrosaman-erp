<?php
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
?>