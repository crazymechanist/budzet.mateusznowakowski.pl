<?php
	
	/* 	error_reporting(E_ALL);
		ini_set('display_errors', 'off');
		define('ERROR_LOG_FILE', 'logs/add_inc_app_errors.xml');
		
	include_once 'CustomException.php'; */
	
	session_start();
	
	if(!isset($_POST['categoty_of_inc'])){
		header('Location: dodawanie-wydatku-lub-dochodu');
		exit(); #jeżeli nie ma danych z formularza -> powrót na stonę logowania
	}
	
	require_once "connect.php"; #dołaczenie danych do logaowania w bazie sql
	
	try{
		$connection_SQL = new mysqli($host , $db_user , $db_password , $db_name); #wywalenie warningów docelowo plik logów
		
		$everything_all_right=TRUE;
		
		if ($connection_SQL->connect_errno!=0){ #brak połącznia z bazą danych
			throw new Exception(mysqli_connect_errno());
		}
		else{
			if(isset($_POST['categoty_of_inc'])){
				$zlote = $_POST['income_amount_zl'];
				$grosze = $_POST['income_amount_gr'];
				$date_form = $_POST['date_of_inc'];
				$date = date("Y-m-d", strtotime($date_form));
				$category = $_POST['categoty_of_inc'];
				$comment = $_POST['comment2'];
				#dane z formularza
				
				#validation ZLOTE
				if($zlote%1 <> 0 OR $zlote<0){
					$_SESSION['exp_blad'] = '<div style="color:red">Niepoprawna kwota!</div>';
					$everything_all_right=FALSE;
				}
				
				#validation GROSZE
				if($grosze%1 <> 0 OR $grosze<0 OR $grosze>99){
					$_SESSION['exp_blad'] = '<div style="color:red">Niepoprawna kwota!</div>';
					$everything_all_right=FALSE;
				}
				
				#validation DATE
				if ($date_form <> $date) {
					$_SESSION['exp_blad'] = '<div style="color:red">Niepoprawna data!</div>';
					$everything_all_right=FALSE;
				}
				
				#look in db for category
				$result = $connection_SQL->query(
				sprintf("SELECT * FROM expenses_category WHERE id_expense_category='%s'",
				mysqli_real_escape_string($connection_SQL,$category)));
				
				if(!$result) throw new Exception($connection_SQL->error);
				$how_many_results = $result -> num_rows;
				$result -> free();
				
				#check is category existing
				if ($how_many_results==0) {
					$_SESSION['exp_blad'] = '<div style="color:red">Niepoprawna kategoria!</div>';
					$everything_all_right=FALSE;
				}
				
				#adding entities
				$comment = htmlentities($comment,ENT_QUOTES,"UTF-8"); #dodajemy encje
				
				#sum amount
				$amount = $zlote + $grosze/100;
				
				#something gone wrong
				if($everything_all_right==FALSE){		
					header('Location: dodawanie-wydatku-lub-dochodu'); 
				}
				else{
				 	$result = $connection_SQL->query('SELECT MAX(id_income) FROM incomes');
					if(!$result) throw new Exception($connection_SQL->error);
					$row = $result->fetch_assoc(); #tworzymy tablicę asocjasyjną
					$result->free(); #zwalniamy miejsce w rezultacie zapytania
					$last_id = $row['MAX(id_income)'];
					
					if(!$connection_SQL->query("INSERT INTO incomes VALUES ($last_id+1, ".'"'.$date.'"'." , $category , $amount , ".'"'.$comment.'"'.")")) throw new Exception($connection_SQL->error);
					
					$user_id = $_SESSION['user_id'];
					
					if(!$connection_SQL->query("INSERT INTO users_incomes VALUES ($user_id ,$last_id+1 , 1 )")) throw new Exception($connection_SQL->error);
					
					$_SESSION['inc_succ']=TRUE;
					header('Location: dodawanie-wydatku-lub-dochodu'); 					
				}
			}
		}
	}
	catch(Exception $e){
		echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
		echo '<br/>Informacja deweloperska; '.$e->getMessage();
	}		
	
	$connection_SQL->close(); #koniec połącznia z sql
?>
