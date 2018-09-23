<?php

	require_once("session.php");
	
	require_once("class.user.php");
	
    require_once("class.sef.php");
	
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    $interest_id = 0;
  
    if(isset($_GET['interest_id']))
    {
        $_SESSION['interest_id'] = $_GET['interest_id'];
    }
    
    $interest_id = $_SESSION['interest_id'];

    if(isset($_POST['submit_sef']))
    {
        $sefObj = new SEF();
        
        $writer_id = $user_id;
      
        $sef_title = $_POST['sef_title'];
      
        $sef_content = $_POST['editer'];
      
        if($sefObj->store($interest_id, $writer_id, $sef_title, $sef_content))
        {
            header("Location: home.php");
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Write Sef- <?php print($userRow['user_email']); ?></title>
<style type="text/css">
    body{
      background-color: #071920;
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
</style>
</head>

<body>
  <a href="profile.php" class="back"><i class="fas fa-angle-left"></i>Back</a>
    <div class="clearfix"></div><br><br>
    <h1 class="text-center heading-edit"></i> Edit Profile</h1>
    <hr>

    <div class="clearfix"></div>
    	
    <div class="message"></div>
  <div class="container">
    <div class="well">
      <h3>Write a Sef <i class="fa fa-edit"></i></h3>
      <form data-parsley-validate method="post" action="writesef.php" enctype="multipart/form-data">   <!---------USE POST GLOBAL TO SEND DATA TO LOGIN.PHP---------->
        <input type="text" maxlength = "100" name="sef_title" class="form-control" required placeholder="Enter the Sef title here..."><br>
        <textarea class="ckeditor" name="editer" required placeholder="Enter Sefe content here" cols="50" rows="15"></textarea><br>
        <input type="submit" name="submit_sef" id="" value="Post" class="btn btn-sm btn-success">
      </form>
    </div>
  </div>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/js/ckeditor_4.9.2_full/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="js/parsley.min.js"></script>

</body>
</html>