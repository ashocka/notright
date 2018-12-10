jQuery(document).ready(function( $ ) {

	$(".reporting-module-container").hide();

// generate dropdowns from available data attributes

	var allContext = [];
	var allMethod = [];
	var allBias = [];

	// get all existing attributes from Solutions and collect them into arrays
	$(".nr_solutions").each(function(i, obj) {
		var thisContext = $(this).data("context");
		var thisMethod = $(this).data("method");
		var thisBias = $(this).data("bias");
		
		allContext = $.merge(allContext, thisContext);
		allMethod = $.merge(allMethod, thisMethod);
		allBias = $.merge(allBias, thisBias);
	});

	// function to remove duplicates from the final combined array
	function unique(list) {
	    var result = [];
	    $.each(list, function(i, e) {
	        if ($.inArray(e, result) == -1) result.push(e);
	    });
	    return result;
	}

	var allContext = unique(allContext);
	var allMethod = unique(allMethod);
	var allBias = unique(allBias);

	// output all available attributes to the dropdowns
	$.each (allContext, function(i,val) {
        $('select#context').append('<option value="' + val + '">' + val + '</option>');
    })

    $.each (allMethod, function(i,val) {
        $('select#method').append('<option value="' + val + '">' + val + '</option>');
    })

    $.each (allBias, function(i,val) {
        $('select#bias').append('<option value="' + val + '">' + val + '</option>');
    })

// filtering functionality (this only works if all attributes accross all dropdowns are different)

    var selected = [];

    $(".solution").hide();

    $("select").change(function() {
    	$(".solution").hide();

    // get all selected values together
	selected = [];

	$(".main-select-form select").each(function() {
	    if ($(this).val() !== ""){
	    	selected.push($(this).val());
	    }
	});
	 
	if (selected.length === 3) { // this run only if you have all three dropdown values

		// get all element values
		var allAttributes = [];

		$(".nr_solutions").each(function(i, obj) {
		    allAttributes = [];

		    var thisContext = $(this).data("context");
			var thisMethod = $(this).data("method");
			var thisBias = $(this).data("bias");

			allAttributes = thisContext.concat(thisMethod).concat(thisBias);

					function superbag(sup, sub) {
					    sup.sort();
					    sub.sort();
					    var i, j;
					    for (i=0,j=0; i<sup.length && j<sub.length;) {
					        if (sup[i] < sub[j]) {
					            ++i;
					        } else if (sup[i] == sub[j]) {
					            ++i; ++j;
					        } else {
					            // sub[j] not in sup, so sub not subbag
					            return false;
					        }
					    }
					    // make sure there are no elements left in sub
					    return j == sub.length;
					}

			var result = superbag(allAttributes, selected);

			if (result === true) {
				$(this).parent().show();
			}

			$(".reporting-module-container").show();
			$(".home-content").hide();

		});

	} // end if

   	});

	//relationship toggle
	$('.relationship').click(function(){
		$(this).toggleClass('selected');
		$(this).siblings().toggleClass('selected');
	});

// reporting functionality

$(".wpcf7-form").find(".wpcf7-submit").click(function(){

	// not the best: same number could be generated twice
	// try adding current time
	var reportId = Math.floor(Math.random() * (999999-100000) + 100000);

	//TODO: write and display submitted values on 2d step
	var thecontext = $('#context').val();
	var themethod = $('#method').val();
	var thebias = $('#bias').val();
	var therelationship = $('.relationship.selected').attr('id');

	$("#hidden-context").val(thecontext);
	$("#hidden-method").val(themethod);
	$("#hidden-bias").val(thebias);	
	$("#hidden-relationship").val(therelationship);	

	$("#hidden-reportid").val(reportId);

	
	sessionStorage.setItem("reportIds", reportId);
	sessionStorage.setItem("submitted",
		thecontext + '<br />' +
		themethod + '<br />' +
		thebias
		);
});

	// the basic show of the report form (hidden on load)
	var heightOfReport = $('.reporting-module-container').height()-32;
	$('.reporting-module-container').css('height', '9rem');


	$('.reporting-module-container').click(function(){
		$('.open-more').hide();
		$('.reporting-module-gradient').remove();

		$(this).animate({
			height: heightOfReport
			}, 400, function(){});

	});

	// only show contact field if help needed
	$('#contact').parent().parent().hide();
	$('.privacy-notice .zaupno').hide();

	$('#help input').click(function(){
		if ($('#help input').is(':checked')) {
			$('#contact').parent().parent().show();
			$('.privacy-notice .zaupno').show();
			$('.privacy-notice .anon').hide();
		} else {
			$('#contact').parent().parent().hide();
			$('.privacy-notice .anon').show();
			$('.privacy-notice .zaupno').hide();
		}
	});

});