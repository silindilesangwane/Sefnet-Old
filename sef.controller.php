<?php
  require_once("session.php");
  include "class.sef.php";
  require_once('dbconfig.php'); 
  $sf = new SEF();

	if(isset($_GET['like_sef_id']))
  {
  		$id = $_GET['like_sef_id'];
  		if($sf -> likeSef($id))
  		{
  			$url = "home.php";
        header("Location: $url");
  		}
  		else
  		{
  			echo "Problem occured while liking.";
  		}

  	}
    else if(isset($_GET['dislike_sef_id']))
    {
      $id = $_GET['dislike_sef_id'];
      if($sf -> dislikeSef($id))
      {
        $url = "home.php";
        header("Location: $url");
      }
      else
      {
        echo "Problem occured while disliking.";
      }
    }
    else if(isset($_GET['remove_like_sef_id']))
    {
        $id = $_GET['remove_like_sef_id'];
        if($sf -> removelikeSef($id))
        {
          $url = "home.php";
          header("Location: $url");
        }
        else
        {
          echo "Problem occured while liking.";
        }

      }
      else if(isset($_GET['remove_dislike_sef_id']))
     {
        $id = $_GET['remove_dislike_sef_id'];
        if($sf -> removeDislikeSef($id))
        {
          $url = "home.php";
          header("Location: $url");
        }
        else
        {
          echo "Problem occured while liking.";
        }

      }
      else if(isset($_GET['save_sef_id']))
      {
          
          $id = $_GET['save_sef_id'];
          if($sf -> saveSef($id))
          {
            $url = "home.php";
            header("Location: $url");
          }
          else
          {
            echo "Problem occured while liking.";
          }

      }
      else if(isset($_GET['unsave_sef_id']))
      {
          
          $id = $_GET['unsave_sef_id'];
          if($sf -> unSaveSef($id))
          {
            $url = "home.php";
            header("Location: $url");
          }
          else
          {
            echo "Problem occured while liking.";
          }

      }
      else if(isset($_GET['unsave_sef_id_from_saved_list']))
      {
          
          $id = $_GET['unsave_sef_id_from_saved_list'];
          if($sf -> unSaveSef($id))
          {
            $url = "saved_sefs.php";
            header("Location: $url");
          }
          else
          {
            echo "Problem occured while liking.";
          }

      }
?>