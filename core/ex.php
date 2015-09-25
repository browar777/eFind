<?PHP

class DB
{
	private static $_instance;
	private $_pdo,
				$_query,
				$_error = null, 
				$_result , 
				$_count ;
		
	 private function __construct()
	{

	
		try
		{
			$this->_pdo = new PDO(DNS , USER , PASSWORD);
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$this->_pdo->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
			
    }
	
	public static function getInstance()
	{
		if(empty(self::$_instance))
		{
			self::$_instance = new DB;
			
		}
		
		return self::$_instance;
	}
	
	
	private function _action($prepare,$execute = null)
	{
	
			try
			{
			$this->_query = $this->_pdo->prepare($prepare);
			$this->_query->execute($execute);
			$this->_count = $this->_query->rowCount();
			}
			catch(Exception $e)
			{
				echo '<pre>';
				echo 'ERROR:  '.$prepare;
				echo '</pre>';			
				echo $e->getMessage();
				die;
			}
			
			
			if(substr($prepare, 0, 6)=='SELECT')
			{
				return $this->_query->fetchAll(PDO::FETCH_OBJ);	
			}
				
	}


	
	public function Get($table,$row = null,$value = null)
	{
			if(isset($row,$value))
			{
				$query = "SELECT * FROM $table WHERE $row = ?";
				return $this->_action($query,array($value));
			}
			else
			{
				$query = "SELECT * FROM $table";
				return $this->_action($query);
			}
	}
	
	
	
	public function Insert($table,$value)
	{
			$key			= array_keys($value);
			$key			 = implode(',',$key);
			$question   = array(); 
			$execute    =array();
		foreach($value as $x)
		{
			$question[] = '?'; 
			$execute[]  = escape($x);
		}
		$question = implode(',',$question);
		
		$query = "INSERT INTO $table ($key) VALUE ($question)";
	    $this->_action($query,$execute);
	}
	
	
	
	public function Update($table,$value,$id)
	{
		$data = array();
		$execute = array();
		foreach($value as $key=>$x)
		{
				$data[] = $key.' = ?';
				$execute[] = $x;
		}
		$execute[] = $id;
		$data = implode(', ',$data);
		
		$query = "UPDATE $table SET $data WHERE id = ?";
		//echo $query; print_r($execute);
	    $this->_action($query,$execute);
		
	}
	
	public function delete($table,$value,$id)
	{
		$sql = "DELETE FROM $table WHERE $value = ?";
		$stmt = $this->_pdo->prepare($sql);	  
		$stmt->execute(array($id));
	}
	
	
	
	public function Count()
	{
		return $this->_count;
	}
	
	
	
	public function scroll($load,$x = 0,$page)
	{
		$load *= 8;

		if($x!=0)
		{
			$load = $load + $x;
		}
		
		
		//echo $page;
		
		$result = $this->_pdo->query("SELECT * FROM img WHERE page = '$page' ORDER BY id DESC LIMIT $load,8");
		return $result->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	public function StartLoad($switch,$page)
	{
		
		    $img = $this->scroll(0,0,$page);
			$input_array = $img;
            $spli_array = array_chunk($img, 4);
			


					foreach($spli_array[$switch] as $key=>$value)
					{
						include('core/thumbnail.php');
					}
					
	}
	
	
		public function upload_check($ip)
		{
			
			$next = $this->_pdo->query("SELECT data FROM img WHERE ip = '$ip'  ORDER BY id DESC LIMIT 1");
			$record = $next->rowCount();
			if($record)
			{
		    return $next->fetchAll(PDO::FETCH_OBJ);
			}
			else return null;
		}
		
		public function custom($ask)
		{
			 	
        $query = $this->_pdo->prepare($ask);
        $query->execute();
				
		}
		
		
		
		public function TEST($ip)
		{
			//echo 'TEST';
			
			$next = $this->_pdo->query("SELECT data FROM img WHERE ip = '$ip'  ORDER BY id DESC LIMIT 1");
			$record = $next->rowCount();
			if($record)
			{
		    return $next->fetchAll(PDO::FETCH_OBJ);
			}
			else return null;
		}
	
	
	
	

}