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
    	$(".nr_solutions").hide();

    $("select").change(function() {
    	$(".nr_solutions").hide();

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
				$(this).show();
			}

			$(".reporting-module-container").show();
			$(".home-content").hide();

		});

	} // end if

   	});

// reporting functionality

$(".wpcf7-form").find(".wpcf7-submit").click(function(){
	console.log(selected);

	// not the best: same number could be generated twice
	// try adding current time
	var reportId = Math.floor(Math.random() * (999999-100000) + 100000);

	$("#hidden-context").val(selected);
	$("#hidden-reportid").val(reportId);

	sessionStorage.setItem("reportIds", reportId);
});




});