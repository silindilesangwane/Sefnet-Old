<?php

	require_once("session.php");
	
	require_once("class.user.php");
	include "class.sef.php";
	$auth_user = new USER();	 
    $savedSefsObj = new SEF();
	
	
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
    	<h3 class="w3-center"><a href="saved_sefs.php">My Saved Sefs <i class="fa fa-download"></i></a></h3><br>
    	<?php
    		if($savedSefsObj->countIfAnySefSaved() > 0)
    		{
    			foreach($savedSefsObj->displaySavedSefs() as $savedSef) 
	    		{
	    		 	foreach ($savedSefsObj->displaySavedSefsTitle($savedSef['sef_id']) as $k) 
	    		 	{
	    		 		echo "<h4>".$k['sef_title']." <a href='sef.controller.php?unsave_sef_id_from_saved_list=".$savedSef['sef_id']."'><i style='color: red' class='fa fa-close'></i></a></h4>";
	    		 	}
	    		}
    		}
    		else
    		{
    			echo "<p class='alert alert-info' style='margin-left: 2%; padding: 1%; margin-right: 20%;'>You don't have saved Sefs, click 'save' on Sefs you would like to save ! </p><br>";
    		}
    		
    	?>
    </div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>