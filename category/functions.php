<?php
function insert_category($array){
	$cat_name = $array[0];
	$sql = "insert into category(cat_name) values('$cat_name')";
	$res = ex_query($sql);
	return $res;
}

function update_category($cat_id , $cat_name){
	$sql = "update category set cat_name = '$cat_name' where cat_id = $cat_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_category($cat_id){
	$sql = "delete from category where cat_id = '$cat_id'";
	$res = ex_query($sql);
}

function list_category() {
	$sql = "select * from category";
	$res = get_select_query($sql);
	return $res;
}

function a_category($cat_id) {
	$sql = "select * from category where cat_id = $cat_id";
	$res = get_select_query($sql);
	return $res;
}

?>