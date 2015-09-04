<?PHP
function multiexplode ($text)    //Funkcja tworzy tablice z textu
			{
				echo '<pre>';
				//echo $text;
				echo '</pre>';
								
				$text = preg_replace('/\s+/', ',', $text);  //zast�puje wszystkie odst�py przecinkami
				
				$delimiters = array('|',':','[',']','(',')','-','+','<','>','?','!');
				$ready = str_replace($delimiters, ',', $text);  //zast�puje powyrzsze znaki przecij
				$launch = explode(',', $ready);

				return  $launch;
				
			}
			
function validate($text)  
			{
					$z = array_filter(multiexplode($text),function($i) {return filter_var($i, FILTER_VALIDATE_EMAIL); });
					return $z;
			}	
			
			
function translate($text)
{
	
							$text = utf8_encode ( $text );
						
						
									$text = preg_replace('/¹/', 'ą', $text);	
									$text = preg_replace('/¥/', 'Ą', $text);	
									$text = preg_replace('/æ/', 'ć', $text);	
									$text = preg_replace('/Æ/', 'Ć', $text);	
									$text = preg_replace('/ê/', 'ę', $text);	
									$text = preg_replace('/Ê/', 'Ę', $text);
									$text = preg_replace('/³/', 'ł', $text);
									$text = preg_replace('/£/', 'Ł', $text);
									$text = preg_replace('/¿/', 'ż', $text);
									$text = preg_replace('/¯/', 'Ż', $text);
							
									
							return $text;
}
			
			
function microtime_float()
			{
				list($usec, $sec) = explode(" ", microtime());
				return ((float)$usec + (float)$sec);
			}
			
?>