<!DOCTYPE html>
<html lan="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>Sefnet</title>
		<link rel="stylesheet" type="text/css" href="css/w3.css">
		<link rel="stylesheet" type="text/css" href="css/animate/animate.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bowlby+One+SC|Special+Elite|Titan+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<style type="text/css">
			body{
				padding-top: 95px;
				background-image: url('images/sabine.jpg');
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center center;
				background-attachment: fixed;
				position: relative;
			}
			@media screen and (max-width: 768px){
				body{
				    padding: 2em 0;
				}
			}
			body .overlay{
				background: rgba(0, 0, 0, 0.7);
				left: 0;
				right: 0;
				bottom: 0;
				top: 0;
				position: absolute;
				z-index: 1;
			}
			body .container {
				position: relative;
				z-index: 2;
			}
			.myNav{
				background-color: #071920;
				width: 100%;
				height: 70px;
				top:0;
				z-index: 1;
			}
			.navbar-brand {
				transform: translateX(-50%);
				top: -20px;
				left: 50%;
				position: absolute;
			}
			.nav-btn{
				margin-right: 100px;
				font-size: 17px;
				margin-top: 20px;
			}
			.nav-btn a{
				color: #b3b3b3;
			}
			.nav-btn a:hover{
	    		background-color: transparent !important;
	    		color: #ff9900;
	    		text-decoration: underline;
	    	}
	    	.main-logo{
				margin-top: 6px;
				margin-left:6px;
			}
			.main-logo-mobile{
				margin-left: 20px;
				margin-top: 10px;
			}
			.w3-top{
				top: 70px !important;
			}
			.second-nav{
				background-color: white;
				opacity: .6;
			}
			.menu-of-mobile-nav{
				margin-right: 10%;
				color: #b3b3b3;
				font-size: 15px;
				margin-top: 15px;
				font-weight: bolder;
			}
			.footer {
				position: relative;

				padding: .5em;
				left: 0;
				bottom: -70px;
				width: 100%;
				opacity: .7;
				clear:both;
				padding-top:20px;
				background-color: #071920;
				text-align: center;
				z-index: 2;
			}
			.footer a{
				color: #b3b3b3;
				letter-spacing: 1px;
			}
			.footer a:hover{
				color: #fff;
				font-weight: bold;
			}

			/*Footer2 is for the tablet and desktop view*/
			.footer2 {
				position: relative;

				padding: .5em;
				left: 0;
				bottom: 0;
				width: 100%;
				opacity: .7;
				clear:both;
				padding-top:20px;
				background-color: #071920;
				text-align: center;
				z-index: 2;
			}
			.footer2 a{
				color: #b3b3b3;
				letter-spacing: 1px;
			}
			.footer2 a:hover{
				color: #fff;
				font-weight: bold;
			}
			.sef-intro{
				color: #fff;
				font-size: 18px;
				padding: .5em;
				font-family: 'Gloria Hallelujah', cursive;
				background-color: #000;
				filter: opacity(.8);
				

			}
		</style>
	</head>
	<body>
		<!-- Desktop view of the navbar -->
		<div class="w3-bar myNav w3-hide-small w3-hide-medium" style="position: fixed;">
			<img src="images/sefnet transparent no R.png" width="65px" class="main-logo w3-left">
			<a href="#" class="navbar-brand">
				<img src="images/sefnet_logo.png" width="200px" hieght="auto" alt="BH Logo">
			</a>
			<div class="w3-right nav-btn">
		        <a href="sign-up.php"><i class="fa fa-user"></i> Sign Up</a> &nbsp;&nbsp;
		        <a href="login.php"><span class="fa fa-sign-in"></span> Login</a>
			</div>
		</div>

		<!-- Tablet view of the navbar -->
		<div class="w3-bar myNav w3-hide-small w3-hide-large" style=" position: fixed;">
			<img src="images/sefnet transparent no R.png" width="68px" class=" main-logo">
			<a href="#" class="navbar-brand">
				<img src="images/sefnet_logo.png" width="200px" hieght="auto" alt="BH Logo">
			</a>
		</div>

		<!-- Mobile view of the navbar -->
		<div class="w3-bar myNav w3-hide-medium w3-hide-large" style=" position: fixed;">
			<img src="images/sefnet transparent no R.png" width="60px" class=" main-logo-mobile">
			<div class="menu-of-mobile-nav w3-right">
				<a href="#" class="w3-bar-item w3-button">About</a>
  				<a href="#" class="w3-bar-item w3-button">Support</a>
  				<a href="http://www.innet.co.za" class="w3-bar-item w3-button">Innet</a>
			</div>	
		</div>

		<div class="w3-top w3-hide-large">
		  	<div class="w3-bar second-nav">
				<a href="sign-up.php" style="width:50%; font-size: 15px; text-transform: uppercase; font-weight: bold;" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Sign Up</a>
				<a href="login.php" style="width:50%; font-size: 15px; text-transform: uppercase; font-weight: bold;" class="w3-bar-item w3-button"><span class="fa fa-sign-in"></span> Login</a>
			</div>
		</div>

		<div class="container-fluid w3-hide-large" style="margin-top: 130px;"></div>
		<div class="sef-intro">
			<h1 class="">Hey there! Nice to see you again.</h1>
			<h2>Same drill. <a href="login.php" style="color:#ff9900;">Log in</a> to sef the net...&#x1F44A;</h2>
			<br>

			<p>Ow, it’s your first time here? <b style="font-size: 26px;">Well then, Welcome!</b> Want to know what Sefnet is?</p><br>
			<p>Uhhhm, it’s an Information Network. Jhe, just that. An information network. People write and share their content, any. From what’s up in our day to day life to what’s up in your heart, Soul and mind. Share it with the world.</p><br>

			<p><i>*Ow jha, your content has to be legal and non-violent, I must add. Nobody wants to get sued after all!</i></p><br>
			<p>Know what, <a href="sign-up.php" style="color:#ff9900; font-size:20px;">Sign up</a> to see what i'm talking about here!</p>
			<p>Hope you enjoy...&#x1F609;</p>
		</div>

		<!-- Mobile view footer -->
		<div class="footer w3-hide-medium w3-hide-large">
			<p style="color: #b3b3b3;"><a href="#">About</a> | <a href="#">Help Desk</a> | <a href="#">Innet</a> | <a href="#">Terms & Conditions</a> | <a href="#">Privacy</a></p>
			<p style="color: #b3b3b3;">&copy;Copyright 2018 Innet </p>
		</div>

		<!-- Tablet view footer -->
		<div class="footer w3-hide-small w3-hide-large">
			<p style="color: #b3b3b3;"><a href="#">About</a> | <a href="#">Help Desk</a> | <a href="#">Innet</a> | <a href="#">Terms & Conditions</a> | <a href="#">Privacy</a></p>
			<p style="color: #b3b3b3;">&copy;Copyright 2018 Innet </p>
		</div>

		<!-- desktop view footer -->
		<div class="footer2 w3-hide-small w3-hide-medium" style="position: fixed;">
			<p style="color: #b3b3b3;"><a href="#">About</a> | <a href="#">Help Desk</a> | <a href="#">Innet</a> | <a href="#">Terms & Conditions</a> | <a href="#">Privacy</a></p>
			<p style="color: #b3b3b3;">&copy;Copyright 2018 Innet </p>
		</div>
	</body>
</html>