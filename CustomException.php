<?php
	/**
		* Custom error handler
	*/
	
	require_once "xml_encode.php";
	
	function handleError($code, $description, $file = null, $line = null, $context = null) {
		$displayErrors = ini_get("display_errors");;
		$displayErrors = strtolower($displayErrors);
		if (error_reporting() === 0 || $displayErrors === "on") {
			return false;
		}
		list($error, $log) = mapErrorCode($code);
		$data = array('err'=>array(
		'timestamp' => date("Y-m-d H:i:s:u", time()),
		'level' => $log,
		'code' => $code,
		'type' => $error,
		'description' => $description,
		'file' => $file,
		'line' => $line,
		//'context' => $context,
		'path' => $file,
		'message' => $error . ' (' . $code . '): ' . $description . ' in [' . $file . ', line ' . $line . ']'
		));
		return fileLog(hhb_xml_encode($data));
	}
	
	/**
		* This method is used to write data in file
		* @param mixed $logData
		* @param string $fileName
		* @return boolean
	*/
	function fileLog($logData, $fileName = ERROR_LOG_FILE) {
		$fh = fopen($fileName, 'a+');
		if (is_array($logData)) {
			$logData = print_r($logData, 1);
		}
		$status = fwrite($fh, $logData . "\n");
		fclose($fh);
		//    $file = file_get_contents($filename);
		//    $content = '[' . $file .']';
		//    file_put_contents($content); 
		return ($status) ? true : false;
	}
	
	/**
		* Map an error code into an Error word, and log location.
		*
		* @param int $code Error code to map
		* @return array Array of error word, and log location.
	*/
	function mapErrorCode($code) {
		$error = $log = null;
		switch ($code) {
			case E_PARSE:
			case E_ERROR:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
			case E_USER_ERROR:
            $error = 'Fatal Error';
            $log = LOG_ERR;
            break;
			case E_WARNING:
			case E_USER_WARNING:
			case E_COMPILE_WARNING:
			case E_RECOVERABLE_ERROR:
            $error = 'Warning';
            $log = LOG_WARNING;
            break;
			case E_NOTICE:
			case E_USER_NOTICE:
            $error = 'Notice';
            $log = LOG_NOTICE;
            break;
			case E_STRICT:
            $error = 'Strict';
            $log = LOG_NOTICE;
            break;
			case E_DEPRECATED:
			case E_USER_DEPRECATED:
            $error = 'Deprecated';
            $log = LOG_NOTICE;
            break;
			default :
            break;
		}
		return array($error, $log);
	}
	
	//calling custom error handler
set_error_handler("handleError");