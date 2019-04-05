$(document).ready(function(){
	
	$('#c_vat').on('change', function() {
	  	var boolian = $('#c_vat').find(":selected").val();
		if(boolian=='no'){
			$("#vatdate").css("display" , "none");
		}else {
			$("#vatdate").css("display" , "inline-block");
		}
	});
	
	
	$('#cat_id').on('change', function() {
	  	$('#cat_id_result').html("لطفا صبر کنید..");
		var cat_id = $('#cat_id').find(":selected").val();
		var p_id = $('#p_id').find(":selected").val();
		$.post("back.php", {get_product_price:1, p_id:p_id, cat_id:cat_id}, function(data){
			$('#cat_id_result').html(data);
		});
	});
	
});