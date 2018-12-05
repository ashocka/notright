jQuery(document).ready(function($){

	var reportId = sessionStorage.getItem("reportIds");

	
		if (reportId) {

	    $("#hidden-reportid").val(reportId);

	    //$(".submitted-info").
		} else {
			$(".entry-content").remove();
		}

	/*setInterval(function(){
	}, 1000 * 60 * 60 * 24); // check every 1 day*/

});