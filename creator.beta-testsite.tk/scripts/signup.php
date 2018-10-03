<?php
  require 'connect.php';
  $email = $_POST["username"];
  $password = md5($_POST["password"]);
  $sql = "select * from `user_detail` where email_id=?";
  $stmnt = $dbhandler->prepare($sql);
  $stmnt->execute(array($email));
  $row = $stmnt->fetchAll();
  if(count($row) == 0)
  {
    $sql = "select * from `signup_request` where email_id=?";
    $stmnt = $dbhandler->prepare($sql);
    $stmnt->execute(array($email));
    $row = $stmnt->fetchAll();
    if(count($row) > 0)
    {
      echo(json_encode(array("error" => true, "message" => "This Email id already exists.")));
      die;
    }
  }
  else {
    echo(json_encode(array("error" => true, "message" => "This Email id already exists.")));
    die;
  }
  $otp = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
  $sql = "INSERT INTO `signup_request` (`email_id`, `password`, `otp`) VALUES (?, ?, ?)";
  $stmnt = $dbhandler->prepare($sql);
  $result = $stmnt->execute(array($email, $password, $otp));
  if($result == true)
  {
    echo(json_encode(array("error" => false, "email" => $email, "otp" => $otp)));
  }
  else {
    echo(json_encode(array("error" => true, "message" => "Error adding to database")));
  }
?>
