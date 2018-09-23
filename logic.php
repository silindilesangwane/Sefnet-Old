<?php
	session_start();
	require_once('dbconfig.php');
	$database = new Database();
	$db = $database->dbConnection();

	if($_POST['action'] == 'getInterests')
	{

		$selected = $_POST['selected'];
		$user_id = $_SESSION['user_session'];;
		try 
        {
		    $db->beginTransaction();
		    for ($i=0; $i < count($selected); $i++) 
			{ 
				$db->exec("INSERT INTO user_interests(user_id, interest_id) VALUES ('$user_id', '$selected[$i]')");
			}
			// commit the transaction
		    $db->commit();
		    echo "success";
		}
		catch(PDOException $e)
	    {
		    // roll back the transaction if something failed
		    $conn->rollback();
		    echo "Error: " . $e->getMessage();
	    }
	}
?>