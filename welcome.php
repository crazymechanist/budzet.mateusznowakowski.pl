<?php
	session_start();
	if((!isset($_SESSION['register_suceess'])) || ($_SESSION['register_suceess']=false)){
		header('Location: logowanie');
		exit();
	}
	else{
		unset($_SESSION['register_suceess']);
		header('Refresh: 2; URL=http://localhost/twojakieszen/logowanie'); #przekierowanie
	}
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>Skarbonka</title>
		<meta name="description" content="Aplikacja do prowadzenia budżetu domowego">
		<meta name="keywords" content="budżet, finanse, przychody, rozliczenia">
		<meta name="author" content="Mateusz Nowakowski">
		<meta http-equiv="X-Ua-Compatible" content="IE=edge">
		
		<link rel="icon" type="image/png" href="img/icon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=latin-ext" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
		
	</head>
	<header>
		<div class="container-fluid bg-light myColor">
			<div class="row">
				<nav class="navbar navbar-light py-0 py-sm-1 col">
					<a class="d-flex navbar-brand my-0 py-1 mx-auto mx-sm-4" href="#">
						<svg xmlns="http://www.w3.org/2000/svg" class="d-inline-block align-center py-1 my-1 myColor" viewBox="-50 275 700 600" fill-rule="evenodd" width="42" height="42" role="img" focusable="false">
							<?php require('pig_body_svg.php')?>
						</svg>
						<h5 class="h3 d-inline-block font-weight-normal align-center ml-1 py-1 my-1 myColor">Skarbonka</h5>
					</a>
				</nav>
			</div>
		</div>	
	</header>
	
	<main>
		<div class="container text-center form_window"> 
			<a href="logowanie" style="color: black !important; text-decoration: none;">
				<div class="row justify-content-around">
					<svg xmlns="http://www.w3.org/2000/svg" class="d-inline-block align-center py-1 my-1" viewBox="-50 275 700 600" fill-rule="evenodd" width="250" height="250" role="img" focusable="false">
						<?php require('pig_body_svg.php')?>
					</svg>
				</div>
				<div class="row justify-content-around h2" style="">
					Dziękujemy za rejestrację!
				</div>
			</div>
		</a>
	</main>
	
	<footer>
		<div class="container justify-content-center mt-5">
			<div class="row justify-content-center">
				<p class="mt-5 mb-3 text-muted"><a class="mr-1" href="#">Mateusz Nowakowski </a> &copy; 2020</p>
			</div>
		</div>
	</footer>
	
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>	