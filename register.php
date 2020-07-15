<?php
	session_start();
	if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){
		header('Location: bilans');
		exit();
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
					<div class="col-md-4 d-lg-block d-none" style="max-width: 330px; margin-bottom:3.5rem;">
						<figure>
							<figcaption>
								<blockquote class="blockquote mt-5 text-left">
									<p class="mb-0">Oszczędność jest to umiejętność unikania zbędnych wydatków.</p>
									<div class="blockquote-footer">Seneka Młodszy</div>
								</blockquote>
							</figcaption>
							<img src="img/seneka.png" alt="Kura" role="img" style="width:300px; height:auto;">
						</figure>
					</div>
					<form action="sign-in.php" method="post" class="col-md-6" style="margin-top:100px;">
						<h1 class="h2 mb-2 font-weight-normal">Zarejestruj się</h1>
						<div class="row py-2 pt-5">
							<div class="col-12 pb-2 col-md-6 pb-md-0">	
								<input type="text" class="form-control" name="name" id="name" placeholder="imię" value="<?=isset($_SESSION['fr_name']) ? $_SESSION['fr_name'] : '';unset($_SESSION['fr_name']) ?>">
							</div>
							<div class="col-12 pt-2 col-md-6 pt-md-0">	
								<input type="text" class="form-control" name="surname" id="surname" placeholder="nazwisko" value="<?=isset($_SESSION['fr_surname']) ? $_SESSION['fr_surname'] : ''; unset($_SESSION['fr_surname']) ?>">
							</div>
						</div>
						<div class="row py-2">
							<div class="col">
								<input type="email" class="form-control" name="email" id="email" placeholder="e-mail" value="<?=isset($_SESSION['fr_email']) ? $_SESSION['fr_email'] : '' ; unset($_SESSION['fr_email'])?>">
								<?php if(isset($_SESSION['e_email'])) {echo $_SESSION['e_email']; unset($_SESSION['e_email']);} ?>
							</div>
						</div>
						<div class="row py-2">
							<div class="col">						
								<input type="password" class="form-control" name="pass" id="pass"  placeholder="hasło">
								<?php if(isset($_SESSION['e_pass'])) {echo $_SESSION['e_pass']; unset($_SESSION['e_pass']);} ?>
							</div>
						</div>
						<div class="row py-2">
							<div class="col">						
								<input type="password" class="form-control" name="repeat_pass" id="pass"  placeholder="powtórz hasło">
							</div>
						</div>
						<button class="btn btn-lg mt-5 my_btn btn-primary btn-block mb-4 myColor without_border mx-auto" type="submit">Zarejestruj się</button>
						<div class="d-block separator"></div>
						<a href="logowanie" class="btn btn-lg btn-secondary btn-block mx-auto mt-4 without_border" role="button" id="register_btn">Strona logowania</a>
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