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
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Home - <?php print($userRow['user_email']); ?></title>
</head>

<body>

  <?php
    include "navbar.php";
  ?>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	
        <hr />
        <?php

          echo "Interest id ".$_GET['interest_id'];
        ?>
        <h2 style="padding: 40% 0% 0% 90%;">
           <?php 
                if($userRow['role'] == "w")
                {
                  echo "<div class='btn bt-md btn-success'><a href='writesef.php?interest_id=5'>Write Sef <i class='glyphicon glyphicon-plus'></i></a></div>";
                }
             ?>
      </h2>
    blah blah
    
    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>