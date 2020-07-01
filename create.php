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
							<g style="stroke:#000000; stroke-width:0.708661; stroke-linejoin:round; stroke-linecap:round; fill:none">
								<g class="pig_leg">
									<path 
									d="M 112.189 748.675C 91.7073 734.001 82.2633 725.472 74.7979 718.157C 67.3325 710.842 61.8456 704.74 56.808 698.391C 51.7703 692.042 47.1818 685.446 45.8185 684.581C 44.4552 683.716 46.317 688.581 51.0213 699.578C 55.7255 710.575 63.2721 727.705 70.6709 738.199C 78.0696 748.694 85.3205 752.553 92.2665 756.094C 99.2124 759.636 105.853 762.86 108.908 760.684C 111.962 758.508 111.43 750.932 112.189 748.675"/>
								</g>
								<g class="pig_body">
									<path d="M 362.492 748.675C 366.887 756.555 364.238 767.04 368.901 772.814C 373.564 778.587 385.54 779.651 394.542 773.802C 403.543 767.954 409.571 755.194 413.007 746.797C 416.443 738.4 417.287 734.367 418.882 727.258C 420.477 720.148 422.822 709.961 425.558 700.628C 428.293 691.294 431.419 682.814 436.4 663.814C 441.381 644.814 448.217 615.295 450.703 591.029C 453.189 566.763 451.326 547.75 452.74 536.438C 454.153 525.126 458.842 521.514 462.132 516.739C 465.422 511.964 467.313 506.025 469.621 500.404C 471.93 494.782 474.657 489.478 477.05 483.424C 479.442 477.37 481.501 470.565 482.75 465.046C 483.999 459.527 484.438 455.294 485.224 450.313C 486.011 445.332 487.144 439.604 487.252 434.787C 487.361 429.971 486.444 426.066 485.614 420.388C 484.784 414.709 484.042 407.258 482.012 401.886C 479.982 396.513 476.664 393.22 472.703 389.121C 468.742 385.022 464.137 380.117 460.339 377.868C 456.54 375.619 453.548 376.025 448.323 374.984C 443.098 373.944 435.642 371.456 428.562 372.56C 421.483 373.664 414.78 378.359 408.892 379.974C 403.003 381.59 397.927 380.127 393.105 381.506C 388.284 382.884 383.716 387.105 377.4 385.549C 371.085 383.993 363.023 376.66 352.406 368.676C 341.79 360.692 328.619 352.058 307.82 339.338C 287.02 326.618 258.593 309.812 215.123 316.238C 171.654 322.664 113.142 352.322 79.9525 378.436C 46.7631 404.551 38.8961 427.121 34.2929 440.328C 29.6897 453.534 28.3504 457.377 26.1583 462.698C 23.9662 468.02 20.9213 474.82 16.4195 487.243C 11.9176 499.666 5.9588 517.713 4.01078 538.8C 2.06276 559.887 4.12551 584.016 7.62211 601.536C 11.1187 619.057 16.0492 629.97 21.2204 641.416C 26.3915 652.861 31.8035 664.84 38.4609 675.946C 45.1183 687.052 53.0212 697.285 62.162 707.26C 71.3028 717.236 81.6815 726.953 92.6292 735.427C 103.577 743.901 115.094 751.132 122.446 755.749C 129.799 760.366 132.987 762.368 136.196 765.101C 139.405 767.835 142.634 771.3 149.921 777.872C 157.209 784.444 168.554 794.123 174.81 803.716C 181.067 813.308 182.236 822.815 189.894 827.374C 197.552 831.933 211.699 831.545 222.619 831.86C 233.539 832.175 241.231 833.192 246.166 831.622C 251.102 830.052 253.281 825.895 254.654 823.275C 256.027 820.656 256.593 819.575 257.474 818.165C 258.354 816.754 259.549 815.014 259.871 812.459C 260.194 809.904 259.646 806.533 259.443 803.283C 259.241 800.033 259.385 796.903 260.661 793.833C 261.937 790.763 264.344 787.753 267.527 784.958C 270.709 782.163 274.666 779.582 277.826 778.002C 280.986 776.422 283.35 775.842 286.052 775.18C 288.753 774.518 291.793 773.773 294.133 772.306C 296.472 770.839 298.111 768.651 304.082 766.785C 310.052 764.918 320.354 763.373 326.795 758.728"/>
									<path d="M 362.492 748.675C 351.831 752.899 346.863 754.215 343.241 754.982C 339.618 755.749 345.207 754.653 341.843 755.256C 338.479 755.859 335.064 756.187 326.795 758.728"/>
								</g>
								<g class="pig_nose">
									<path 
									d="M 326.795 758.728C 317.724 761.516 309.447 758.07 300.96 749.782C 292.473 741.494 283.777 728.365 283.669 715.373C 283.56 702.38 292.038 689.525 313.383 675.548C 334.727 661.57 368.938 646.469 388.568 645.662C 408.198 644.855 413.247 658.342 416.546 666.443C 419.844 674.545 421.392 677.262 420.305 683.308C 419.217 689.354 415.494 698.731 412.002 707.85C 408.51 716.97 405.249 725.833 394.854 733.666C 384.458 741.498 366.928 748.3 354.94 751.861C 342.951 755.423 336.504 755.744 326.795 758.728"/>
								</g>
								<g class="pig_detail">
									<path  
									d="M 362.492 748.675C 351.831 752.899 346.863 754.215 343.241 754.982C 339.618 755.749 345.207 754.653 341.843 755.256C 338.479 755.859 335.064 756.187 326.795 758.728"/>
								</g>
								<g class="pig_ear">
									<path 
									d="M 122.388 628.595C 97.7105 613.411 89.0521 608.395 82.2384 601.68C 75.4246 594.965 70.4556 586.551 67.1699 576.905C 63.8843 567.259 62.282 556.381 63.9532 545.788C 65.6245 535.195 70.5693 524.888 75.8402 515.731C 81.1112 506.573 86.7082 498.566 94.7514 490.703C 102.795 482.841 113.284 475.122 125.145 470.225C 137.006 465.329 150.238 463.255 166.834 466.019C 183.429 468.784 203.388 476.387 215.259 488.589C 227.13 500.791 230.912 517.59 247.277 514.634"/>
								</g>
								<g class="pig_detail">
									<path 
									d="M 184.595 345.144C 182.542 344.704 180.844 344.403 179.069 344.203C 177.294 344.003 175.442 343.905 172.212 344.311C 168.982 344.716 164.372 345.626 166.237 347.34C 168.101 349.054 176.439 351.573 181.064 354.253C 185.688 356.932 186.601 359.773 189.764 362.904C 192.926 366.035 198.34 369.458 201.802 372.463C 205.265 375.469 206.777 378.058 210.6 382.13C 214.423 386.201 220.556 391.756 224.777 395.606C 228.998 399.457 231.306 401.603 234.181 404.981C 237.056 408.359 240.498 412.969 245.345 415.912C 250.192 418.855 256.443 420.133 260.188 418.095C 263.933 416.058 265.172 410.706 264.513 405.898C 263.854 401.09 261.296 396.826 257.575 391.645C 253.855 386.463 248.971 380.364 245.075 376.57C 241.179 372.776 238.272 371.286 234.103 367.984C 229.935 364.682 224.506 359.567 219.146 356.167C 213.786 352.768 208.494 351.084 204.096 349.861C 199.698 348.639 196.192 347.878 193.143 347.16C 190.094 346.442 187.501 345.766 184.595 345.144"/>
								</g>
								<g class="pig_detail">
									<path 
									d="M 293.249 605.41C 293.249 597.508 286.835 591.094 278.933 591.094C 271.031 591.094 264.616 597.508 264.616 605.41C 264.616 613.312 271.031 619.726 278.933 619.726C 286.835 619.726 293.249 613.312 293.249 605.41z"/>
								</g>
								<g class="pig_detail">
									<path 
									d="M 392.374 573.417C 392.374 566.116 386.448 560.19 379.147 560.19C 371.847 560.19 365.921 566.116 365.921 573.417C 365.921 580.718 371.847 586.644 379.147 586.644C 386.448 586.644 392.374 580.718 392.374 573.417z"/>
								</g>
								<g class="pig_detail">
									<path 
									d="M 334.596 700.049C 327.148 700.049 321.103 709.785 321.103 721.779C 321.103 733.773 327.148 743.509 334.596 743.509C 342.044 743.509 348.09 733.773 348.09 721.779C 348.09 709.785 342.044 700.049 334.596 700.049"/>
								</g>
								<g class="pig_detail">
									<path 
									d="M 383.198 682.706C 376.827 682.706 371.655 691.246 371.655 701.766C 371.655 712.286 376.827 720.826 383.198 720.826C 389.57 720.826 394.742 712.286 394.742 701.766C 394.742 691.246 389.57 682.706 383.198 682.706"/>
								</g>
							</g>
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
		  <a class="nav-item nav-link active col-6"><span class="d-none d-sm-inline-flex"> Dodaj przepływ pieniężny</span><i class="demo-icon icon-plus"></i></a>
		  <a class="nav-item nav-link col-6" href="display.html"><span class="d-none d-sm-inline-flex"> Przeglądaj przepływy </span> <i class="icon-eye"></i></a>
		</nav>
	</div>
