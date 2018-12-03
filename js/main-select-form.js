jQuery(document).ready(function( $ ) {

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

    // filtering functionality

    // get all selected values. this only works if all attributes accross all dropdowns are different

    var selected = [];
   

    $("select").change(function() {

    	// get all selected values

	    	selected = [];

	    	$(".main-select-form select").each(function() {
	    		selected.push($(this).val());
	    	});

	    	// TODO output only when all three are not empty

	    	// TODO if selected.length === 3 :

	    // get all element values
	    	var allAttributes = [];

			$(".nr_solutions").each(function(i, obj) {
	    		allAttributes = [];

	    		var thisContext = $(this).data("context");
				var thisMethod = $(this).data("method");
				var thisBias = $(this).data("bias");

				allAttributes = thisContext.concat(thisMethod).concat(thisBias);
				
				//pseudocode
				/*if (allAttributes.includes(selected)) {
					console.log(this);
				}*/

				//development
				//console.log(allAttributes);
			});




   	});


    $(".nr_solutions").each(function(i, obj) {
    	//$(this).hide();
    });

});