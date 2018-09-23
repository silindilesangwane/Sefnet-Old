<?php

	require_once("session.php");
	
	require_once("class.user.php");
	
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$userDetailsRowArray = $auth_user->diplayUser();


	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
// 	displaying the interests
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
    }
    
    }
    $sql = $auth_user->runQuery("SELECT * FROM interest");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC)
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<link rel="icon" href="images/sefnet transparent no R.png" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<title>Welcome - <?php print($userRow['user_email']); ?></title>
<style type="text/css">
	body{
		background-color: #071920 !important;
	}
    .header{
        margin-top: -22px;
    
        background-repeat: no-repeat;
        background-image: url('images/bgcolor5.jpg');
        background-size: 100% auto;
  }
    .back{
        color: #ff9900;
        font-size: 20px;
        font-family: "Segoe UI Semibold";
        margin-left: 1em;
    }
    .back:hover{
        text-decoration: none;
        color: #ff9900;
        font-size: 25px;
        transition: .5s;
        z-index: 1;
    }
	.profile-pic{
    	box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        width: 60px;
        height: 60px;
        margin-bottom: 20px;
	}
	.captions{
		border-bottom: none;
		width: 140px;
		font-family: "Segoe UI Semibold";
		font-size: 20px;
		letter-spacing: 2px;
		text-transform: uppercase;
		padding: .3em;
		margin-bottom: -2px;
		background-color: #ff9900;
		z-index: 2;
		text-align: center;
		color: #e6e6e6;
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
	.my-content{
		color: #666666;
		padding: .5em;
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		background-color: #e6e6e6;
		border-radius: 0px 5px 5px 5px;
		font-size: 15px;
	}
	.userName{
		color: #e6e6e6;
        margin-top: -20px;
        font-size: 16px;
	}
	a{
	    text-decoration:none;
	    
	}
	.update-btn{
		float: right;
        font-family: "Segoe UI Semibold";
        background-color: #fff;
        padding: 8px;
        font-weight: bolder;
	    margin-right: 1em;
	    font-size: 12px;
	    color: #071920;
	}
</style>
</head>

	  <br>
    <div class="w3-row header">
        <div class="w3-col" style="width: 25%;">
            <a href="home.php" class="back"><i class="fas fa-angle-left"></i>Back</a>
        </div>
        <div class="w3-display-container w3-center w3-col" style="width: 50%;">
        
        <?php

            if($stmt->rowCount()>0)
            {
                while($userRow)
                {
                    $id = $userRow['id'];

                    $resultImg = $auth_user->runQuery("SELECT * FROM profile_pic WHERE userid='$id'");
                   
                    $resultImg->execute(array(":user_id"=>$user_id));

                    while($rowImg = $resultImg->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<div>";
                        
                
                        if($rowImg['status'] == 0)
                        {
                    
                            // folder and display them accordingly
                            /*$filename = "images/profile/profile".$user_id."*";
        
                            $fileInfo = glob($filename);
        
                            $fileExt = explode(".",$fileInfo[0]);
        
                            $fileActualExt = $fileExt[1];
                            
                            $fileNewName = "profile".$id.".".$fileActualExt;
                    
                            $fileDestination = "images/profile/$fileNewName";
                            
                            echo "<img src='".$fileDestination."?".mt_rand()."' class='w3-circle profile-pic'>";*/
                            
                            $folder = "images/profile";
                            
                            $results = scandir('images/profile');
                            
                               foreach ($results as $result) {
                            
                                    if ($result === '.' or $result === '..')
                                	    continue;
                            
                                    if (is_file($folder . '/' . $result)) {
                                        echo '
                                         <div class="w3-circle profile-pic">
                                            <img src="'.$folder . '/' . $result.'" alt="...">
                                        </div>';
                        }

                        else{
                
                            echo "<img src='images/profile/default.png' class='w3-circle profile-pic'>";
                        }

                        echo "</div>";
                    }
                }
            }
        ?>
              <form action="upload_ac.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Upload">      
              </form>
              <h3 class="w3-center userName"><?php echo $userRow['user_firstname']." ".$userRow['user_lastname']; ?></h3>
         </div>
         <div class="w3-col" style="width: 25%;">
            <h2 class="update-btn"><a href="edit_profile.php">Edit Profile</a></h2>
         </div>
  	</div>
    <div class="w3-bar w3-white">
        <a href="#" class="w3-bar-item w3-button" style="width: 25%; padding: 1em;">Posts</a>
        <a href="saved_sefs.php" class="w3-bar-item w3-button" style="width: 25%; padding: 1em;">Saved</a>
        <a href="#" class="w3-bar-item w3-button" style="width: 25%; padding: 1em;">Following</a>
        <a href="#" class="w3-bar-item w3-button" style="width: 25%; padding: 1em;">Followers</a>
    </div>

  	<!-- this is the basic information -->
  	<div class="container">
  		<h3 class="captions">Basic Info</h3>
  		<div class="my-content">
  			<p>Name : <?php echo $userRow['user_firstname']; ?></p>
  			<p>Surname : <?php echo $userRow['user_lastname']; ?></p>
  			<p>Date of Brith : <?php $dob = strtotime($userRow['dob']); echo date("Y-M-d", $dob); ?></p>
  			<p>Email : <?php echo $userRow['user_email']; ?></p>
  			<p>
  			<?php 
  				if($userDetailsRowArray)
  				{
        			foreach($userDetailsRowArray as $v) 
        			{
        				if(strlen($v['occupation']) > 0)
        					echo "Occupation : ".$v['occupation'];
        				else
        					echo "No Occupation. Click <a href=''>here to edit update it</a>";
        			}
        		}
        		else
        		{
        			echo "No Occupation. Click <a href=''>here to edit update it</a>";
        		}
        					
        		?>
  			</p>
        	<p>Country : <?php echo $userRow['country']; ?></p>
        	<p>Joined Sefnet on : <?php $date_created = strtotime($userRow['date_created']); echo date("Y-M-d", $date_created); ?></p>
  		</div>
  	</div>

  	<!-- this is for all interests -->
  	<div class="container">
  		<h3 class="captions">Interests</h3>
  		<div class="my-content">
  			<?php
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) 
                {
                    if(!in_array($row['id'], $myInterests))
                    {
                        ?>
                            <p><?php echo $row['interest_name']; ?></p>
                        <?php
                    }
                }
            ?>
  		</div>
  	</div>

  	<!-- this is for user bio -->
  	<div class="container">
  		<h3 class="captions">Bio</h3>
  		<div class="my-content">
  			<p>
  			<?php 
  				if($userDetailsRowArray)
  				{
        			foreach($userDetailsRowArray as $v) 
        			{
        				if(strlen($v['bio']) > 0)
        					echo $v['bio'];
        				else
        					echo "No Bio. Click <a href=''>here to edit update it</a>";
        			}
        		}
        		else
        		{
        			echo "No Occupation. Click <a href=''>here to edit update it</a>";
        		}

        	?>
  			</p>
  		</div>
  	</div>


<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>