</header>
	
<main>
<div class="container text-center form_window">
	<div class="accordion row" id="accordionExample">

		<div class="card p-0 mx-auto col-md-8">
				<div class="card-header p-0" id="headingOne">
				<h2 class="mb-0">
				<button class="btn btn-primary p-0 m-0 collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="height:3rem; width:100%;">
				Dodaj wydatek
				</button>
				</h2>
			</div>

			<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<form action="add_expense.php" method="post">
						<div class="form-group">
							<div class="row py-1">
								<div class="col text-center">
									<label for="zlote2" class="d-inline-flex p-2">Kwota:</label>
									<input type="number" class="form-control d-inline-flex" id="zlote2" style="width:30%" placeholder="złoty" min="0">
									<div class="d-inline-flex p-2">,</div>
									<input type="number" class="form-control d-inline-flex" id="grosze2" style="width:30%" placeholder="groszy" min="0" max="99">
								</div>
							</div>
							<div class="row py-1 justify-content-center">
								<div class="col text-center">
									<label for="dateOfExp" class="d-inline-flex p-2" > Data: </label>
									<input class="form-control d-inline-flex" style="width:50%" type="date" id="dateOfExp">
								</div>
							</div>
							<div class="py-2">
								<div class="row py-1 justify-content-center">Sposób płatności: </div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="custom-control custom-radio">
											<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
											<label class="custom-control-label" for="credit">Karta kredytowa</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="col custom-control custom-radio">
											<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
											<label class="custom-control-label" for="debit">Karta debetowa</label>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="col custom-control custom-radio">
											<input id="cash" name="paymentMethod" type="radio" class="custom-control-input" required>
											<label class="custom-control-label" for="cash">Gotówka</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center py-1"><label for="type" class="col-12">Kategoria:</label>
							<div>
							<label class="col-12">
							<select class="custom-select" id="type"> 
							<option value="j">Jedzenie</option>
							<option value="m">Mieszkanie</option>
							<option value="tr">Transport</option>
							<option value="tel">Telekomunikacja</option>
							<option value="zdr">Opieka zdrowotna</option>
							<option value="u">Ubranie</option>
							<option value="u">Higiena</option>
							<option value="u">Dzieci</option>
							<option value="u">Rozrywka</option>
							<option value="u">Wycieczka</option>
							<option value="u">Książki</option>
							<option value="u">Oszczędności</option>
							<option value="u">Na złotą jesień, czyli emeryturę</option>
							<option value="u">Spłata długów</option>
							<option value="u">Darowizna</option>
							<option value="u">Inne wydatki</option>
							</select>
							</label>
							</div>
							</div>

							<div class="row justify-content-center py-1">
							<div class="col-12"><label for="coment">Komentarz:</label></div>
							<label class="col-12"><textarea id="coment" class="form-control" rows="3" style="resize:none"></textarea></label>
							</div>
							<input class="btn btn-secondary col-8 py-4" type="submit" value="Dodaj">						
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card p-0 mx-auto col-md-8">
			<div class="card-header p-0" id="headingTwo">
				<h2 class="m-0 p-0">
				<button class="btn btn-primary p-0 m-0 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="height:3rem; width:100%;">
				Dodaj przychod
				</button>
			</h2>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					<form action="add_income.php" method="post">
						<div class="form-group">
							<div class="row py-1">
								<div class="col text-center">
									<label for="zlote" class="d-inline-flex p-2">Kwota:</label>
									<input type="number" class="form-control d-inline-flex" id="zlote" style="width:30%" placeholder="złoty" min="0">
									<div class="d-inline-flex p-2">,</div>
									<input type="number" class="form-control d-inline-flex" id="grosze" style="width:30%" placeholder="groszy" min="0" max="99">
								</div>
							</div>
							<div class="row py-1 justify-content-center">
								<div class="col text-center">
									<label for="dateOfExp" class="d-inline-flex p-2" > Data: </label>
									<input class="form-control d-inline-flex" style="width:50%" type="date" id="dateOfExp2">
								</div>
							</div>
							<div class="row justify-content-center py-1"><label for="type" class="col-12">Kategoria:</label>
							<div>
							<label class="col-12">
							<select class="custom-select" id="type2"> 
								<option value="w">Wynagrodzenie</option>
								<option value="o">Odsetki bankowe</option>
								<option value="s">Sprzedaż na allegro</option>
								<option value="i">Inne</option>
							</select>
							</label>
							</div>
							</div>

							<div class="row justify-content-center py-1">
							<div class="col-12"><label for="coment2">Komentarz:</label></div>
							<label class="col-12"><textarea id="coment2" class="form-control" style="resize:none;" rows="3"></textarea></label>
							</div>
							<input class="btn btn-secondary col-8 py-4" type="submit" value="Dodaj">						
						</div>
					</form>
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