<?PHP
session_start();
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
			  <h1>eFind</h1>
			  <p>Strona pozwala w łatwy i szybki sposób znaleźć wszystkie adresy email znajdujące się w wskazanym przez ciebie pliku/stronie internetowej.</p>
			  
			  </div>	<!-- /.container -->
			</div><!-- /.jumbotron -->
			
<div class="container">
			
	<div class="row">
			<div id="main">
				  
					<a href="#" class="thumbnail col-xs-6 col-md-3" >
					  <img src="img/PDF-icon.png" alt="..."  />
					  
						<form action="validation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<input type="file" accept=".pdf" name="file" />
								<button type="submit" class="btn btn-default">Submit</button>
						</form>
						
					</a>
					<a href="#" class="thumbnail col-xs-6 col-md-3">
					  <img src="img/docx.jpg" alt="...">
					  
						<form action="validation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<input type="file" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="file" />
								<button type="submit" class="btn btn-default">Submit</button>
						</form>
					  
					</a>
					<a href="#" class="thumbnail col-xs-6 col-md-3" >
					  <img src="img/txt-file-1.png" alt="..." >
					  
						<form action="validation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<input type="file" accept="text/plain" name="file" />
								<button type="submit" class="btn btn-default" >Submit</button>
						</form>
					  
					</a>
					<a href="#" class="thumbnail col-xs-6 col-md-3 " >
					  <img src="img/www.png" alt="..." data-toggle="modal" data-target="#web-modal">
					  
						<form action="validation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<input type="text"  name="www"/>
								<button type="submit" class="btn btn-default">Submit</button>
						</form>
					  
					</a>
			</div>  <!-- /.main -->
  
	</div><!-- /.row -->
	
	
			<div id="web-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-md ">
								<div class="modal-content" style="padding:20px;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Podaj adres strony</h4>
									</div>
									<form action="validation.php" method="POST">
										<input type="text" value="http://" name="www" style="margin:10px;" size="35"/>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Szukaj</button>
									</form>
								</div>
						  </div>
				</div><!-- /.Modal -->
	
	
			
</div><!-- /.container -->
	
	<div class="container">
		<button type="submit" id="submit" class="btn btn-lg btn-block" disabled="disabled">Szukaj</button>
	</div>
	
	</br></br></br>
	
<div class="container">	
	<div class="form-group">
	<form action="validation.php" method="POST">
		  <label for="comment">Jeżeli plik, który chcesz przeszukać nie odpowiada żadnemu z powyższych formatów,skopiuj jego zawartość i wklej poniżej:</label>
		  <textarea class="form-control" rows="5" id="comment" name="comment" ></textarea>
		  <button type="submit" class="btn  btn-block" disabled="disabled">Szukaj</button>
	</form>
	</div>
</div>

<?PHP

		if(isset($_SESSION['empty-list-error']))
		{
			echo '<div class="container"><div class="alert alert-danger" role="alert"><strong>Nie znaleziono żadnych adresów e-mail, możliwe że format pliku wskazany do przeszukania nie jest wspierany przez eFind, proszę skopiować jego zawartość i skorzystać z pola po wyżej.</strong></div></div>';
			unset($_SESSION['empty-list-error']);
		}


	if(isset($_SESSION['email_list']) && !empty($_SESSION['email_list']))
	{
		
			$email_list = $_SESSION['email_list'];
	
?>
		</br></br>
				<div class="container" id="find-email">	
				<table class="table table-bordered table-hover">
					<tr class="info">
						<td style="width:30px;"><strong>#<string></td>
						<td><strong>Znalezione adresy email<string></td>
					</tr>
					<form action="edit.php" method="POST">
						<?PHP
							$i = 1;
							foreach($email_list as $id=>$email)
							{
								
								if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
								{								
									echo '<tr class="success">';
								}
									else echo '<tr class="danger">';
								
												echo	'<td><strong>'.$i++.'</strong></td>
													<td><strong class="email-text">'.$email.'</strong>
													
											
													<input  class="hide-input" type="text" name="'.$id.'"  value="'.$email.'" />
													
													<button type="submit" class="btn btn-success hide-input"  data-toggle="tooltip" data-placement="top" title="Zapisz" name="action" value="'.$id.'" >
															<span class="glyphicon glyphicon-ok"></span>
													</button>
											
													
													<span  style="margin-left:10px;" class="btn btn-primary edit" data-toggle="tooltip" data-placement="top" title="Edytuj">
															<span class="glyphicon glyphicon-pencil"></span>
													</span>
													<a  href="edit.php?email_id='.$id.'" style="margin-left:5px;" role="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Usuń">
															<span class="glyphicon glyphicon-trash"></span>
													</a>
													</td>
											</tr>'; 
							}//foreach($email_list as $id=>$email)
						?>
					</form>
					</table>
					
				
					
					<div class="row">
							<button href="#" type="button" class="btn btn-primary btn-lg col-xs-6"  data-toggle="modal" data-target="#create-mail">Stwórz maila</button>
							<a href="reset.php" type="button" class="btn btn-default btn-lg col-xs-6">Reset</a>
					</div>
					
				</div><!-- /.container -->
				
				
				<div id="create-mail" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-md ">
								<div class="modal-content" style="padding:20px;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title">Stwórz mail korzystając z konta google(zalecane)</h3>
									</div>
									
								
									<a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?PHP echo implode(",", $email_list); ?>" class="thumbnail" >
										  <img src="img/gmail.png" alt="..." >
									</a>
									
									<h3>Lub z korzystaj z okna poniżej, używając dowolnego adresu e-mail lecz istnieje prawdopodobieństwo, że twoja wiadomość wyląduję w spamie.</h3>
						<form action="http://mail1.esy.es/mail.php" method="GET">			
									<div class="row">
										<div class=" col-xs-6">
										<h3>Adresat:</h3>
											<div class="input-group input-group-lg">										
													<input type="text" class="form-control" name="email-list" value="<?PHP echo implode(",", $email_list); ?>" aria-describedby="sizing-addon1" required>
											</div>
										</div>
										<div class=" col-xs-6">
										<h3>Nadawca:</h3>
											<div class="input-group input-group-lg">										
													<input type="text" name ="adress" class="form-control" placeholder="E-mail Nadawcy" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div><!-- /.row -->
									
									<div class="input-group" style="margin-top:10px;">
									<h4 class="pull-left">Nagłówek:</h4>
									  <input type="text" class="form-control" name="subject" aria-describedby="basic-addon1" required>
									</div>
									
										<textarea style="margin-top:10px;" class="form-control" rows="5" id="comment" name="message" required></textarea>
										<button type="submit" class="btn  btn-info btn-block" >Wyślij</button>
						</form>			
									
									
								</div>
						  </div>
				</div><!-- /.Modal -->
				
				
				
				
<?PHP
		
	}//if(isset($_SESSION['email_list']))
?>
	
	
	
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

