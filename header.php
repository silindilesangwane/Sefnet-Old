<!doctype html>
<html>
<head>
<link href="css/w3.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style>
  .downLine{
    border-bottom:5px solid #E99408;

  }

   .active:hover{
   background-color: red;
 }
 .shouts{
  padding-right: 12px;
 }
 .add_interest:hover{
    background-color: #027794;
    color: white;
 }

 a:link{
  text-decoration: none;
 }

  input[type=text]:focus{
    width: 200%;
  }

  .w3-dropdown-content{

  }
  .w3-bar-item{
    background-color: #0d2f3d;
    color: #fff;

  }
  .w3-bar-item:hover{
    background-color: #ff9900 !important;

  }
  #navbar{
    background-color: #0d2f3d;
    color: #b3b3b3;
  }
  .a-hover:hover{
    color: #ff9900;
    font-weight: bold;
  }
  .a-hover:active{
    color: #ff9900;
    font-weight: bold;
  }
  .a-hover:focus{
    color: #ff9900;
    font-weight: bold;
  }
  .header-btn:hover{
    background-color: transparent !important;
    color: #ff9900 !important;

</style>
</head>
<body>
    <div class="header">
      <img src="images/bgcolor.jpg" class="img-responsive" style=" width: 100%;">
    </div>
	  
     <div class="w3-container downLine w3-navbar">
        <div class="w3-row"> 

      <div class="w3-dropdown-hover">
          <button onclick="myFunction()" class="w3-button header-btn"  style="position: absolute; top: 1%; right: 1%; border: none; padding: 5px; background-color: transparent; color: white; font-size: 15px;"><i class="fa fa-ellipsis-v"></i></button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block" style="position: absolute; top: 4.5%; right: 1%;">
              <a href="my_interest.php" class="w3-bar-item">My Interests</a>
              <a href="interest.php" class="w3-bar-item"</span>Add Interest</a>
              <div class="container-fluid" style="border-top:1px solid #b3b3b3;"></div>
              <a href="logout.php?logout=true" class="w3-bar-item w3-center w3-white"><i class="fas fa-sign-out-alt"></i> Sign-out</a>
            </div>
      </div>
   </div>
   <!-- Laptop view -->
  <div class="w3-row w3-hide-small w3-hide-medium"  id="navbar" style="margin-left:-2%; margin-right:-2%;">
    <div class="">
      <a href="home.php" class="a-hover"><div class="w3-col w3-center w3-large" style="width:33%; padding: 1.5%;">Sef </div></a>
      <a href="following.php" class="a-hover"><div class="w3-col w3-center w3-large" style="width:33%; padding: 1.5%;">Following</div></a>
      <a href="profile.php" class="a-hover"><div class="w3-col w3-center w3-large" style="width:33%; padding: 1.5%;">Account</div></a>

    </div>
  </div>
  <!-- Tablet view -->
  <div class="w3-row w3-hide-small w3-hide-large" id="navbar" style="margin-left: -3%; margin-right: -3%;">
    <div class="">
      <a href="home.php" class="a-hover"><div class="w3-col w3-center w3-medium" style="width:33%; padding: 2%;">Sef </div></a>
      <a href="following.php" class="a-hover"><div class="w3-col w3-center w3-medium" style="width:33%; padding: 2%;">Following</div></a>
      <a href="profile.php" class="a-hover"><div class="w3-col w3-center w3-medium" style="width:33%; padding: 2%;">Account</div></a>

    </div>
  </div>

    <!-- smartphone view -->
    <div class="w3-container w3-hide-large w3-hide-medium" id="navbar" style="margin-left: -11% ; margin-right: -11%; margin-bottom: -.1%;">
    <div class="" >
      <a href="home.php" class="a-hover"><div class="w3-col w3-padding-16 w3-small" style="width:33%;">Sef </div></a>
      <a href="following.php" class="a-hover"><div class="w3-col w3-padding-16 w3-small" style="width:33%;">Following</div></a>
      <a href="profile.php" class="a-hover"><div class="w3-col w3-padding-16 w3-small" style="width:33%;">Account</div></a>

    </div>
  </div> 
</div>

<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
</body>
</html>