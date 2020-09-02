<?php
	session_start();
	
	
	
	if(isset($_POST['user_initial_date'])){
		
		$everything_all_right=TRUE;
		
		$date_form1 = $_POST['user_initial_date'];
		$date1 = date("Y-m-d", strtotime($date_form1));
		
		if ($date_form1 <> $date1) {
			$everything_all_right=FALSE;
		}
		
		$date_form2 = $_POST['user_final_date'];
		$date2 = date("Y-m-d", strtotime($date_form2));
		
		if ($date_form2 <> $date2) {
			$everything_all_right=FALSE;
		}
		
		if ($date2 < $date1) {
			$everything_all_right=FALSE;
		}
		
		if($everything_all_right==1){
			$_SESSION['user_initial_date'] = strtotime($date1);
			$_SESSION['user_final_date'] = strtotime($date2);
			
			$_SESSION['initial_date'] = $_SESSION['user_initial_date'];
			$_SESSION['final_date'] = $_SESSION['user_final_date'];
			$_SESSION['time_period'] = 'Inny okres';
		}	
	}		
	
	
	header('Location: bilans');
