<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">		
<title>Sefnet : Login</title>
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style type="text/css">
    body{
        color:#e6e6e6;
        letter-spacing: 2px;
    }
    .my-background{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        padding: 1em 0;
        position: relative;
    }
    @media screen and (max-width: 768px){
            .my-background{
                padding: 2em 0;
            }
        }
    .my-background .overlay{
        background: rgba(0, 0, 0, 0.7);
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        position: absolute;
        z-index: 1;
    }
    input{
        background-color: transparent;
    }
    .my-background .container {
            position: relative;
            z-index: 2;
    }
    .input_style{
        width: 100%;
        border: none;
        border-bottom: 2px solid #ff9941;
    }
    .form-signin {
        max-width: 500px;
        padding: 19px 29px 29px;
        margin: 0 auto;
        margin-top: 50px;
        margin-bottom: 175px;
        background-color: transparent;
        
        border: 1px solid #e5e5e5;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
                
        font-family:Tahoma, Geneva, sans-serif;
        font-weight:lighter;
    }

    .form-signin .form-signin-heading{
        color:#00A2D1;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"],
    .form-signin input[type="email"] {
        font-size: 16px;
        height: 45px;
        padding: 7px 9px;
    }

    .signin-form, .body-container
    {
        margin-top:1px;
    }

    #btn-submit{
        height:45px;
    }
    .h5{
        font-family:Verdana, Geneva, sans-serif;
    }
    h1{
        font-family:Verdana, Geneva, sans-serif;
    }
    .login-btn{
        background-color: #027794;
        height: 35px;

    }
    .forgot-password{
        text-transform: uppercase;
        margin-top: 10px;
        text-decoration: underline;
    }
    .forgot-password:hover{
        font-size: 15px !important;
        margin-top: 8px;
        font-weight: bold;
        color:#DA6501;
        text-decoration: none;
        transition: .5s;
    }
</style>
</head>

<body class="my-background" style="background-image: url('images/bgcolor4.jpg'); background-repeat: no-repeat;">
    <div class="overlay"></div>
    <div class="container">
        <center><img src="images/sefnet_logo.png" class="" width="40%" height="auto" style="margin-right: -10px;"></center>
        <div class="signin-form">
        	<div class="container"> 
               <form class="form-signin" method="post" id="login-form">
                    <fieldset>
                        <legend><h2 class="form-signin-heading w3-xlarge">Enter login details</h2></legend>
                    
                        <div id="error">
                        <?php
                			if(isset($error))
                			{
                				?>
                                <div class="alert alert-danger">
                                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                </div>
                                <?php
                			}
                		?>
                        </div>
                        
                        <div class="form-group">
                        <input type="text" class="input_style" name="txt_uname_email" placeholder="Email" required />
                        <span id="check-e"></span>
                        </div>
                        
                        <div class="form-group">
                        <input type="password" class="input_style" name="txt_password" placeholder="Password" />
                        </div>
                        
                        <a href="#" class="forgot-password w3-right w3-small">forgot password?</a>

                        <div class="form-group">
                            <button type="submit" name="btn-login" class="w3-btn login-btn">
                                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                            </button>
                        </div>  
                      	<br />
                        <label>Don't have account yet ! <a href="sign-up.php" style="color: #ff9941; text-decoration: underline;">Sign Up</a></label>
                    </fieldset>
              </form>

            </div>    
        </div>
    </div>
</body>
</html>