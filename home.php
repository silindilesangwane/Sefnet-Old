<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

	$interest_id = 0;

	if(isset($_POST['submit_mini_sef']))
	{
      	$sefObj = new SEF();
      	$writer_id = $user_id;
      
      	$sef_title = $_POST['sef_title'];
      	$sef_content = $_POST['editer'];
	      
	    if($sefObj->store($interest_id, $writer_id, $sef_title, $sef_content))
	    {
	        header("Location: index.php");
	    }
	    else
	    {
	        echo "<div class='alert alert-danger'>Problem occured while trying to send the Sef</div>";
	    }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="icon" href="images/sefnet transparent no R.png" type="image/gif" sizes="16x16">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link href="css/w3.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="css/iconmoon.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../jquery-1.11.3-jquery.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css"  />
        <title>Home - <?php print($userRow['user_email']); ?></title>
        <style type="text/css">
        	body
        	{
        		background-color: #071920 !important;
        	}
        	.sefs_style
        	{
        		border: 1px solid #DA6501;
        	}
        	
        	/*the preview design of the sef as a card*/
        	.w3-card-8{
        		color: #b3b3b3;
        		margin-left: .3em;
        		margin-right: .3em;
        		background-color: #071920;
        	}
        	.sef-cap{
        		color:white;
        		font-family: 'Permanent Marker', cursive;
        		font-size: 25px;
        		letter-spacing: 2px;
        	}
        	.min-sef-btn{
        		position: fixed;
            	bottom: 15px;
            	right: 5%;
            	font-size: 18px;
            	padding-top: 14px;
            	padding-bottom: 14px;
            	padding-left: 14px;
            	padding-right: 14px;
        		z-index: 1;
        	}
        	.mini-sef-textarea{
        		min-width: 100%;
        		max-width: 100%;
        		min-height: 150px;
        		max-height: 150px;
        		margin-top: 10px;
        		padding: 5px;
        		background-color: #0d2f3d;
        		color: white;
        		border:none;
        		border-bottom: 1px solid #ff9900;
        	}
        	::placeholder{
        		color: #e6e6e6;
        	}
        	
        	/*minisef modal styling*/
        	.modal-content{
        		background-color: #071920 !important;
        		margin-top: 30%;
        	}
        	.mini_sef_caption{
        		max-width: 100%;
        		min-width: 100%;
        		padding: 5px;
        		background-color: #0d2f3d;
        		border:none;
        		border-bottom: 1px solid #ff9900;
        		color: white;
        	}
        	.modal-title{
                letter-spacing: 2px;
                font-size: 25px;
                color: #027794;
                text-align: center;
                text-transform: uppercase;
        	}
        	.submit-button{
        		margin-top: 10px;
        	}
        </style>
    </head>
    <body>
        <?php
    	    include "header.php";
    	?>
        <div>	
            <div class="container" style="background-color: white; padding-top: 5px;">
            	<?php
        		 	include "class.sef.php";
        		 	require_once('dbconfig.php'); 
        			$sf = new SEF();
        			$database = new Database();
                    $db = $database->dbConnection();
                 
        
        
        
        			$interestArray = array();
        			foreach ($sf -> fecthAllData() as $s) 
        			{
        			   $interestArray[] = $s['interest_id'];  
        			}
        			foreach ($sf->index() as $s) 
        			{
        			    if(in_array($s['interest_id'], $interestArray))
        			    {
        			    	$w_id = $s['writer_id'];
        			        $user = $sf->displayWriterName($w_id);
        			        $sef_id = $s['id'];
        			    	echo  "<div class='row'>";
        			    	echo "<div class=' w3-card-8' style='padding: 1%;'>";
        			    		echo "<div class='dropdown'>
        			    				<span style='padding-right: 1%; padding-top: 5px;' class='w3-right dropdown-toggle' data-toggle='dropdown'>
        			    					<i class='btn fa fa-ellipsis-h' style='margin-top:-5px; font-size:20px; margin-right:-15px;' ></i>
        			    				</span>
        			    				<ul class='dropdown-menu w3-hide-small w3-hide-medium' style='margin-left:85%; margin-top:25px;'>
            								<li><a href='view_single_sef.php?sef_id=$sef_id'>Read</a></li>
            								<li><a href='sef.controller.php?save_sef_id='>Save</a></li>
            								<li><a href='#'>Share</a></li>
            								<li><a href='#'>Hide</a></li>
          								</ul>
        
          								<ul class='dropdown-menu w3-hide-small w3-hide-large' style='margin-left:75%; margin-top:25px;'>
            								<li><a href='view_single_sef.php?sef_id=$sef_id'>Read</a></li>
            								<li><a href='sef.controller.php?save_sef_id='>Save</a></li>
            								<li><a href='#'>Share</a></li>
            								<li><a href='#'>Hide</a></li>
          								</ul>
        
          								<ul class='dropdown-menu w3-hide-large w3-hide-medium' style='margin-left:55%; margin-top:25px;'>
            								<li><a href='view_single_sef.php?sef_id=$sef_id'>Read</a></li>
            								<li><a href='sef.controller.php?save_sef_id='>Save</a></li>
            								<li><a href='#'>Share</a></li>
            								<li><a href='#'>Hide</a></li>
          								</ul>
        			    			</div>";
        			    		echo "<h2 class='sef-cap'><a href='view_single_sef.php?sef_id=$sef_id'>".$s['sef_title']."</a></h2>";
        			    		echo "<p>".$s['sef_content']."</p>";
        			    		echo "<hr><p>";
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
        	 					
        						echo "  <a href='view_single_sef.php?sef_id=".$s['id']."' style='font-size:12px;'> Remark </a><span style='font-size:10px;'>|".$sf->countSefComments($s['id'])."</span><a href='#' class='w3-right' style='color:#00b8e5; font-size:12px; text-decoration:underline; margin-bottom:0px;'>".$user."</a></p>";			    		
        			    	echo "</div>";
        			    	echo "</div><div class='container-fluid' style='padding:1%;'></div>";
        			    }
        			}
        		?>
        		<div class="container">
        		    <!--The button that will toggle the modal-->
        			<span class="w3-button w3-circle min-sef-btn w3-right w3-card-4" data-toggle="modal" data-target="#mini_sef" style="background-color: #0d2f3d; color: white;"><i class="fa fa-edit"></i></span>
        			<div class="modal fade" id="mini_sef" role="dialog">
            			<div class="modal-dialog modal-lg">
              				<div class="modal-content">
              				    <!-- header of the modal -->
                				<div class="modal-header">
                  					<button type="button" class="close" data-dismiss="modal">&times;</button>
                  					<h4 class="modal-title">Write A Minisef</h4>
                				</div>
                				
                				<!--this the body of the modal containing the form of the minisef-->
                				<div class="modal-body">
                					<form data-parsley-validate action="home.php" method="POST" enctype="multipart/form-data">
                						<input type="text" name="mini_sef_caption" class="mini_sef_caption" placeholder="Pickup line..." required>
                  						<textarea maxlength="200" placeholder="What's poppin?" class="mini-sef-textarea" name="mini_sef_content" required></textarea>
                  						<button name="submit_mini_sef" class="btn btn-primary submit-button">POST</button>
                  						<span class="w3-right" style="color: #056; margin-top: 20px;"><span id="chars">200</span> characters</span>
                					</form>	<!-- end the minisef form --> 
                				</div> <!-- end modal body -->
              				</div> <!-- end modal content -->
            			</div> <!-- end modal dialog -->
        			</div><!-- end of the minisef modal -->
            	</div><!-- end of the minisef container -->
            </div><!-- end of the content of the page -->
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	var maxLength = 200;
    	$('textarea').keyup(function() {
    	  	var length = $(this).val().length;
    	  	var length = maxLength-length;
    	  	$('#chars').text(length);
    	});
    </script>
    
    </body>
</html>