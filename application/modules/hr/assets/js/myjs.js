jQuery(document).ready(function(){
   $(".add-employee").click(function(){
      $(".add-employee-dialog").dialog({
	     modal : false,
		 width:500
	  });
   });
   $(".start-date").datepicker();
});