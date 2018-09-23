<?php
	require_once("session.php");
	include "class.sef.php";

	$sef = new SEF();
	
	if(isset($_POST['send_comment']))
	{
		$comment_content = $_POST['comment'];
		
		$sef_id = $_POST['sef_id'];
		
		if($sef->insertComments($sef_id, $comment_content)) //insertComments function in class SEF
		{
			header("Location: view_single_sef.php?sef_id=$sef_id");
		}
		
		else
		{
			$error_message = "An error occured while trying to insert such comment !";  
			
			header("Location: view_single_sef.php?error=1");
		}
				 
	}
?>