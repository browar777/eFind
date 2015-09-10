﻿

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
      <a class="navbar-brand" href="#">eFind</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        
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
					  <img src="img/www.png" alt="..." data-toggle="modal" data-target=".bs-example-modal-sm">
					  
						<form action="validation.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
								<input type="text"  name="www"/>
								<button type="submit" class="btn btn-default">Submit</button>
						</form>
					  
					</a>
				  
  
	</div><!-- /.row -->
	
	
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-md ">
								<div class="modal-content">
									<form action="validation.php" method="POST" class="form-inline" enctype="multipart/form-data">
										<input type="text"  name="www"/>
										<button type="submit" class="btn btn-default">Submit</button>
									</form>
								</div>
						  </div>
				</div><!-- /.Modal -->
	
	
			
</div><!-- /.container -->
	
	<div class="container">
		<button type="submit" id="submit" class="btn btn-primary btn-lg btn-block" disabled="disabled">Szukaj</button>
	</div>
	
	
	
	
	
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<script src="bootstrap/jquery/jquery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/jquery/myjq.js"></script>
  </body>
</html>

