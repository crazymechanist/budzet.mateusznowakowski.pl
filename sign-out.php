<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');
	define('ERROR_LOG_FILE', 'logs/log_out_app_errors.xml');
	
	include_once 'CustomException.php';
	
	session_start();
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sign_out'])){
		unset($_SESSION['isLoggedIn']);
	}
	
	
	header('Location: index.php');
	
?>
