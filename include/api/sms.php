<?php
function send_sms($number, $r_status){
	$url = "37.130.202.188/services.jspd";
	$rcpt_nm = array($number);
	$param = array(
		'uname' => '',
		'pass' => '',
		'from' => '+985000125475',
		'message' => 'با سلام تلفن همراه شما ' . $r_status . ' است باتشکر موبایل جمهوری',
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
