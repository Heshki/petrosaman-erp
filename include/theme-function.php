<?php
function get_url() {
	echo "http://localhost/petrocoke/";
}

function get_view($view){
	return "http://localhost/petrocoke/" . $view . "/";
}

function check_active($current){
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename==$current)
		echo 'active';
}
?>