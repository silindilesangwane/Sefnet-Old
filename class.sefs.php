<?php
require_once('dbconfig.php');  

class SefsClass 
{
        public $id;
        public $sef_content;
        public $sef_title;
        public $date_created;

        private $conn;
                
        public function __construct()
        {
                $database = new Database();
                $db = $database->dbConnection();
                $this->conn = $db;
        }

        public function PrintMe()
        {
                $user_id = $this->writer_id;
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = '$user_id'");
                $stmt -> execute();
                $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                if($stmt->rowCount() == 1)
                {
                        $writer = $row['user_firstname']." ".$row['user_lastname'];
                }
                else
                {
                        $writer = "User left Sefnet";
                }

                echo "<h1>" . $this->sef_title . "</h1>";
                echo "<p> ". $this->sef_content . "</p>";
                echo "By: ".$writer."<small>(Created on:". $this->date_created . ")</small>";
                echo "<h4><i class='glyphicon glyphicon-thumbs-up'></i> | <i class='glyphicon glyphicon-thumbs-down'></i> | <i class='glyphicon glyphicon-eye-open'></i> | <i class='glyphicon glyphicon-share'></i></h3>";

        }
}
?>