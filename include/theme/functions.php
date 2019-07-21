<?php
function get_the_url() {
	return $GLOBALS['site_url'];
}

function get_url() {
	echo $GLOBALS['site_url'];
}

function get_view($view){
	return $GLOBALS['site_url'] . $view . "/";
}

function check_active($current){
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename==$current)
		echo 'active';
}