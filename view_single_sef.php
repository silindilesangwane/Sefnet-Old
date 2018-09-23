<?php

	require_once("session.php");
	
	require_once("class.user.php");
	include "class.sef.php";
 	require_once('dbconfig.php');
 	$auth_user = new USER();
 	$user_id = $_SESSION['user_session'];	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


 	$sef_id = 0;
 	if(isset($_GET['sef_id']))
 	{
 		$sef_id = $_GET['sef_id'];
 	}
 	else
 	{
 		header("Location: home.php");
 	}

	$sf = new SEF();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
<link href="css/w3.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Home - <?php print($userRow['user_email']); ?></title>
<style type="text/css">
	
	.wells{
		min-height: 20px;
  		margin-bottom: 20%;
	}
	.footer{
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		background-color: #0d2f3d;
		color: white;
	}
	textarea{
		border: none;
		margin-top: 0;
		margin-left: 0px;
		padding: .5em;
		background-color: #0d2f3d;
		border-bottom: 1px solid #ff9941 !important;
		min-width: 100%;
		max-height: 40px;
		max-width: 100%;
		color:#ff9941;
	}
	textarea:focus{
		padding: .5em;
		background-color: #103e51;
		min-height: 70px;
		max-height: 100px;
		border-top: 2px solid #ff9900 !important;
		border-bottom: 2px solid #ff9900 !important;
		transition: .5s;
	}
	#submit_comment{
		margin: .3em;
		float: right;
		background-color: #435168;
		border: none;
		text-transform: uppercase;
		padding: 5px;
		width: 80px;
		font-family: "Bahnschrift Condensed";
		border-radius: 20px;
		margin-right: 10px;
	}
	.sef-captions{
		font-family:'Black Han Sans', sans-serif;
		font-size:6vw;
		letter-spacing: 1px;
	}
	.user-details{
		padding: 1em; 
		color: #00b8e5;
		border-bottom: 1px dotted #000; 
	}
	.profile-pic{
		width: 70px;
		height: auto;
	}
	.comment-title{
		font-family: "Good times";
	}
	.sef-content{
		padding-left: 1em;
		padding-right: 1em;
	}
</style>
</head>
<body>
	<?php
	   include "header.php";
	?>

	<div class="w3-row user-details">
		<div class="w3-col" style="width: 50%;">
			<?php
			foreach($sf -> displaySef($sef_id) as $s)
			{
				$w_id = $s['writer_id'];
				$user = $sf->displayWriterName($w_id);
				echo "<a href='#'>".$user."</a>";
			}
				
			?>
		</div>
		<div class="w3-col" style="width: 50%;">
			<img src="images/default.png" class="profile-pic w3-right" alt="profile pic">
		</div>
	</div>
	<div class="container" style="padding-left: 2%; padding-right: 2%;">
	<?php
		if(isset($_GET['error']))
		{
			echo "<div class='alert alert-danger'> An error occured while trying send your comment ! </div>";
		}
		foreach($sf -> displaySef($sef_id) as $s) 
		{

			echo "<h2 class='sef-captions'>".$s['sef_title']."</h2>";
			?>
				
			<?php
			echo "<p class='sef-content'>".$s['sef_content']."</p>";
			echo "<p>";
    			if($sf->checkIfILiked($s['id']) > 0)
    			{
    				echo "<a href='sef.controller.php?remove_like_sef_id=".$s['id']."'> <span style='color: #ff9900; font-size:12px;'>YAY </a></span><span style='font-size:10px;'>|".$sf->countLike($s['id'])."</span>";
    			}
    			else
    			{
    				echo "<a href='sef.controller.php?like_sef_id=".$s['id']."' style='font-size:12px;'>YAY </a><span style='font-size:10px;'>|".$sf->countLike($s['id'])."</span>";
    			}
    			if($sf->checkIfIdisliked($s['id']) > 0)
    			{
    				echo " <a href='sef.controller.php?remove_dislike_sef_id=".$s['id']."'> <span style='color: #ff9900; font-size:12px;'>NAY </a></span><span style='font-size:10px;'>|".$sf->countDisLike($s['id'])."</span>";
    			}
    			else
    			{
    				echo " <a href='sef.controller.php?dislike_sef_id=".$s['id']."' style='font-size:12px;'>NAY </a><span style='font-size:10px;'>|".$sf->countDislike($s['id'])."</span>";
    			}
    			if($sf->checkIfISaved($s['id']) > 0)
    			{
    				echo " <a href='sef.controller.php?unsave_sef_id=".$s['id']."'> <span style='color: #ff9900; font-size:12px;'>Saved </span></a><span style='font-size:10px;'>|".$sf->countSefSaves($s['id'])."</span>";
    			}
    			else
    			{
    				echo " <a href='sef.controller.php?save_sef_id=".$s['id']."' style='font-size:12px;'>Save </a><span style='font-size:10px;'>|".$sf->countSefSaves($s['id'])."</span>";
    			}
				
			echo "</p>";			    		
		}

		echo "<h3 class='comment-title w3-center'><b>Remarks</b></h3>";
		echo "<div class='wells'><div class='' style='padding:1em; background-color: #071920;'>";
		if($sf->checkSefComments($sef_id))
		{
			foreach ($sf->displaySefComment($sef_id) as $comment) 
			{
				$sender_id = $comment['sender_id'];
				echo "<div style='boder-bottom:1px solid #ff9900;'><h4 class='' style='color: #00b8e5 !important; font-size: 14px; margin-top: -3px;'>".$sf->displayWriterName($sender_id)."</h4> <p style='color:#b3b3b3; margin-top: -10px; margin-left 1%;'>".$comment['comment_content']."</p></div>";
			}
		}
		else
		{
			echo "<div style='color:#b3b3b3;'>No remarks yet... </div>";
		}
		echo "</div></div>";
	?>
	</div><br>
	<div class="footer">
		<form action="send_sef.php"  id="comment_form" method="POST">
			<div class="">
				<textarea cols="50" class="" name="comment" placeholder="Write your remark"></textarea>
				<input type="hidden" id="sef_id" name="sef_id" value="<?php echo $sef_id;?>">
				<button type="submit" name="send_comment" id="submit_comment">send <i class="fas fa-chevron-right"></i></button>
			</div>
			
		</form>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src=js/bootstrap.min.js"></script>
	
</body>
</html>