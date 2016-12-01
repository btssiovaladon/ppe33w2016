$(document).ready(function(){

  var closing_search = false;
  	$('#usr').autocomplete({

  		  source : 'include/searchAmis.php',
  			minLength : 0,
        messages: {
        noResults: '',
        results: function() {}
    },
  			close: function()
  	    {
  	        // avoid double-pop-up issue
  	        closing_search = true;
  	        setTimeout(function() { closing_search = false; }, 300);
  	    }
  	})
  	.focus(function() {
  	    if (!closing_search)
  	        $(this).autocomplete("search");
  	});

});
