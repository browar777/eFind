<?PHP
include 'class-function/pdf/vendor/autoload.php';
require('class-function/doc_convert.php');
require('class-function/function.php');



$email_list = array();
			
			if(isset($_POST['www']))
			{
				$text = file_get_contents($_POST['www']);
			}
			

			
			
			if(!empty($_FILES['file']['name']))
			{
				
		
					$extent = $_FILES['file']['name'];   //nazwa lpiku potzreba by znaleœæ rozszerzenie
			
					$type = explode('.',$extent);
					$type = end($type);
					
					$file = $_FILES['file']['tmp_name'];  ///tymczasowa œcie¿ka do pliku
						
					if($type == 'pdf' || $type == 'PDF')
					{
						$text = file_get_contents($file);
						if(!empty($text))
						{	
						$parser = new \Smalot\PdfParser\Parser();
						$pdf    = $parser->parseFile($file);
						$text = $pdf->getText();
						}
						
						
						
					}
					else if($type == 'txt' || $type == 'TXT')
					{
						$text = file_get_contents($file);
						$text = translate($text);
									
						
					}
					else if($type == 'docx' || $type == 'DOCX')
					{
						$docObj = new DocxConversion($extent,$file);
						$text = $docObj->convertToText();
					}
			}
			

			
			if(isset($text))
			{
				$email_list = validate($text);
			}
			
print_r($_FILES);
echo '</br>';
print_r($_POST);
?>


<ol>
		<?php
		
		foreach($email_list as $email)
		{
			echo '<li>'.$email.'</li>'; 
		}
		
		
	
		
	
		?>
		</ol>