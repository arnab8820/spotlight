<?php
  
  function check_login()
  {
    require "connect.php";
    if(isset($_COOKIE["session_id"]))
    {
      //login cookie is set, check authenticity
      $sql = "select * from user_detail where session_id=?";
      $stmnt = $dbhandler->prepare($sql);
      $stmnt->execute(array($_COOKIE["session_id"]));
      $data = $stmnt->fetchAll();
      if(count($data) > 0)
      {
        //1 row is selected
        if($data[0]["session_id"] == $_COOKIE["session_id"])
        {
          //User authenticated. Continue to home page
          session_start();
          $_SESSION["logged_in"] = 1;
          $_SESSION["user_id"] = $data[0]["user_id"];
          $_SESSION["username"] = $data[0]["email_id"];
          $_SESSION["firstname"] = $data[0]["first_name"];
          $_SESSION["middlename"] = $data[0]["middle_name"];
          $_SESSION["lastname"] = $data[0]["last_name"];
          $_SESSION["photo"] = $data[0]["photo_filename"];
          $_SESSION["user_type"] = $data[0]["user_type"];
          $_SESSION["detail_given"] = $data[0]["detail_given"];
          $_SESSION["upload_restricted"] = $data[0]["upload_restricted"];
          setcookie("session_id", $data[0]["session_id"], time()+86400, "/");
          if($_SESSION["user_type"] == 1)
          {
            //user is an admin
          }
          if ($_SESSION["user_type"] == 2)
          {
            //user is a normal user
            return 1;
          }
          //print_r($data);
        }
        else 
        {
          //redirect to login page
          return 0;
        }
      }
      else
      {
        //redirect to login page
        return 0;
      }
    }
    else
    {
      //redirect to login page
      return 0;
    }
  }
?>
