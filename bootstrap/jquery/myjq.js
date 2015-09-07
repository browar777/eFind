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
			$('.thumbnail').addClass('ukryj');
			x.removeClass('ukryj');
			x.addClass('center');
			 
		 });
		 
		 $(".container").on('click','#submit',function()
		{		
			$('.center').find( "button" ).click();
		});
			
			
			
	  
 });