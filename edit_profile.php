<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

  $cmd = $auth_user->runQuery("SELECT * FROM users_details WHERE user_id=:user_id");
  $cmd->execute(array(":user_id"=>$user_id));
  $user_detailsRow = $cmd->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['btn-signup']))
{
  $umail = strip_tags($_POST['txt_umail']);
  $user_firstname = strip_tags($_POST['txt_firstname']);
  $user_lastname = strip_tags($_POST['txt_lastname']);
  $bio = strip_tags($_POST['bio']);
  $occupation = strip_tags($_POST['occupation']);
  $gender = $_POST['gender'];

  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];
  $occupation = strip_tags($_POST['occupation']);
  $bio = strip_tags($_POST['bio']);
  $dob = date("Y-m-d", strtotime("$year-$month-$day"));
  $role = $_POST['role'];
  $upass = strip_tags($_POST['txt_upass']);



  if($user_lastname=="")  {
    $error[] = "Provide lastname !";  
  }
  else if($user_firstname == "")
  {
    $error[] = "Provide firstname !";
  }
  else if($umail=="") {
    $error[] = "provide email id !";  
  }
  else if($occupation=="") {
    $error[] = "provide occupation !";  
  }
  else if($bio=="") {
    $error[] = "provide bio !";  
  }
  else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
  }
  else if($upass=="") {
    $error[] = "provide password !";
  }
  else if(strlen($upass) < 6){
    $error[] = "Password must be atleast 6 characters"; 
  }
  else
  {
    try
    {
      $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_email='$umail'");
      $stmt->execute();
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      echo "<br><br><br><br><br>";  
      if($auth_user->update($user_id, $umail, $user_firstname, $user_lastname, $gender, $dob, $role, $upass, $bio, $occupation))
      { 
          $auth_user->redirect('profile.php');
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/w3.css"> 
<link type="stylesheet/text" rel="stylesheet" src="css/w3.css">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Edit Profile - <?php print($userRow['user_email']); ?></title>
<style type="text/css">
    body{
      background-color: #071920;
      
    }
    input{

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
    .dob-style{
        margin-top: -5px;
        background-color: ;
        border: none;
        border-bottom: 2px solid #ff9941;
        padding: .5em;
    }
    .input_style{
        width: 100%;
        border: none;
        border-bottom: 2px solid #ff9941;
        padding: .5em;
    }
    .input_area{
        max-width: 100%;
        min-width: 100%;
        padding: .5em;
        min-height: 100px;
        max-height: 200px;
        border: none;
        border-bottom: 2px solid #ff9941;
    }
    .heading-edit{
      color: #027794;
      font-family: "Balkeno";
      font-size: 4.5vw;
      margin-top: -20px;
      margin-bottom: -10px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    label{
        color:#e6e6e6;
    }
</style>
</head>

<body>

    <a href="profile.php" class="back"><i class="fas fa-angle-left"></i>Back</a>
    <div class="clearfix"></div><br><br>
    <h1 class="w3-center heading-edit"></i> Edit Profile</h1>
    <hr>
    	<div class="container">
      
        <form method="post" class="">
          
              <?php
        if(isset($error))
        {
          foreach($error as $error)
          {
             ?>
                       <div class="alert alert-danger">
                          <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                       </div>
                       <?php
          }
        }
        else if(isset($_GET['joined']))
        {
           ?>
                   <div class="alert alert-info">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                   </div>
                   <?php
        }
        ?>
              <div class="form-group">
              <input type="text" class="input_style" name="txt_firstname" placeholder="Enter firstname" value="<?php echo $userRow['user_firstname'];?>" />
              </div>
              <div class="form-group">
              <input type="text" class="input_style" name="txt_lastname" placeholder="Enter lastname" value="<?php echo $userRow['user_lastname'];?>" />
              </div>
              <div class="form-group">
              <input type="text" class="input_style" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php echo $userRow['user_email'];?>" />
              </div>
              <div class="form-group">
                <label>Male </label> <input type="radio" class="w3-radio" name="gender" value="m" checked/>
                <label>Female</label> <input type="radio" class="w3-radio" name="gender"value="f"/>
              </div>
              <div class="form-group">
                <input class="input_style" name="occupation" value="<?php if(strlen($user_detailsRow['occupation']) > 0){ echo $user_detailsRow['occupation']; }?>" placeholder="Enter your Occupation here">
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Citizen</label> <input type="radio" class="w3-radio" value="w" name="role"/>
                  <div class="alert alert-primary">A writer is a person who can also write Sefs also read</div>
                </div>
                <div class="col-sm-6">
                  <label>Explora</label> <input type="radio" class="w3-radio" value="r" name="role"/>
                  <div class="alert alert-primary">A reader is a person who is only interested in reading sefs</div>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="input_style" name="txt_upass" placeholder="Enter Password" />
              </div>

              <label>Select Year of Birth</label>
              <div class="form-group w3-row" style="">

                <span>
                  <select name="month" class="w3-col dob-style" style="width: 47%; margin-right: 5px">
                    <?php for( $m=1; $m<=12; ++$m ) { 
                      $month_label = date('F', mktime(0, 0, 0, $m, 1));
                    ?>
                      <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                    <?php } ?>
                  </select> 
                </span>
                <span>
                  <select name="day" class="w3-col dob-style" style="width: 15%; margin-right: 5px">
                    <?php 
                      $start_date = 1;
                      $end_date   = 31;
                      for( $j=$start_date; $j<=$end_date; $j++ ) {
                        echo '<option value='.$j.'>'.$j.'</option>';
                      }
                    ?>
                  </select>
                </span>
                <span>
                  <select name="year" class="w3-col dob-style" style="width: 35%;">
                    <?php 
                      $year = date('Y');
                      $min = $year - 60;
                      $max = $year;
                      for( $i=$max; $i>=$min; $i-- ) {
                        echo '<option value='.$i.'>'.$i.'</option>';
                      }
                    ?>
                  </select>                  
                </span>
              </div>
              <div class="form-group">
                <textarea class="input_area" name="bio" placeholder="Bio"><?php if(strlen($user_detailsRow['bio']) > 0){ echo $user_detailsRow['bio']; }?></textarea>
              </div>
              <div class="clearfix"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btn-signup">
                    <i class="glyphicon glyphicon-save"></i>&nbsp;SAVE CHANGES
                  </button>

                  <a href="profile.php" type="close" class="btn btn-default w3-right" name="cancel">
                      <i class="glyphicon glyphicon-close"></i>&nbsp;CANCEL
                  </a>
              </div>
              <br />
        </form>
       </div>
</div>

</body>
</html>