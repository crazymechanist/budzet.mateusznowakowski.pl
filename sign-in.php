<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');
	define('ERROR_LOG_FILE', 'logs/log_in_app_errors.xml');
	
	include_once 'CustomException.php';
	
	session_start();
	
	if(isset($_POST['email'])){
		#udana walidacia? Załóżmy, że tak
		$everything_all_right=TRUE;
		
		#sprawdź poprawność adresu email
		$email = $_POST['email'];
		$email_saf = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($email_saf, FILTER_VALIDATE_EMAIL)==FALSE) || ($email!=$email_saf)){
			$everything_all_right=FALSE;
			$_SESSION['e_email']='<span style="color:red">Podaj poprawny adres email</span>';
		}
		
		#przypisanie zmiennych sesyjnych
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$pass = $_POST['pass'];
		$repeat_pass = $_POST['repeat_pass'];
		
		#dlugosc hasla
		if( (strlen($pass)<8) || (strlen($pass)>20) ){
			$everything_all_right=FALSE;
			$_SESSION['e_email']='<span style="color:red">Hasło musi posiadać od 8 do 20 znaków</span>';
		}
		
		#idenycznosc hasla
		if($pass <> $repeat_pass){
			$everything_all_right=FALSE;
			$_SESSION['e_pass']='<span style="color:red">Podane hasła nie są identyczne</span>';
		}
		
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
		
		//Zapamiętaj wprowadzone dane do formularza
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_name'] = $name;
		$_SESSION['fr_surname'] = $surname;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT); #pokazuje jedynie błędy, a nie ostrzeżenia
		
		try{
			$connection_SQL = new mysqli($host , $db_user , $db_password , $db_name);
			if ($connection_SQL->connect_errno!=0){ #brak połącznia z bazą danych
				throw new Exception(mysqli_connect_errno());
			}
			else{
				//czy taki email juz istnieje
				$result = $connection_SQL->query("SELECT id_user FROM users WHERE email ='$email'");
				
				if(!$result) throw new Exception($connection_SQL->error);
				
				$how_many_mails = $result->num_rows;
				
				if($how_many_mails>0){
					$everything_all_right=FALSE;
					$_SESSION['e_pass']='<span style="color:red">Istnieje juz konto przypisane do takiego adresu e-mail</span>';
				}
				
				if(!$result) throw new Exception($connection_SQL->error);
				
				$ile_takich_nickow = $result->num_rows;
				
				#hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
				if($everything_all_right==TRUE){
					if($connection_SQL->query("INSERT INTO users VALUES(NULL, '$email', '$name', '$surname', '$pass_hash')")){
						$_SESSION['register_suceess']=TRUE;
						unset($_SESSION['fr_email']);
						unset($_SESSION['fr_name']);
						unset($_SESSION['fr_surname']);
						header('Location: dziekujemy_za_rejestracje');
					}
					else{
						throw new Exception($connection_SQL->error);
					}
				}
				else{
					echo $_SESSION['e_pass'];				
					header('Location: rejestracja');
				}
			}
			$connection_SQL->close();	
		}
		catch(Exception $e){
			echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
			echo '<br/>Informacja deweloperska; '.$e;
			exit();			
		}		
	}	
?>
