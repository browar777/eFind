<?PHP
include 'class-function/pdf/vendor/autoload.php';
require('class-function/doc_convert.php');
require('class-function/function.php');
session_start();


$email_list = array();
			
			if(isset($_POST['www']))
			{
				$text = file_get_contents($_POST['www']);
			}
			
			if(isset($_POST['comment']))
			{
				$text = $_POST['comment'];
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
				$email_list = array_unique($email_list);
				
					if(empty($_SESSION['email_list']))
					{
						$_SESSION['email_list'] = $email_list;	
					}
					else
					{
						$merge = array_merge($_SESSION['email_list'], $email_list);
						$email_list = array_unique($merge);
						$_SESSION['email_list'] = $email_list;	
					}
			}
			
print_r($_FILES);
echo '</br>';
print_r($_POST);
print_r($_SESSION['email_list']);


		
		foreach($email_list as $email)
		{
			echo '<li>'.$email.'</li>'; 
		}
		
		
	header('Location: index.php#find-email');
		
	
		
	