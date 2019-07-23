<?php
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

function send_smses($numbers, $msg){
	$url = "37.130.202.188/services.jspd";
	$rcpt_nm = $numbers;
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

function send_sms_confirm($fb_id, $type){
	$dr_mobile = get_var_query("select dr_mobile from factor_body inner join driver on factor_body.dr_id = driver.dr_id where factor_body.fb_id = $fb_id");
	$admin_mobiles = get_mobiles_by_type("مدیر");
	$financial_mobiles = get_mobiles_by_type("مالی");
	$sale_mobiles = get_mobiles_by_type("فروش");
	$customer_mobile = get_customer_mobile($fb_id);
	switch ($type) {
		case 'fb_pre_invoice_scan':
			$msg = "یک پیش فاکتور جدید با کد " . $fb_id . " در اتوماسیون ثبت شده است و در انتظار تایید اولیه مدیر است";
			send_smses($admin_mobiles, $msg);
		break;
		case 'fb_verify_admin1':
			$msg = "پیش فاکتور شماره " . $fb_id . " توسط مدیر تایید شده است. لطفا برای مشتری ارسال نمایید";
			send_smses($sale_mobiles, $msg);
		break;
		case 'fb_send_customer':
			$msg = "مشتری گرامی، پیش فاکتور شماره " . $fb_id . " برای شما ارسال شد. لطفا با واحد فروش در تماس باشید";
			send_sms($customer_mobile, $msg);
		break;
		case 'fb_verify_customer':
			$msg = "پیش فاکتور شماره " . $fb_id . " توسط مشتری تایید شده است، لطفا مراحل مالی را پیگیری نمایید";
			send_smses($financial_mobiles, $msg);
		break;
		case 'fb_verify_docs':
			$msg = "اسناد مالی پیش فاکتور شماره " . $fb_id;
			send_smses($admin_mobiles, $msg);
		break;
		case 'fb_verify_finan':
			$msg = "پیش فاکتور شماره " . $fb_id . "";

		break;
		case 'fb_verify_admin2':
			$echo_type = "تایید مدیر 2";
			break;
		case 'fb_wait_bar':
			$echo_type = "تایید انبار";
			break;
		case 'fb_ready_bar':
			$echo_type = "آماده بارگیری";
			break;
		case 'fb_get_sample':
			$echo_type = "نمونه برداری";
			break;
		case 'fb_verify_bar':
			$echo_type = "تایی بارگیری";
			break;
		case 'fb_exit_doc':
			$echo_type = "حواله خروج";
			break;
		case 'fb_result_analyze':
			$echo_type = "نتیجه آنالیز";
			break;
	}
}
