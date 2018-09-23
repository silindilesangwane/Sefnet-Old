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
		}
		
	}
	$sql = $auth_user->runQuery("SELECT * FROM interest");
	$sql->execute();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pick Interests</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="css/w3.css" type="text/css"  />
<style type="text/css">
    body{
        background-color: #071920 !important;
        color: #d9d9d9;
        padding: 2em;
    }
    .heading-style{
        font-family: "Good times";
        letter-spacing: 2px;
        font-size: 4.5vw;
        letter-spacing: 2px;
        font-size: 4.5vw;
        color: #027794;
        font-family: "Balkeno";
        margin-top: -20px;
        margin-bottom: -10px;
        text-transform: uppercase;
    }
    .choose-interest{
        width: 125px;
        margin-bottom: 10px;
        height: 60px;
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
    .btn-interests{
        background-color: #056;
        margin-right: 10px;
        height: 40px;
        width:80px;
        padding-top: 7px;
        font-family: "Myriad Pro" , sans-serif;
        letter-spacing: 2px;
        font-size: 20px;
        font-weight: 600;
        text-transform: uppercase;
        -moz-box-shadow: inset 0 0 20px #000000;
        -webkit-box-shadow: inset 0 0 20px #000000;
        box-shadow: inset 0 0 20px #000000;
    }
    .btn-interests:hover{
        color: #056;
        background-color: #fff;
    }
</style>
</head>

<body>
    <a href="home.php" class="back"><i class="fas fa-angle-left"></i>Back</a>
    <h1 class="w3-center heading-style">Add Interest</h1><hr>
    <?php if(count($myInterests) == 0) {?><h1>Welcome new user ! </h1>
    <p>Please choose your interest...</p> <?php } ?>

    <div class="clearfix"></div>
    	

<div class="container-fluid" style="margin-top:80px; margin-left:-10px; margin-right:-15px;">
	
    

    <?php

    		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) 
    		{
    			if(!in_array($row['id'], $myInterests))
    			{
    				?>
                    
            <span class="button-checkbox">
                <button type="button" class="btn choose-interest"  data-color="primary"><?php echo $row['interest_name']; ?></button>
                <input type="checkbox" value="<?php echo $row['id'];?>" name="num" class="hidden" />
            </span>
			<?php
    			}
    		
    		}

   		?>
        <br>
		<span class="btn w3-right btn-interests">Add</span>

</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$(document).on('click', '.btn-interests', function(e)
        {
            e.stopImmediatePropagation();
            e.preventDefault();
            
            var selected = [];                
            $("input:checkbox[name=num]:checked").each(function() 
            {
                selected.push($(this).val());
            });
            if(selected.length == 0)
            {
            	alert('Please select atleast one interest !');
            }
            else
            {
            	$.ajax
            	({
            		 url : 'logic.php',
            		 method : 'POST',
            		 data : {selected : selected, action : 'getInterests'},            		 
            		 success : function(data)
            		 {
            		 	if(data == 'success')
            		 	{
                            window.location.href = "home.php";
                                            
            		 	}
            		 },
            		 error : function(data)
            		 {
            		 	alert("Error: "+data);
            		 }
            	});
            }
        });
	});
</script>
<script type="text/javascript">
      $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
</script>
</body>
</html>