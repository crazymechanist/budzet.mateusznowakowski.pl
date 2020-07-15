<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');
	define('ERROR_LOG_FILE', 'logs/log_in_app_errors.xml');
	
	include_once 'CustomException.php';
	
	session_start();
	
	if((!isset($_POST['email']))||(!isset($_POST['pass']))){
		header('Location: logowanie');
		exit(); #jeżeli nie ma danych z formularza -> powrót na stonę logowania
	}
	
	require_once "connect.php"; #dołaczenie danych do logaowania w bazie sql
	
	try{
		$connection_SQL = new mysqli($host , $db_user , $db_password , $db_name); #wywalenie warningów docelowo plik logów
		
		if ($connection_SQL->connect_errno!=0){ #brak połącznia z bazą danych
			throw new Exception(mysqli_connect_errno());
		}
		else{
			$email = $_POST['email'];
			$pass = $_POST['pass']; #dane z formularza
			
			$email = htmlentities($email,ENT_QUOTES,"UTF-8"); #dodajemy encje
			
			$result = $connection_SQL->query(
			sprintf("SELECT * FROM users WHERE email='%s'",
			mysqli_real_escape_string($connection_SQL,$email)));
			
			if(!$result) throw new Exception($connection_SQL->error);
			
			$how_many_results = $result -> num_rows;
			
			if($how_many_results > 0){
				$row = $result->fetch_assoc(); #tworzymy tablicę asocjasyjną
				
				if(password_verify($pass, $row['password'])){
					unset($_SESSION['blad']); #dla pewności czyścimy błąd logowania
					$_SESSION['isLoggedIn'] = true;
					$result->free(); #zwalniamy miejsce w rezultacie zapytania
					header('Location: bilans'); #przekierowanie do strony display.php
				}
				else{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
			}
			else{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
			} 
		}
	}
	catch(Exception $e){
		echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
		echo '<br/>Informacja deweloperska; '.$e;
	}		
	
	$connection_SQL->close(); #koniec połącznia z sql
?>
