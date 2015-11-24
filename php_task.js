	$(document).ready(function(){
		$("button").button();
		
		$( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#signup" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
});