<?php
function insert_customer($array){
	$c_name = $array[0];
	$c_family = $array[1];
	$c_company = $array[2];
	$c_national = $array[3];
	$c_economic = $array[4];
	$c_phone = $array[5];
	$c_fax = $array[6];
	$c_mobile = $array[7];
	$c_oaddress = $array[8];
	$c_faddress = $array[9];
	$c_email = $array[10];
	$c_vat = $array[11];
	$c_expire_vat = $array[12];
	$c_customertype = $array[13];
	$sql = "insert into customer(c_name, c_family, c_company, c_national, c_economic, c_phone, c_fax, c_mobile, c_oaddress, c_faddress, c_email, c_vat, c_expire_vat, c_customertype) values('$c_name', '$c_family', '$c_company', '$c_national', '$c_economic', '$c_phone', '$c_fax', '$c_mobile', '$c_oaddress', '$c_faddress', '$c_email', '$c_vat', '$c_expire_vat', '$c_customertype')";
	$res = ex_query($sql);
	return $res;
}

function update_customer($array){
	$c_id = $array[0];
	$c_name = $array[1];
	$c_family = $array[2];
	$c_company = $array[3];
	$c_national = $array[4];
	$c_economic = $array[5];
	$c_phone = $array[6];
	$c_fax = $array[7];
	$c_mobile = $array[8];
	$c_oaddress = $array[9];
	$c_faddress = $array[10];
	$c_email = $array[11];
	$c_vat = $array[12];
	$c_expire_vat = $array[13];
	$c_customertype = $array[14];
	$sql = "update customer set c_name = '$c_name', c_family = '$c_family', c_company = '$c_company', c_national = '$c_national', c_economic = '$c_economic', c_phone = '$c_phone', c_fax = '$c_fax', c_mobile = '$c_mobile', c_oaddress = '$c_oaddress', c_faddress = '$c_faddress', c_email = '$c_email', c_vat = '$c_vat', c_expire_vat = '$c_expire_vat', c_customertype = '$c_customertype' where c_id = $c_id";
	$res = ex_query($sql);
	return $res;
}

function delete_customer($c_id){
	$sql = "delete from customer where c_id = '$c_id'";
	$res = ex_query($sql);
}

function a_customer($c_id){
	$sql = "select * from customer where c_id = $c_id";
	$res = get_select_query($sql);
	return $res;
}

function list_customer() {
	$sql = "select * from customer";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function list_just_customer() {
	$sql = "select * from customer where c_customertype = 'مشتری'";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function get_customer_name($c_id) {
	$sql = "select c_name, c_family from customer where c_id = $c_id";
	$res = get_select_query($sql);
	return $res[0]['c_name'] . " " . $res[0]['c_family'];
}

function show_customer_as_select($c_id){ ?>
	<select name="c_id" class="form-control select2">
		<?php
		$res = list_customer();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['c_id']==$c_id)echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name'] . " " . $row['c_family']; ?></option>
			<?php
			}
		} ?>
	</select>
	<?php
}

function get_expire_time($c_id, $action=0){
	$sql = "select c_expire_vat from customer where c_id = $c_id";
	$res = get_var_query($sql);
	$ex_date = $res;
	$now = jdate('Y/m/d');
	$diff = timeDiff($ex_date, $now);
	if($action==0){
		if($diff<0){
			echo "<span class='badge bg-red'>" . per_number(round($diff)) . " روز گذشته</span>";
		}else{
			echo "<span class='badge bg-green'>" . per_number(round($diff)) . " روز دیگر اعتبار دارد</span>";
		}
	}else{
		return $diff;
	}
}

function list_customer_expire() {
	$sql = "select * from customer";
	$arr = array();
	$res = get_select_query($sql);
	foreach($res as $row){
		$diff = get_expire_time($row['c_id'], 1);
		if($diff<=0){
			array_push($arr, $row);
		}
	}
	return $arr;
}

function customer_expire_count() {
	$sql = "select * from customer";
	$c = 0;
	$res = get_select_query($sql);
	foreach($res as $row){
		$diff = get_expire_time($row['c_id'], 1);
		if($diff<=0){
			$c++;
		}
	}
	return $c;
}

function customer_count() {
	$sql = "select count(c_id) from customer where c_customertype = 'مشتری'";
	$res = get_var_query($sql);
	return $res;
}

function get_customer_mobile($fb_id){
	$sql = "select c_mobile from customer inner join factor on customer.c_id = factor.c_id inner join factor_body on factor_body.f_id = factor_body.f_id where factor_body.fb_id = $fb_id";
	$res = get_var_query($sql);
	return $res;
}
