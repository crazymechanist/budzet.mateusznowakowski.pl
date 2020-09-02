<?php
	require_once "load_expenses.php";
	session_start();
	
	#redirect to index
	if(!isset($_SESSION['isLoggedIn'])){
		header('Location: index.php');
		exit();
	}
	
	$first_day_of_month = strtotime("first day of this month");
	$last_day_of_month = strtotime("last day of this month");
	
	#assign time period variable if not exist
	if(!isset($_SESSION['time_period'])){
		$_SESSION['time_period'] = 'Bieżący miesiąc';
		$_SESSION['initial_date'] = $first_day_of_month;
		$_SESSION['final_date'] = $last_day_of_month;
	} 
	
	if(!isset($_SESSION['user_initial_date'])){
		$_SESSION['user_initial_date'] = $first_day_of_month;
		$_SESSION['user_final_date'] = $last_day_of_month ;	
	}
	
	#clic on left arrow
	if (isset($_POST['left']) ) {
		if($_SESSION['time_period'] == 'Bieżący miesiąc'){
			$_SESSION['time_period'] = 'Zeszły miesiąc';
			$_SESSION['initial_date'] = strtotime("first day of last month");
			$_SESSION['final_date'] = strtotime("last day of last month");
		}
		elseif ($_SESSION['time_period'] == 'Zeszły miesiąc'){
			$_SESSION['time_period']= 'Inny okres';
			$_SESSION['initial_date'] = $_SESSION['user_initial_date'];
			$_SESSION['final_date'] = $_SESSION['user_final_date'];
		} 
		else{
			$_SESSION['time_period'] = 'Bieżący miesiąc';
			$_SESSION['initial_date'] = strtotime("first day of this month");
			$_SESSION['final_date'] = strtotime("last day of this month");			
		}
	}
	
	#clic on right arrow
	if (isset($_POST['right']) ) {
		if($_SESSION['time_period'] == 'Bieżący miesiąc'){
			$_SESSION['time_period']= 'Inny okres';
			$_SESSION['initial_date'] = $_SESSION['user_initial_date'];
			$_SESSION['final_date'] = $_SESSION['user_final_date'];
		}
		elseif ($_SESSION['time_period'] == 'Inny okres'){
			$_SESSION['time_period']= 'Zeszły miesiąc';
			$_SESSION['initial_date'] = strtotime("first day of last month");
			$_SESSION['final_date'] = strtotime("last day of last month");;
		}
		else{
			$_SESSION['time_period'] = 'Bieżący miesiąc';
			$_SESSION['initial_date'] = strtotime("first day of this month");
			$_SESSION['final_date'] = strtotime("last day of this month");
		}
	}
	
	$f_date=date("Y-m-d", $_SESSION['initial_date']);
	$s_date=date("Y-m-d", $_SESSION['final_date']); 
	load_expenses($f_date , $s_date , $_SESSION['user_id']);
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
		<link rel="stylesheet" href="css/fontello.css">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			
			function drawChart() {
				
				
				
				var data = google.visualization.arrayToDataTable([
				<?php
					
					$expenses = $_SESSION['chart_contents'];
					
					if(empty($expenses)){
						$expenses = [ "Brak wydatków" => 100];
					}
					
					echo '[\'Wydatek\', \'Kwota\'],';
					#echo nl2br("\r\n");
					
					foreach ($expenses as $expense_name => $expense) {
						echo '[\''.$expense_name.'\' , '.$expense.'] ,';
						#echo nl2br("\r\n");
					}
				?>
				]);
				
				var chartwidth = $('#chartparent').width();
				
				var options = {
					legend: 'none',
					chartArea:{left:"5%",top:10,width:"90%",height:"90%"},
					pieSliceText: 'label',
					slices: {
						<?php
							$colors = array(
							"#3366CC" , "#dc3912" , "#FF9900" , "#109618" , "#990099" ,
							"#0099C6" , "#DD4477" , "#66AA00" , "#B82E2E" , "#316395" , 
							"#994499" , "#22AA99" , "#AAAA11" , "#6633CC");
							$_SESSION['chart_colors'] = $colors;
							$i = 0;
							foreach ($colors as $color) {
								echo $i.': { color: \''.$color.'\' }, ';
								$i++;
							}
						?>
						
					},
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
									<form action="sign-out.php" method="POST">
										<button type="submit" class="btn btn-link" name="sign_out" style="color:white;"> <span class="d-none d-sm-inline-flex">Wyloguj</span> <i class="demo-icon icon-logout"></i> </button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
			
			<div class="container mt-2">
				<nav class="nav nav-tabs nav-fill row">
					<a class="nav-item nav-link col-6" href="dodawanie-wydatku-lub-dochodu"><span class="d-none d-sm-inline-flex"> Dodaj przepływ pieniężny</span><i class="demo-icon icon-plus"></i></a>
					<a class="nav-item nav-link active col-6" ><span class="d-none d-sm-inline-flex"> Przeglądaj przepływy </span> <i class="icon-eye"></i></a>
				</nav>
			</div>
		</header>
		
		<main>
			<div class="container">
				<div class="row justify-content-end m-0">
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
								<form action="change_date.php" method="post">
									<div class="modal-body">
										<div>
											<label for="initial_date" class="d-inline-flex p-2" > Data początkowa: </label>
											<input class="form-control d-inline-flex" style="width:50%" type="date" name="user_initial_date" id="initial_date">
										</div>
										<div>
											<label for="final_date" class="d-inline-flex p-2" > Data końcowa: </label>
											<input class="form-control d-inline-flex" style="width:50%" type="date" name="user_final_date" id="final_date">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
										<button type="submit" class="btn btn-primary">Zapisz</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row m-0">
					<div style="display: flex; align-items: center; width: 48px;">
						<form action="" method="post">
							<button class="btn btn-outline-secondary" name="left" type="submit"> <i class="icon-left-open-outline"></i></button>
						</form>
					</div>
					<div class="col text-center p-0">
						<div>
							<h2 class="h4"><?php 
								$f_date=date("Y-m-d", $_SESSION['initial_date']);
								$s_date=date("Y-m-d", $_SESSION['final_date']); 
							echo $_SESSION['time_period'].' '.$f_date.' do '.$s_date;?> 
							</h2>
						</div>
						<div style="position: relative; width: 100%; padding-top: 70%; margin-top: 10%">
							<div  id="piechart" style="position:  absolute; top: 0; left: 0; bottom: 0; right: 0; text-align: center;">
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; width: 48px;">
						<form action="" method="post">
							<button class="btn btn-outline-secondary" name="right" type="submit"> <i class="icon-right-open-outline"></i> </button>
						</form>
					</div>
				</div>
				
				
				<div class="row">
					<?php
						$expenses = $_SESSION['chart_contents'];
						$colors = $_SESSION['chart_colors'];
						$i=0;
						
						foreach ($expenses as $expense_name => $expense) {
							echo '<div class="col-6 col-md-4 col-lg-3 my-1 px-1">';
							echo '<div class="card text-center minCardHeight" style="background-color:'.$colors[$i].'; color: white">';
							echo '<div class="card-body">';
							echo '<h5 class="card-title h6">'.$expense_name.'</h5>';
						echo '<p class="card-text h6">'.$expense.'PLN</p>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						$i++;
					}
				?>
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