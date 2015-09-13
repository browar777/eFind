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
		 
	
		
	$('textarea').on('input', function() {
				 var x = $(this).closest('.container').find('button');
				x.removeAttr('disabled');
		});
		
		 
		 $(".container").on('click','#submit',function()
		{		
			$('.send').find( "button" ).click();
		});
		
		$('[data-toggle="tooltip"]').tooltip();
			
			
			
	  
 });