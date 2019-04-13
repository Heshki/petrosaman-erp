<?php
require_once"../include/database.php";
require_once"../include/functions.php";
if(isset($_POST['get_product_price'])){
	$p_id = $_POST['p_id'];
	$cat_id = $_POST['cat_id'];
	$sql = "select * from stock where p_id = $p_id and cat_id = $cat_id";
	$res = get_select_query($sql);
	if(count($res)>0){
	$amount = $res[0]['s_amount'];
	$eprice = $res[0]['s_eprice'];
	$sprice = $res[0]['s_sprice'];
	?><br>
	<div class="alert alert-success">
		موجودی: <?php echo per_number(number_format($amount)); ?><hr>
		قیمت تمام شده: <?php echo per_number(number_format($eprice)); ?><hr>
		قیمت فروش: <?php echo per_number(number_format($sprice)); ?>
	</div>
	<?php
	}
	exit();
}
?>