<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link href="css/w3.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="../jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Home - <?php print($userRow['user_email']); ?></title>
</head>
<style type="text/css">
	body
	{
		background-color: #071920 !important;
	}
	.sefs_style
	{
		border: 1px solid #DA6501;
	}
</style>
<body>
 <?php
	    include "header.php";
	  ?>
<div class="container-fluid" style="margin-top:0px;">	
    <div class="container" style="background-color: white;"><br>
    	<h3><a href="saved_sefs.php">Saved Sefs <i class="fa fa-download"></i></a></h3>
    </div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>