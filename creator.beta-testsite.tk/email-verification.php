<?php
  require 'scripts/connect.php';
  $email = $_GET["email"];
  $otp = $_GET["vcode"];
  $sql = "select * from signup_request where `email_id`=? and `otp`=?";
  $stmnt = $dbhandler->prepare($sql);
  $stmnt->execute(array($email, $otp));
  $data = $stmnt->fetchAll();
  if(count($data) == 1)
  {
    $email = $data[0]["email_id"];
    $password = $data[0]["password"];
    $sql = "insert into `user_detail` (`email_id`, `password`, `photo_filename`, `user_type`, `access_restricted`, `upload_restricted`) values(?,?,?,?,?,?)";
    $stmnt = $dbhandler->prepare($sql);
    $result = $stmnt->execute(array($email, $password, "default.jpg", "2", "0", "1"));
    $sql = "DELETE FROM `signup_request` WHERE `email_id`=?";
    $stmnt = $dbhandler->prepare($sql);
    $result2 = $stmnt->execute(array($email));
    if($result == 1 && $result2 == 1)
    {
      echo("<h4>Congratulations! Your mail id is verified!</h4>");
    }
    else {
      echo("there was an error!");
    }
  }
?>
