<?php

 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	public function diplayUser()
	{
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM users_details WHERE user_id = '$user_id'");
		$stmt->execute();
		if($stmt->rowCount() == 1)
		{
			$arrayOfRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	        return $arrayOfRows;
		}
		else
		{
			return false;
		}
	}

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function update($user_id, $umail, $user_firstname, $user_lastname, $gender, $dob, $role, $upass, $bio, $occupation)
	{
		try
		{
			$date_modified = date("Y-m-d H-i-s");
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			$sql = "UPDATE users SET user_email = '$umail', user_lastname = '$user_lastname', user_lastname='$user_lastname', gender = '$gender', dob = '$dob', date_modified ='$date_modified', role = '$role', user_pass = '$new_password'  WHERE id='$user_id'";
			$stmt = $this->conn->prepare($sql);
		    if($stmt->execute())
		    {
		    	$sql = "UPDATE users_details SET bio = '$bio', occupation = '$occupation', date_modified ='$date_modified' WHERE user_id='$user_id'";
				$stmt = $this->conn->prepare($sql);
			    $stmt->execute();
			    return $stmt;
			}
		}
		catch(PDOException $e)
		{
			echo "Error: ".$e->getMessage();
		}
	}
	
	public function register($umail, $user_firstname, $user_lastname, $gender, $dob, $country, $role, $upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			$status = "active";
			$date_created = date("Y-m-d H-i-s");
			$date_modified = date("Y-m-d H-i-sa");

			$stmt = $this->conn->prepare("INSERT INTO users(user_email, user_firstname, user_lastname, gender, dob, status, date_created, date_modified, country, role, user_pass) 
		                                 		VALUES(:umail, :user_firstname, :user_lastname, :gender, :dob, :status, :date_created, :date_modified, :country, :role, :upass)");
												  
			
			$stmt->bindparam(":umail", $umail);	
			$stmt->bindparam(":user_firstname", $user_firstname);
			$stmt->bindparam(":user_lastname", $user_lastname);
			$stmt->bindparam(":gender", $gender);		
			$stmt->bindparam(":dob", $dob);	
			$stmt->bindparam(":status", $status);	
			$stmt->bindparam(":date_created", $date_created);	
			$stmt->bindparam(":date_modified", $date_modified);	
			$stmt->bindparam(":country", $country);	
			$stmt->bindparam(":role", $role);		
			$stmt->bindparam(":upass", $new_password);								  
				
			$stmt->execute();	
			$_SESSION['user_session'] = $this->conn->lastInsertId();
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, user_email, user_pass FROM users WHERE user_email=:umail");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo "Error occured: ".$e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>