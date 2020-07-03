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
		$polaczenie = new mysqli($host , $db_user , $db_password , $db_name); #wywalenie warningów docelowo plik logów
		if ($polaczenie->connect_errno!=0){ #brak połącznia z bazą danych
			throw new Exception(mysqli_connect_errno());
		}
		else{
			
		}
	}
	catch(Exception $e){
		echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
		echo '<br/>Informacja deweloperska; '.$e;
	}		
	
?>
