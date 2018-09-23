<?php

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    require_once("session.php");
  
    require_once('dbconfig.php');
  
   include "class.sefs.php";

  class SEF
  { 

    private $conn;
    
    public function __construct()
    {
      $database = new Database();
      $db = $database->dbConnection();         //database connection method
      $this->conn = $db;
      }
    
      public function index()
      {
        $stmt = $this->conn->prepare("SELECT * FROM sefstable ORDER BY id DESC ");
        
        $stmt->execute();        
        
        $sefs = $stmt->fetchAll(PDO::FETCH_ASSOC);   //return query results
        
        return $sefs;
      }

    public function fecthAllData()
    {
        $id = $_SESSION['user_session'];
        
        $stmt = $this->conn->prepare("SELECT interest_id FROM user_interests WHERE user_id =  '$id'");
        
        $stmt->execute();        
        
        $sefs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $sefs;
    }

    public function countLike($id)
    {
        $sef_id = $id;
        
        $stmt = $this->conn->prepare("SELECT * FROM sef_likes WHERE sef_id =  '$sef_id'");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }
    public function removelikeSef($id)
    {
        $marker_id = $_SESSION['user_session'];
        
        $id = $id;
        
        $sql = "DELETE FROM sef_likes WHERE sef_id='$id' AND marker_id = '$marker_id'";
        
        $stmt = $this->conn->exec($sql);
        
        if($stmt)
        {
          return true;
        }
        
        else
        {
          return "Problem Occured";
        }
    }
    public function removeDislikeSef($id)
    {
        $marker_id = $_SESSION['user_session'];
        
        $id = $id;
        
        $sql = "DELETE FROM sef_dislikes WHERE sef_id ='$id' AND marker_id = '$marker_id'";
        
        $stmt = $this->conn->exec($sql);
        
        if($stmt)
        {
          return true;
        }
        else
        {
          return "Problem Occured";
        }
    }

    public function checkIfILiked($id)
    {
        $sef_id = $id;
        $marker_id = $_SESSION['user_session'];
        $stmt = $this->conn->prepare("SELECT * FROM sef_likes WHERE marker_id =  '$marker_id' AND sef_id = '$id'");
        $stmt->execute();        
        return $stmt->rowCount();
    }

    public function checkIfISaved($id)
    {
        $sef_id = $id;
        
        $saver_id = $_SESSION['user_session'];
        
        $stmt = $this->conn->prepare("SELECT * FROM saved_sefs WHERE saver_id =  '$saver_id' AND sef_id = '$id'");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }
    public function displaySavedSefs()
    {
        $saver_id = $_SESSION['user_session'];
        
        $stmt = $this->conn->prepare("SELECT * FROM saved_sefs WHERE saver_id =  '$saver_id'");
        
        $stmt->execute();        
        
        if($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        else
        {
            return "No saved Sefs yet, Click on 'save' posts at the Sef you would like to save to save it ! ";
        }
    }
    
    public function displaySavedSefsTitle($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sefstable WHERE id =  '$id'");
        
        $stmt->execute();        
        
        if($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        else
        {
            return "No saved Sefs yet, Click on 'save' posts at the Sef you would like to save to save it ! ";
        }
    }
    
    public function saveSef($id)
    {
        $saver_id = $_SESSION['user_session'];
        
        $date_now = date("Y-m-d h:i:s");
        
        $sef_id = $id;
        
        $stmt = $this->conn -> prepare("INSERT INTO saved_sefs(sef_id, saver_id, date_created) VALUES(:sef_id, :saver_id, :date_now)");
        
        $stmt->bindParam(':sef_id', $sef_id);
        
        $stmt->bindParam(':saver_id', $saver_id);
        
        $stmt->bindParam(':date_now', $date_now);
        
        if($stmt->execute())
          
          return true;
        
        else
          
          return false;
    }
    
    public function unSaveSef($id)
    {
        $saver_id = $_SESSION['user_session'];
        
        $id = $id;
        
        $sql = "DELETE FROM saved_sefs WHERE sef_id ='$id' AND saver_id = '$saver_id'";
        
        $stmt = $this->conn->exec($sql);
        
        if($stmt)
        {
          return true;
        }
        
        else
        {
          return "Problem Occured";
        }
    }
    
    public function countSefSaves($id)
    {
        $sef_id = $id;
        
        $stmt = $this->conn->prepare("SELECT * FROM saved_sefs WHERE sef_id =  '$sef_id'");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }
    
    public function countIfAnySefSaved()
    {
        $saver_id = $_SESSION['user_session'];
        
        $stmt = $this->conn->prepare("SELECT * FROM saved_sefs WHERE saver_id =  '$saver_id '");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }
    public function likeSef($id)
    {
        $marker_id = $_SESSION['user_session'];
        
        $date_now = date("Y-m-d h:i:s");
        
        $sef_id = $id;
        
        $stmt = $this->conn -> prepare("INSERT INTO sef_likes(sef_id, marker_id, date_now) VALUES(:sef_id, :marker_id, :date_now)");
        
        $stmt->bindParam(':sef_id', $sef_id);
        
        $stmt->bindParam(':marker_id', $marker_id);
        
        $stmt->bindParam(':date_now', $date_now);
        
        if($stmt->execute())
          
          return true;
        
        else
          
          return false;
    }
    public function countDisLike($id)
    {
        $sef_id = $id;
        
        $stmt = $this->conn->prepare("SELECT * FROM sef_dislikes WHERE sef_id =  '$sef_id'");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }
     public function checkIfIDisliked($id)
    {
        $sef_id = $id;
        
        $marker_id = $_SESSION['user_session'];
        
        $stmt = $this->conn->prepare("SELECT * FROM sef_dislikes WHERE marker_id =  '$marker_id' AND sef_id = '$id'");
        
        $stmt->execute();        
        
        return $stmt->rowCount();
    }

    public function dislikeSef($id)
    {
        $marker_id = $_SESSION['user_session'];
        
        $date_now = date("Y-m-d h:i:s");
        $sef_id = $id;
        $stmt = $this->conn -> prepare("INSERT INTO sef_dislikes(sef_id, marker_id, date_now) VALUES(:sef_id, :marker_id, :date_now)");
        $stmt->bindParam(':sef_id', $sef_id);
        $stmt->bindParam(':marker_id', $marker_id);
        $stmt->bindParam(':date_now', $date_now);
        
        if($stmt->execute())
          return true;
        else
          return false;
    }
    public function insertComments($sef_id, $comment_content)
    {
        $sender_id = $_SESSION['user_session'];
        $date_created = date("Y-m-d h:i:s");
        $comment_content = $comment_content;
        $sef_id = $sef_id;


        $stmt = $this->conn -> prepare("INSERT INTO sef_comments(sender_id, sef_id, comment_content, date_created, date_modified)   
                                        VALUES(:sender_id, :sef_id, :comment_content, :date_created, :date_modified)");

        $stmt->bindParam(':sender_id', $sender_id);
        $stmt->bindParam(':sef_id',  $sef_id);
        $stmt->bindParam(':comment_content', $comment_content);
        $stmt->bindParam(':date_created', $date_created);
        $stmt->bindParam(':date_modified', $date_created);

        if($stmt->execute())
          return true;
        else
          return false;
    }

    public function displaySef($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sefstable WHERE id = '$id'");
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Such Sef is no longer existing, maybve it have been removed by it's writer ! ";
        }
    }
    public function displaySefComment($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sef_comments WHERE sef_id = '$id'");
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return "Such Sef is no longer existing, maybve it have been removed by it's writer ! ";
        }
    }
    public function countSefComments($id)
    {
        $sef_id = $id;
        $stmt = $this->conn->prepare("SELECT * FROM sef_comments WHERE sef_id =  '$sef_id'");
        $stmt->execute();        
        return $stmt->rowCount();
    }
    public function checkSefComments($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sef_comments WHERE sef_id = '$id'");
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function displayWriterName($id)
    {
        $w_id = $id;
        $stmt = $this->conn->prepare("SELECT user_firstname, user_lastname FROM users WHERE id =  '$w_id'");
        $stmt->execute();        
        if($stmt->rowCount() == 1)
        {
          while($row = $stmt->fetch(PDO::FETCH_ASSOC))
          {
            $user = $row['user_firstname']." ".$row['user_lastname'];
          }
        }
        else
        {
          $user = "User";
        }
        return $user;
    }

    public function runQuery($sql)
    {
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    public function store($interest_id, $writer_id, $sef_title, $sef_content)
    {
          $errorsInsertingSef = array();
          if(empty($sef_title))
          {
              $errorsInsertingSef[] = "Sef title  is required";
          }
          else
          {
              if(strlen($sef_title) < 100)
              {
                  $sef_title = $sef_title;
              }
              else
              {
                  $errorsInsertingSef[] = "Sef title is greater than 100";
              }          
          }
          if(empty($sef_content))
          {
              $errorsInsertingSef[] = "Sef Content is required";
          }
          else
          {
              $sef_content = $sef_content;
          }

          if(count($errorsInsertingSef)== 0)
          {
              $date_created = date("Y-m-d h:i:s");
              $date_modified = date("Y-m-d h:i:s");
              $writer_id = $_SESSION['user_session'];
              $interest_id = $interest_id;
              try
              {
                $stmt = $this->conn ->prepare("INSERT INTO sefstable(interest_id, writer_id, sef_title, sef_content, date_created, date_modified)       
                                            VALUES(:interest_id, :writer_id, :sef_title, :sef_content, :date_created, :date_modified)");                  
                 $stmt->bindparam(":interest_id", $interest_id);
                 $stmt->bindparam(":writer_id", $writer_id);
                 $stmt->bindparam(":sef_title", $sef_title);
                 $stmt->bindparam(":sef_content", $sef_content); 
                 $stmt->bindparam(":date_created", $date_created); 
                 $stmt->bindparam(":date_modified", $date_modified);             
                 if($stmt->execute())
                 {
                    return true;
                 } 
         
                  
             }
             catch(PDOException $e)
             {
                 echo $e->getMessage();
             }
          }
          else
          {
            return $errorsInsertingSef;
          }
      }
  }
?>