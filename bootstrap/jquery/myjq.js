$(function()
{		

		$('html').addClass('js');

		$(".thumbnail").on('click','img',function()
		{			
			 $(this).parent().find( "input" ).click();
		});
		
		 $("#main input").on('change', function () 
		 {
			 var x = $(this).closest('.thumbnail');
			 $('#submit').removeAttr('disabled');
			  $('#submit').addClass('btn-success');
			x.addClass('send');
			 
		 });
		 
	
		
	$('textarea').on('input', function() {
				 var x = $(this).closest('.container').find('button');
				x.removeAttr('disabled');
				x.addClass('btn-success');
		});
		
		 
		 $(".container").on('click','#submit',function()
		{		
			$('.send').find( "button" ).click();
		});
		
		$('[data-toggle="tooltip"]').tooltip();
		
		$(".container").on('click','.edit',function()
		{		
			$(this).closest( "tr" ).find('.hide-input').toggle();
			$(this).siblings( "strong" ).toggle();
			
			
		});
			
			
			
	  
 });