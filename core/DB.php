<?PHP
session_start();

	const DNS         	= 'mysql:host=23134.m.tld.pl;dbname=baza23134_korek';
	const USER 	    	= 'admin23134_korek';
	const PASSWORD = '0JlT^M0rG3';


		try
		{
			$pdo = new PDO(DNS , USER , PASSWORD);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$pdo->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}


		
		
	
/*	
	$sql = "SELECT * FROM img";
				
		try
			{
			$query = $pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			}
			catch(Exception $e)
			{
				echo '<pre>';
				echo 'ERROR:  '.$sql;
				echo '</pre>';			
				echo $e->getMessage();
				die;
			}	
		
		$dane = $query->fetchAll(PDO::FETCH_OBJ);
		
		print_r($dane);

*/



?>