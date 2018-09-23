<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$umail = strip_tags($_POST['txt_umail']);
	$user_firstname = strip_tags($_POST['txt_firstname']);
	$user_lastname = strip_tags($_POST['txt_lastname']);
	$gender = $_POST['gender'];
	$country = $_POST['country'];

	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];


	$dob = date("Y-m-d", strtotime("$year-$month-$day"));
	$role = $_POST['role'];
	$upass = strip_tags($_POST['txt_upass']);


//Validation of the inputs from the user. 
	if($user_lastname=="")	{
		$error[] = "Provide lastname !";	
	}
	else if($user_firstname == "")
	{
		$error[] = "Provide firstname !";
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT * FROM users WHERE user_email='$umail'");
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

				
			if($row['user_email']==$umail) 
			{
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($umail, $user_firstname, $user_lastname, $gender, $dob, $country, $role, $upass))
				{				
			        if($row->rowCount()>0)
			        {
			    
			            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			            {
			                $userid= $row['id'];
			                $sql = "INSERT INTO profile_pic(userid,status)
			                VALUES('$userid',1)";
			                
			                $user->runQuery($sql);
			            }
			        }
			        
					$user->redirect('interest.php');
				}
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
    
    <title>Sefnet : Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <style type="text/css">
    	body{
    		color: white;
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
    	.my-background .container {
    			position: relative;
    			z-index: 2;
    	}
    	.all-labals{
    		width: 100%;
    		letter-spacing: 2px;
    		border-bottom: 1px solid #e6e6e6;		
    	}
    	.form-signin
    	{
    	    max-width: 500px;
    	    padding: 19px 29px 29px;
    	    margin: 0 auto;
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
    	.input_style{
    		width: 100%;
    		border: none;
    		border-bottom: 2px solid #ff9941;
    	}
    	.select_style{
    
    		width: 100%;
    		background-color: transparent;
    		height: 45px;
    		border: none;
    		border-bottom: 2px solid #ff9941;
    
    	}
    	option{
    		background-color: #027794;
    		color: #fff;
    	}
    	.dob-style{
    
    		margin-top: -5px;
    		background-color: transparent;
    		border: none;
    		border-bottom: 2px solid #ff9941;
    		height: 45px;
    	}
    	input{
    		background-color: transparent;
    	}
    	.form-signin input[type="text"],
    	.form-signin input[type="password"],
    	.form-signin input[type="email"] 
    	{
    	    font-size: 16px;
    	    height: 45px;
    	    padding: 7px 9px;
    	}
    	.sign-in{
    		color: #DA6501;
    	}
    	.sign-in:hover{
    		color: #027794;
    		text-decoration: none;
    		text-transform: uppercase;
    		letter-spacing: 2px;
    		transition: 1s;
    	}
    
    	.navbar-brand{
    		font-family:"Lucida Handwriting";
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
    	.explain{
    		background-color: white;
    		color: black;
    		opacity: .7;
    		border-radius: 10px;
    	}
    </style>
</head>

<body class="my-background" style="background-image: url('images/bgcolor4.jpg'); background-repeat: no-repeat;">
    <div class="overlay"></div>
    <div class="container">
    	<center><img src="images/sefnet_logo.png" class="" width="40%" height="auto" style="margin-right: -10px;"></center>
    <div class="signin-form">

<div class="container">    	
        <form method="post" class="form-signin">
            <fieldset>
	    		<legend><h2 class="form-signin-heading">Sign Up</h2></legend>
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
	                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
	                 </div>
	                 <?php
				}
				?>
	            <div class="form-group">
	            <input type="text" class="input_style" name="txt_firstname" placeholder="Firstname" value="<?php if(isset($error)){echo $user_firstname;}?>" />
	            </div>
	            <div class="form-group">
	            <input type="text" class="input_style" name="txt_lastname" placeholder="Lastname" value="<?php if(isset($error)){echo $user_lastname;}?>" />
	            </div>
	            <div class="form-group">
	            <input type="text" class="input_style" name="txt_umail" placeholder="Email" value="<?php if(isset($error)){echo $umail;}?>" />
	            </div>
	            <div class="form-group">
	            	<label>Male</label> <input type="radio" class="w3-radio" name="gender" value="m"/>
	            	<label>Female</label> <input type="radio" class="w3-radio" name="gender" value="f"/>
	            </div>

	            <div class="form-group">
	            	<select class="select_style" name="country">
	            		<option value="" disabled selected>-Select your country-</option>
						<option value="AFG">Afghanistan</option>
						<option value="ALA">Åland Islands</option>
						<option value="ALB">Albania</option>
						<option value="DZA">Algeria</option>
						<option value="ASM">American Samoa</option>
						<option value="AND">Andorra</option>
						<option value="AGO">Angola</option>
						<option value="AIA">Anguilla</option>
						<option value="ATA">Antarctica</option>
						<option value="ATG">Antigua and Barbuda</option>
						<option value="ARG">Argentina</option>
						<option value="ARM">Armenia</option>
						<option value="ABW">Aruba</option>
						<option value="AUS">Australia</option>
						<option value="AUT">Austria</option>
						<option value="AZE">Azerbaijan</option>
						<option value="BHS">Bahamas</option>
						<option value="BHR">Bahrain</option>
						<option value="BGD">Bangladesh</option>
						<option value="BRB">Barbados</option>
						<option value="BLR">Belarus</option>
						<option value="BEL">Belgium</option>
						<option value="BLZ">Belize</option>
						<option value="BEN">Benin</option>
						<option value="BMU">Bermuda</option>
						<option value="BTN">Bhutan</option>
						<option value="BOL">Bolivia, Plurinational State of</option>
						<option value="BES">Bonaire, Sint Eustatius and Saba</option>
						<option value="BIH">Bosnia and Herzegovina</option>
						<option value="BWA">Botswana</option>
						<option value="BVT">Bouvet Island</option>
						<option value="BRA">Brazil</option>
						<option value="IOT">British Indian Ocean Territory</option>
						<option value="BRN">Brunei Darussalam</option>
						<option value="BGR">Bulgaria</option>
						<option value="BFA">Burkina Faso</option>
						<option value="BDI">Burundi</option>
						<option value="KHM">Cambodia</option>
						<option value="CMR">Cameroon</option>
						<option value="CAN">Canada</option>
						<option value="CPV">Cape Verde</option>
						<option value="CYM">Cayman Islands</option>
						<option value="CAF">Central African Republic</option>
						<option value="TCD">Chad</option>
						<option value="CHL">Chile</option>
						<option value="CHN">China</option>
						<option value="CXR">Christmas Island</option>
						<option value="CCK">Cocos (Keeling) Islands</option>
						<option value="COL">Colombia</option>
						<option value="COM">Comoros</option>
						<option value="COG">Congo</option>
						<option value="COD">Congo, the Democratic Republic of the</option>
						<option value="COK">Cook Islands</option>
						<option value="CRI">Costa Rica</option>
						<option value="CIV">Côte d'Ivoire</option>
						<option value="HRV">Croatia</option>
						<option value="CUB">Cuba</option>
						<option value="CUW">Curaçao</option>
						<option value="CYP">Cyprus</option>
						<option value="CZE">Czech Republic</option>
						<option value="DNK">Denmark</option>
						<option value="DJI">Djibouti</option>
						<option value="DMA">Dominica</option>
						<option value="DOM">Dominican Republic</option>
						<option value="ECU">Ecuador</option>
						<option value="EGY">Egypt</option>
						<option value="SLV">El Salvador</option>
						<option value="GNQ">Equatorial Guinea</option>
						<option value="ERI">Eritrea</option>
						<option value="EST">Estonia</option>
						<option value="ETH">Ethiopia</option>
						<option value="FLK">Falkland Islands (Malvinas)</option>
						<option value="FRO">Faroe Islands</option>
						<option value="FJI">Fiji</option>
						<option value="FIN">Finland</option>
						<option value="FRA">France</option>
						<option value="GUF">French Guiana</option>
						<option value="PYF">French Polynesia</option>
						<option value="ATF">French Southern Territories</option>
						<option value="GAB">Gabon</option>
						<option value="GMB">Gambia</option>
						<option value="GEO">Georgia</option>
						<option value="DEU">Germany</option>
						<option value="GHA">Ghana</option>
						<option value="GIB">Gibraltar</option>
						<option value="GRC">Greece</option>
						<option value="GRL">Greenland</option>
						<option value="GRD">Grenada</option>
						<option value="GLP">Guadeloupe</option>
						<option value="GUM">Guam</option>
						<option value="GTM">Guatemala</option>
						<option value="GGY">Guernsey</option>
						<option value="GIN">Guinea</option>
						<option value="GNB">Guinea-Bissau</option>
						<option value="GUY">Guyana</option>
						<option value="HTI">Haiti</option>
						<option value="HMD">Heard Island and McDonald Islands</option>
						<option value="VAT">Holy See (Vatican City State)</option>
						<option value="HND">Honduras</option>
						<option value="HKG">Hong Kong</option>
						<option value="HUN">Hungary</option>
						<option value="ISL">Iceland</option>
						<option value="IND">India</option>
						<option value="IDN">Indonesia</option>
						<option value="IRN">Iran, Islamic Republic of</option>
						<option value="IRQ">Iraq</option>
						<option value="IRL">Ireland</option>
						<option value="IMN">Isle of Man</option>
						<option value="ISR">Israel</option>
						<option value="ITA">Italy</option>
						<option value="JAM">Jamaica</option>
						<option value="JPN">Japan</option>
						<option value="JEY">Jersey</option>
						<option value="JOR">Jordan</option>
						<option value="KAZ">Kazakhstan</option>
						<option value="KEN">Kenya</option>
						<option value="KIR">Kiribati</option>
						<option value="PRK">Korea, Democratic People's Republic of</option>
						<option value="KOR">Korea, Republic of</option>
						<option value="KWT">Kuwait</option>
						<option value="KGZ">Kyrgyzstan</option>
						<option value="LAO">Lao People's Democratic Republic</option>
						<option value="LVA">Latvia</option>
						<option value="LBN">Lebanon</option>
						<option value="LSO">Lesotho</option>
						<option value="LBR">Liberia</option>
						<option value="LBY">Libya</option>
						<option value="LIE">Liechtenstein</option>
						<option value="LTU">Lithuania</option>
						<option value="LUX">Luxembourg</option>
						<option value="MAC">Macao</option>
						<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
						<option value="MDG">Madagascar</option>
						<option value="MWI">Malawi</option>
						<option value="MYS">Malaysia</option>
						<option value="MDV">Maldives</option>
						<option value="MLI">Mali</option>
						<option value="MLT">Malta</option>
						<option value="MHL">Marshall Islands</option>
						<option value="MTQ">Martinique</option>
						<option value="MRT">Mauritania</option>
						<option value="MUS">Mauritius</option>
						<option value="MYT">Mayotte</option>
						<option value="MEX">Mexico</option>
						<option value="FSM">Micronesia, Federated States of</option>
						<option value="MDA">Moldova, Republic of</option>
						<option value="MCO">Monaco</option>
						<option value="MNG">Mongolia</option>
						<option value="MNE">Montenegro</option>
						<option value="MSR">Montserrat</option>
						<option value="MAR">Morocco</option>
						<option value="MOZ">Mozambique</option>
						<option value="MMR">Myanmar</option>
						<option value="NAM">Namibia</option>
						<option value="NRU">Nauru</option>
						<option value="NPL">Nepal</option>
						<option value="NLD">Netherlands</option>
						<option value="NCL">New Caledonia</option>
						<option value="NZL">New Zealand</option>
						<option value="NIC">Nicaragua</option>
						<option value="NER">Niger</option>
						<option value="NGA">Nigeria</option>
						<option value="NIU">Niue</option>
						<option value="NFK">Norfolk Island</option>
						<option value="MNP">Northern Mariana Islands</option>
						<option value="NOR">Norway</option>
						<option value="OMN">Oman</option>
						<option value="PAK">Pakistan</option>
						<option value="PLW">Palau</option>
						<option value="PSE">Palestinian Territory, Occupied</option>
						<option value="PAN">Panama</option>
						<option value="PNG">Papua New Guinea</option>
						<option value="PRY">Paraguay</option>
						<option value="PER">Peru</option>
						<option value="PHL">Philippines</option>
						<option value="PCN">Pitcairn</option>
						<option value="POL">Poland</option>
						<option value="PRT">Portugal</option>
						<option value="PRI">Puerto Rico</option>
						<option value="QAT">Qatar</option>
						<option value="REU">Réunion</option>
						<option value="ROU">Romania</option>
						<option value="RUS">Russian Federation</option>
						<option value="RWA">Rwanda</option>
						<option value="BLM">Saint Barthélemy</option>
						<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="KNA">Saint Kitts and Nevis</option>
						<option value="LCA">Saint Lucia</option>
						<option value="MAF">Saint Martin (French part)</option>
						<option value="SPM">Saint Pierre and Miquelon</option>
						<option value="VCT">Saint Vincent and the Grenadines</option>
						<option value="WSM">Samoa</option>
						<option value="SMR">San Marino</option>
						<option value="STP">Sao Tome and Principe</option>
						<option value="SAU">Saudi Arabia</option>
						<option value="SEN">Senegal</option>
						<option value="SRB">Serbia</option>
						<option value="SYC">Seychelles</option>
						<option value="SLE">Sierra Leone</option>
						<option value="SGP">Singapore</option>
						<option value="SXM">Sint Maarten (Dutch part)</option>
						<option value="SVK">Slovakia</option>
						<option value="SVN">Slovenia</option>
						<option value="SLB">Solomon Islands</option>
						<option value="SOM">Somalia</option>
						<option value="ZAF">South Africa</option>
						<option value="SGS">South Georgia and the South Sandwich Islands</option>
						<option value="SSD">South Sudan</option>
						<option value="ESP">Spain</option>
						<option value="LKA">Sri Lanka</option>
						<option value="SDN">Sudan</option>
						<option value="SUR">Suriname</option>
						<option value="SJM">Svalbard and Jan Mayen</option>
						<option value="SWZ">Swaziland</option>
						<option value="SWE">Sweden</option>
						<option value="CHE">Switzerland</option>
						<option value="SYR">Syrian Arab Republic</option>
						<option value="TWN">Taiwan, Province of China</option>
						<option value="TJK">Tajikistan</option>
						<option value="TZA">Tanzania, United Republic of</option>
						<option value="THA">Thailand</option>
						<option value="TLS">Timor-Leste</option>
						<option value="TGO">Togo</option>
						<option value="TKL">Tokelau</option>
						<option value="TON">Tonga</option>
						<option value="TTO">Trinidad and Tobago</option>
						<option value="TUN">Tunisia</option>
						<option value="TUR">Turkey</option>
						<option value="TKM">Turkmenistan</option>
						<option value="TCA">Turks and Caicos Islands</option>
						<option value="TUV">Tuvalu</option>
						<option value="UGA">Uganda</option>
						<option value="UKR">Ukraine</option>
						<option value="ARE">United Arab Emirates</option>
						<option value="GBR">United Kingdom</option>
						<option value="USA">United States</option>
						<option value="UMI">United States Minor Outlying Islands</option>
						<option value="URY">Uruguay</option>
						<option value="UZB">Uzbekistan</option>
						<option value="VUT">Vanuatu</option>
						<option value="VEN">Venezuela, Bolivarian Republic of</option>
						<option value="VNM">Viet Nam</option>
						<option value="VGB">Virgin Islands, British</option>
						<option value="VIR">Virgin Islands, U.S.</option>
						<option value="WLF">Wallis and Futuna</option>
						<option value="ESH">Western Sahara</option>
						<option value="YEM">Yemen</option>
						<option value="ZMB">Zambia</option>
						<option value="ZWE">Zimbabwe</option>
	            	</select>
	            </div>

	            <br>
	            <label class="all-labals">Select Date of Birth (below)</label>
	            <div class="w3-row">
	            	<span class="">
				      	<select name="month" class="w3-col dob-style" style="width: 45%; margin-right: 5px">
				      		<option value="" disabled selected>-Month-</option>
					        <?php for( $m=1; $m<=12; ++$m ) { 
					          	$month_label = date('F', mktime(0, 0, 0, $m, 1));
					        ?>
					          	<option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
					        <?php } ?>
				      	</select> 
				    </span>

				    <span>
				      	<select name="day" class="w3-col dob-style" style="width: 20%; margin-right: 5px">
				      		<option value="" disabled selected>-Day-</option>
					        <?php 
					          	$start_date = 1;
					          	$end_date   = 31;
					          	
					          	for( $j=$start_date; $j<=$end_date; $j++ )
					          	{
					            	echo '<option value='.$j.'>'.$j.'</option>';
					          	}
					        ?>
				      	</select>
				    </span>

				    <span>
				      	<select name="year" class="w3-col dob-style" style="width: 30%;">
				      		<option value="" disabled selected>-Year-</option>
				        	<?php 
				          		$year = date('Y');
				          		$min = $year - 70;
				          		$max = $year - 13;
				          		for( $i=$max; $i>=$min; $i-- )
				          		{
				            		echo '<option value='.$i.'>'.$i.'</option>';
				          		}
				        	?>
				      	</select>
	   				</span>
	            </div>

	            <br>
	            <br/>
	            <label class="all-labals">Select User (below)</label>
	            <div class="form-group w3-row" style="">
	            	<div class=" w3-col" style="width: 50%;">
	            		<label>Wordsmith</label> <input type="radio" onclick="openCity('citizen-policy')" class="w3-radio" value="w" name="role"/>
	            	</div>
	            	<div class="w3-col" style="width: 50%; text-align: right;">
	            		<label>Explora</label> <input type="radio" onclick="openCity('explorer-policy')" class="w3-radio" value="r" name="role"/>
	            	</div>
	            	<br/>
	            	<br/>
	            	<div id="citizen-policy" class="w3-container explain w3-animate-left city">
						<p>
							You’re into reading and writing. You like to.<br>
							You’re what I call a word enthusiast.<br>
							We made a pretty good way for you to pen your thoughts.<br>
							We cooked some real cool features for you and still working on some.
						</p>
					</div>

					<div id="explorer-policy" class="w3-container explain w3-animate-right city">
						<p>
							Like me; you’re into reading. You also do a lil writing.<br>
							Such as status updates. But you not really into writing detailed content.<br>
							You expect to get that from Wordsmith.<br>
							We cooked some real cool features for you and still working on some.
						</p>
					</div>
	            </div>

	            <div class="form-group">
	            	<input type="password" class="input_style" name="txt_upass" placeholder="Password" />
	            </div>
	            <div class="clearfix"></div>

	            <div class="form-group">
	            	<input type="password" class="input_style" name="txt_upass" placeholder="Confirm Password" />
	            </div>

	            <div class="form-group" style="float: right;">
	            	<button type="submit" class="btn btn-primary" name="btn-signup">
	                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
	                </button>
	            </div>

	            
	            <label style="margin-top: 50px; letter-spacing: 2px;">have an account? <a href="login.php" class="sign-in">Sign In</a></label>
        	</fieldset>
        </form>
       </div>
</div>
</div>

<script type="text/javascript">
	openCity("note")
	function openCity(cityName) {
	    var i;
	    var x = document.getElementsByClassName("city");
	    for (i = 0; i < x.length; i++) {
	       x[i].style.display = "none";  
	    }
	    document.getElementById(cityName).style.display = "block";  
	}
</script>
</body>
</html>