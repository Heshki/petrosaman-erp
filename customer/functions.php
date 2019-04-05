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
	$c_dvat = $array[12];
	$c_mvat = $array[13];
	$c_yvat = $array[14];
	$c_customertype = $array[15];
	$sql = "insert into customer(c_name, c_family, c_company, c_national, c_economic, c_phone, c_fax, c_mobile, c_oaddress, c_faddress, c_email, c_vat, c_dvat, c_mvat, c_yvat, c_customertype) values('$c_name', '$c_family', '$c_company', '$c_national', '$c_economic', '$c_phone', '$c_fax', '$c_mobile', '$c_oaddress', '$c_faddress', '$c_email', '$c_vat', '$c_dvat', '$c_mvat', '$c_yvat', '$c_customertype')";
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
	$c_dvat = $array[13];
	$c_mvat = $array[14];
	$c_yvat = $array[15];
	$c_customertype = $array[16];
	$sql = "update customer set c_name = '$c_name', c_family = '$c_family', c_company = '$c_company', c_national = '$c_national', c_economic = '$c_economic', c_phone = '$c_phone', c_fax = '$c_fax', c_mobile = '$c_mobile', c_oaddress = '$c_oaddress', c_faddress = '$c_faddress', c_email = '$c_email', c_vat = '$c_vat', c_dvat = '$c_dvat', c_mvat = '$c_mvat', c_yvat = '$c_yvat', c_customertype = '$c_customertype' where c_id = $c_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_customer($c_id){
	$sql = "delete from customer where c_id = '$c_id'";
	$res = ex_query($sql);
}

function list_customer() {
	$sql = "select * from customer";
	$res = get_select_query($sql);
	return $res;
}

function a_customer($c_id) {
	$sql = "select * from customer where c_id = '$c_id'";
	$res = get_select_query($sql);
	return $res;
}

function show_customer_as_select($c_id){ ?>
	<select name="c_id" class="form-control select2">
		<?php
		$res = list_customer();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['c_id']==$c_id)echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>								
			<?php
			} 
		} ?>
	</select>
	<?php
}
?>