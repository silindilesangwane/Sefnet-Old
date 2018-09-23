<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM user_interests WHERE user_id = '$user_id'");

	$stmt->execute();

	$myInterests = array();
	if($stmt->rowCount() > 0)
	{
		$counter = 0;
		$end = count($myInterests);
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			$myInterests[$counter] = $row['interest_id'];
			$counter++;
		}
		
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pick Interests</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<style type="text/css">
	body{
        background-color: #071920 !important;
        color: #d9d9d9;
        padding: 2em;
    }
    .heading-style{
        letter-spacing: 2px;
        font-size: 4.5vw;
        color: #027794;
      	font-family: "Balkeno";
      	margin-top: -20px;
      	margin-bottom: -10px;
      	text-transform: uppercase;
    }
    .back{
        color: #ff9900;
        font-size: 20px;
        font-family: "Segoe UI Semibold";
        margin-left: 0.5em;
        margin-top: 1em;
    }
    .back:hover{
        text-decoration: none;
        color: #ff9900;
        font-size: 25px;
        transition: .5s;
        z-index: 1;
    }
    .list-group{
    	width: 80%;
    	text-align: center;
    	transform: translateX(-50%);
		left: 50%;
		position: absolute;
		font-size: 20px;
		font-weight: bold;
    }
    .list-group-item:hover{
    	background-color: #027794 !important;
    	color: white !important;
    	font-weight: bolder;
    	width: 100% !important;
    	margin-left: 5%;
    }
</style>
</head>

<body>
	<a href="home.php" class="back"><i class="fas fa-angle-left"></i>Back</a>
	<h1 class="text-center heading-style">My Interests</h1>
	<hr>
  <?php if(count($myInterests) == 0) {?><h1>Welcome new user ! </h1>
  <p>Please choose your interest...</p> <?php } ?>
<div class="clearfix"></div>
<h3 class="w3-center">To write a Sef click on an Interest</h3>
<div class="container-fluid" style="">
    <div class="container">
	    <div class="list-group">
		    <?php
				$sql = $auth_user->runQuery("SELECT * FROM interest ");
				$sql->execute();
				while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
				{
					if(in_array($row['id'], $myInterests))
					{
						?>
				    		<a href="writesef.php?interest_id=<?php echo $row['id'];?>" class="list-group-item"><?php echo $row['interest_name']; ?></a>
				  		<?php
					}
				
				}

		   	?>
		</div>
	</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>