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
	
	<body>
		
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
				<div class="row justify-content-around">
					<div class="col-sm-5 d-sm-block d-none pr-0" style="max-width: 330px;border-right: 1px dotted black; margin-top:3.5rem;">
						<figure>
							<img src="img/hen.svg" alt="Kura" role="img">
							<figcaption>
								<blockquote class="blockquote mt-5">
									<p class="mb-0 mt-1">Grosz do grosza, a będzie kokosza</p>
								</blockquote>
							</figcaption>
						</figure>
					</div>
					<form class="form-signin col-sm-6 pl-sm-8">
						<svg xmlns="http://www.w3.org/2000/svg" class="d-inline-block align-center py-1 my-1" viewBox="-50 275 700 600" fill-rule="evenodd" width="125" height="125" role="img" focusable="false">
							<?php require('pig_body_svg.php')?>
						</svg>
						<h1 class="h2 mb-2 font-weight-normal pb-2">Zaloguj się</h1>
						<label for="inputEmail" class="sr-only">Adres email</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Adres email" required autofocus>
						<label for="inputPassword" class="sr-only">Hasło</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Hasło" required>
						<div class="checkbox mb-3">
							<label>
								<input type="checkbox" value="remember-me"> Pamiętaj mnie
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block mb-4 myColor without_border" type="submit">Zaloguj się</button>
						<div class="d-block separator"></div>
						<a href="register.php" class="btn btn-lg btn-secondary btn-block mx-auto mt-4 without_border" role="button" id="register_btn">Załóż konto</a>
						
					</form>
				</div>
			</div>
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