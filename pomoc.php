
<?PHP
session_start();
require('core/DB.php');
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/mycss.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">eFind</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li><a href="pomoc.php">Pomoc</a></li>
        
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	
			<div class="jumbotron">
			<div class="container">
			  <h1>Pomoc</h1>
			  <p>Wypełnij formularz, aby zgłosić błędy lub sugestie.</p>
			  
			  </div>	<!-- /.container -->
			</div><!-- /.jumbotron -->
			
			<div class="container">
			<h3>Temat zgłoszenia:</h3>
			
	<form action="raport.php" method="post">
			
				<div class="input-group"  style="width:100%;">
				  <input  required name="temat" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
				</div>
			<h3>Treść zgłoszenia:</h3>	
				<div class="input-group" style="width:100%;">
				  <textarea required name="tresc" class="form-control"  aria-describedby="basic-addon1" style="height:200px; "></textarea> 
				</div>
			<button type="submit" class="btn  btn-block btn-info">Zgłoś</button>
			</div>
			
	</form>
			
			<div style="height:205px;">
			
			<?PHP
			
			if(isset($_COOKIE['raport']))
			{
				$id = $_COOKIE['raport'];
					$sql =  "SELECT * FROM raport WHERE id IN ($id)";
				
					try
						{
						$query = $pdo->prepare($sql);
						$query->execute();
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
						
						print_r($result = $query->fetchALL(PDO::FETCH_ASSOC));

			}	//if(isset($_COOKIE['raport']))		
			?>
			
			</div>
			
			
	
	
<footer>			
					<p style="text-align:center;padding:24px 0;margin:0;color:#9d9d9d;">eFind© 2015 </p>			
</footer>
	
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<script src="bootstrap/jquery/jquery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/jquery/myjq.js"></script>
  </body>
</html>

