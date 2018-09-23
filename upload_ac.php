<?php

    require_once("session.php");
	
	require_once("class.user.php");
	
	$auth_user = new USER();

	$user_id = $_SESSION['user_session'];  

    //turn on php error reporting
	error_reporting(E_ALL);
	
	ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        	
        	$name     = $_FILES['file']['name'];
        	$tmpName  = $_FILES['file']['tmp_name'];
        	$error    = $_FILES['file']['error'];
        	$size     = $_FILES['file']['size'];
            $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));

          
        	switch ($error) {
        	    
        		case UPLOAD_ERR_OK:
        			$valid = true;
        			
        			//validate file extensions
        			
        			if ( !in_array($ext, array('jpg','jpeg','png')) ) {
        				$valid = false;
        				$response = 'Invalid file extension.';
        			}
        			//validate file size
        			if ( $size/1024/1024 > 2 ) {
        				$valid = false;
        				$response = 'File size is exceeding maximum allowed size.';
        			}
        			//upload file
        			if ($valid) {
        				$fileNewName = "profile".$user_id.".".$ext;
        					
        				$fileDestination = "images/profile/$fileNewName";
        
        				$stmt = $auth_user->runQuery("UPDATE profile_pic SET status = 0 where userid='$user_id'");
        
        				move_uploaded_file($tmpName,$fileDestination); 
        				
        				header( 'Location: home.php' );
        				
        				exit;
        			}
        			break;
        		case UPLOAD_ERR_INI_SIZE:
        			$response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
        			break;
        		case UPLOAD_ERR_PARTIAL:
        			$response = 'The uploaded file was only partially uploaded.';
        			break;
        		case UPLOAD_ERR_NO_FILE:
        			$response = 'No file was uploaded.';
        			break;
        		case UPLOAD_ERR_NO_TMP_DIR:
        			$response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
        			break;
        		case UPLOAD_ERR_CANT_WRITE:
        			$response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
        			break;
        		default:
        			$response = 'Unknown error';
        		break;
	    }

    	echo $response;
    }
?>