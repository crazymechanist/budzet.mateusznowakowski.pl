<?php
	
	function load_expenses($firstDate, $secondDate , $user_id) {
		error_reporting(E_ALL);
		ini_set('display_errors', 'off');
		define('ERROR_LOG_FILE', 'logs/load_expenses_app_errors.xml');
		
		include_once 'CustomException.php';
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT); #pokazuje jedynie błędy, a nie ostrzeżenia
		
		try{
			$connection_SQL = new mysqli($host , $db_user , $db_password , $db_name);
			if ($connection_SQL->connect_errno!=0){ #brak połącznia z bazą danych
				throw new Exception(mysqli_connect_errno());
			}
			else{
				//czy taki email juz istnieje
				$result = $connection_SQL->query(
				sprintf("SELECT excat.expense_category AS Kategoria , sum(ex.amount_of_money) AS Kwota FROM expenses AS ex
				INNER JOIN users_expenses AS uex
				ON ex.id_expense = uex.id_expense
				INNER JOIN expenses_category AS excat
				ON ex.id_expense_category = excat.id_expense_category
				WHERE uex.id_user='%s'
				AND ex.expense_date >= '%s' AND ex.expense_date <= '%s'
				GROUP BY excat.expense_category",
				mysqli_real_escape_string($connection_SQL,$user_id),
				mysqli_real_escape_string($connection_SQL,$firstDate),
				mysqli_real_escape_string($connection_SQL,$secondDate),
				));
				
				if(!$result) throw new Exception($connection_SQL->error);
				
				$expenses = [];
				
				/* fetch associative array */
				while ($row = mysqli_fetch_assoc($result)) {
					$a = $row["Kategoria"];
					$b = $row["Kwota"];
					$expenses += [ "$a" => $b];
				}
							
				$_SESSION['chart_contents'] = $expenses;
				
				$result -> free_result();
				$connection_SQL->close();	
			}
			
		}
		catch(Exception $e){
			echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
			echo '<br/>Informacja deweloperska; '.$e->getCode();
			exit();			
		}
	}
?>
