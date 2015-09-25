<?PHP

require('core/DB.php');


print_r($_POST);

$temat = $_POST['temat'];
$tresc = $_POST['tresc'];
$strona = 'eFind';
//get yours ip adress ----------------------------//
											$ip = getenv('HTTP_CLIENT_IP')?:
											getenv('HTTP_X_FORWARDED_FOR')?:
											getenv('HTTP_X_FORWARDED')?:
											getenv('HTTP_FORWARDED_FOR')?:
											getenv('HTTP_FORWARDED')?:
											getenv('REMOTE_ADDR');
										//  ----------------------------//
										
										
$data = time();

$key = 'temat,tresc,strona,ip,data';

$sql =  "INSERT INTO raport ($key) VALUE (?,?,?,?,?)";
				
		try
			{
			$query = $pdo->prepare($sql);
			$query->execute(array($temat,$tresc,$strona,$ip,$data));
			$count = $query->rowCount();
			$last_id = $pdo->lastInsertId();
			}
			catch(Exception $e)
			{
				echo '<pre>';
				echo 'ERROR:  '.$sql;
				echo '</pre>';			
				echo $e->getMessage();
				die;
			}	
		
	echo '</br>';
	
	
	
	if(isset($_COOKIE['raport']))
	{
	$id = $_COOKIE['raport'].','.$last_id;
	}
	else $id = $last_id;
	
	setcookie("raport",$id,time() + (10 * 365 * 24 * 60 * 60));
	
	
	//echo $_COOKIE['raport'];
	
	