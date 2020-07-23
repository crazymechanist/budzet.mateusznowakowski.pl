<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');
	define('ERROR_LOG_FILE', 'logs/load_exp_app_errors.xml');
	
	include_once 'CustomException.php';
	
	header('Location: logowanie');
	
	session_start();
	
	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT); #pokazuje jedynie błędy, a nie ostrzeżenia
	
	try{
		$connection_SQL = new mysqli($host , $db_user , $db_password , $db_name);
		if ($connection_SQL->connect_errno!=0){ #brak połącznia z bazą danych
			throw new Exception(mysqli_connect_errno());
		}
		else{
			//czy taki email juz istnieje
			$result = $connection_SQL->query("SELECT * FROM expenses_category");
			
			if(!$result) throw new Exception($connection_SQL->error);
			
			$how_many_results = $result->num_rows;
			
			if($how_many_results==0){
				echo '<select class="custom-select" name="categoty_of_exp" id="type">';
				echo '<option disabled value="brak">BRAK</option>';
				echo '</select>';
			}
			else{
				echo '<select class="custom-select" name="categoty_of_exp" id="type">';
				for ($i = 1; $i <= $how_many_results; $i++){
					$row = mysqli_fetch_assoc($result);
					$id_cat = $row["id_expense_category"];
					$cat_name = $row["expense_category"];
					echo '<option value="'.$id_cat.'">'.$cat_name.'</option>';				
				}
				echo '</select>';
			}
			$result -> free_result();
			$connection_SQL->close();	
		}
	}
	catch(Exception $e){
		echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
		echo '<br/>Informacja deweloperska; '.$e->getCode();
		exit();			
	}
?>
