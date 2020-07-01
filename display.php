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
		<link rel="stylesheet" href="css/fontello.css">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			
			function drawChart() {
				
				var data = google.visualization.arrayToDataTable([
				['Wydatek', 'Kwota'],
				['Jedzenie', 800],
				['Transport',     50, ],
				['Telekomunikacja',      100],
				['Opieka zdrowotna',  300],
				['Ubranie', 300],
				['Higiena',    100],
				['Dzieci',    500],
				['Rozrywka',    200],
				['Wycieczka',    600],
				['Książki',    100],
				['Oszczędności',    500],
				['Na złotą jesień, czyli emeryturę',    400],
				['Spłata długów	',    30],
				['Darowizna',    50],
				]);
				
				var options = {
					legend: 'none',
					pieSliceText: 'label',
					slices: {
						0: { color: '#3366CC' },
						1: { color: '#dc3912' },
						2: { color: '#FF9900' },
						3: { color: '#109618' },
						4: { color: '#990099' },
						5: { color: '#0099C6' },
						6: { color: '#DD4477' },
						7: { color: '#66AA00' },
						8: { color: '#B82E2E' },
						9: { color: '#316395' },
						10: { color: '#994499' },
						11: { color: '#22AA99' },
						12: { color: '#AAAA11' },
						13: { color: '#6633CC' },
					},
					width: '100%',
					height: '500px'
				};
				
				var chart = new google.visualization.PieChart(document.getElementById('piechart'));
				
				chart.draw(data, options);
			}
		</script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=latin-ext" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
		
		
	</head>
	
	<body>
		
		<header>
			<div class="container-fluid bg-light myColor px-0">
				<nav>
					<div class="navbar navbar-light py-0 py-sm-1 row justify-content-center align-items-center">
						<div class="col d-block d-sm-none"></div>
						<div class="col-6">
							<a class="d-flex navbar-brand my-0 py-1" href="#">
								<svg  xmlns="http://www.w3.org/2000/svg" class="d-inline-block align-center py-1 my-1 mx-auto mx-sm-1 myColor" viewBox="-50 275 700 600" fill-rule="evenodd" width="42" height="42" role="img" focusable="false">
									<?php require('pig_body_svg.php')?>
								</svg>
								<h5 class="h3 font-weight-normal align-center ml-1 py-1 my-1 myColor d-none d-sm-inline-flex">Skarbonka</h5>
							</a>
						</div>
						<div class="col py-0 px-0 py-sm-1 d-block">
							<div class="col py-0 px-0 py-sm-1 d-block">
								<div class="d-flex justify-content-end p-2">
									<button type="button" class="btn btn-link" style="color:white;"> <span class="d-none d-sm-inline-flex">Wyloguj</span> <i class="demo-icon icon-logout"></i> </button>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
			
			<div class="container mt-2">
				<nav class="nav nav-tabs nav-fill row">
					<a class="nav-item nav-link col-6" href="create.php"><span class="d-none d-sm-inline-flex"> Dodaj przepływ pieniężny</span><i class="demo-icon icon-plus"></i></a>
					<a class="nav-item nav-link active col-6" ><span class="d-none d-sm-inline-flex"> Przeglądaj przepływy </span> <i class="icon-eye"></i></a>
				</nav>
			</div>
		</header>
		
		<main>
			<div class="container">
				<div class="row justify-content-end">
					<button type="button" class="btn btn-outline-dark mb-2 mt-4" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="icon-calendar"></i> Zmień zakres dat</button>
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" id="myLargeModalLabel">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Zakres dat</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="change_dete.php" method="post">
										<div>
											<label for="initial_date" class="d-inline-flex p-2" > Data początkowa: </label>
											<input class="form-control d-inline-flex" style="width:50%" type="date" id="initial_date">
										</div>
										<div>
											<label for="final_date" class="d-inline-flex p-2" > Data końcowa: </label>
											<input class="form-control d-inline-flex" style="width:50%" type="date" id="final_date">
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
									<button type="button" class="btn btn-primary">Zapisz</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="position-relative">
					<div id="piechart" class="position-relative" style="height:600px;"></div>
					<div class="row align-items-center" style="position: absolute;	width: 100%;	height: 100%;	left: 0px;	bottom: 0px;">
						<div class="col text-left">
							<i class="icon-left-open-outline"></i>
						</div>
						<div class="col text-center">
						</div>
						<div class="col text-right">
							<i class="icon-right-open-outline"></i>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#3366CC; color: white">
							<div class="card-body">
								<h5 class="card-title h6">Jedzenie</h5>
								<p class="card-text h6">800 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#dc3912; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Transport</h5>
								<p class="card-text h6">50 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#FF9900; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Telekomunikacja</h5>
								<p class="card-text h6">100 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#109618; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Opieka zdrowotna</h5>
								<p class="card-text h6">300 PLN</p>
							</div>
						</div>
					</div>			
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#990099; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Ubranie</h5>
								<p class="card-text h6">300 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#0099C6; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Higiena</h5>
								<p class="card-text h6">100 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#DD4477; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Dzieci</h5>
								<p class="card-text h6">500 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#66AA00; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Rozrywka</h5>
								<p class="card-text h6">200 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#B82E2E; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Wycieczka</h5>
								<p class="card-text h6">600 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#316395; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Książki</h5>
								<p class="card-text h6">100 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#994499; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Oszczędności</h5>
								<p class="card-text h6">500 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#22AA99; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Na złotą jesień, czyli emeryturę</h5>
								<p class="card-text h6">400 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#AAAA11; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Spłata długów</h5>
								<p class="card-text h6">30 PLN</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4 col-lg-3 my-1 px-1">
						<div class="card text-center minCardHeight" style="background-color:#6633CC; color: white;">
							<div class="card-body">
								<h5 class="card-title h6">Darowizna</h5>
								<p class="card-text h6">50 PLN</p>
							</div>
						</div>
					</div>
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