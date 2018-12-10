jQuery(document).ready(function($){

	var reportId = sessionStorage.getItem("reportIds");
	//var subm = sessionStorage.getItem("submitted");
	
	if (reportId) {
	    $("#hidden-reportid").val(reportId);

	   // $('.submitted-info').append(subm);

		} else {
			$(".entry-content").remove();
	}

	$('#contact').parent().parent().hide();
	$('.zaupno').hide();

	$('#help input').click(function(){
		if ($('#help input').is(':checked')) {
			$('#contact').parent().parent().show();
			$('.zaupno').show();
			$('.anon').hide();
		} else {
			$('#contact').parent().parent().hide();
			$('.anon').show();
			$('.zaupno').hide();
		}
	});

});