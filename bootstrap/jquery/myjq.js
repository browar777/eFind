$(function()
{		

		$('html').addClass('js');

		$(".thumbnail").on('click','img',function()
		{			
			 $(this).parent().find( "input" ).click();
		});
		
		 $("input").on('change', function () 
		 {
			 var x = $(this).closest('.thumbnail');
			 $('#submit').removeAttr('disabled');
			x.addClass('send');
			 
		 });
		 
		 $(".container").on('click','#submit',function()
		{		
			$('.send').find( "button" ).click();
		});
			
			
			
	  
 });