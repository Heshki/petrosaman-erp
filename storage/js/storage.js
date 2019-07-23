$(document).ready(function(){
	$("#close-sub").click(function(){
		$("#tl_submit").click();
	});
	$('#trasfer_form_printer').on('click', function() {
	  	$.print('#trasfer_form_print');
	});
});