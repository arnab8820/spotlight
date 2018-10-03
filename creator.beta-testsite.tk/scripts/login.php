<?php
require "connect.php";
$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = "select * from user_detail where email_id=? and password=?";
$stmnt = $dbhandler->prepare($query);
$stmnt->execute(array($username, $password));
$data = $stmnt->fetchAll();
if(count($data) < 1 )
{
  $return["success"] = 0;
  $return["user_id"] = "";
  $return["email_id"] = "";
  $return["first_name"] = "";
  $return["middle_name"] = "";
  $return["last_name"] = "";
  $return["photo_filename"] = "";
  $return["youtube_url"] = "";
  $return["access_restricted"] = "";
  $return["upload_restricted"] = "";
  $return["message"] = "Invalid Email id or Password";
  echo json_encode($return);
}
else {
  //print_r($data[0]);
  do {
    $session_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 12);
    $query = "select * from user_detail where session_id=?";
    $stmnt = $dbhandler->prepare($query);
    $stmnt->execute(array($session_id));
    $row = $stmnt->fetchAll();
  } while (count($row) != 0);
  $query = "update user_detail set session_id=? where user_id=?";
  $stmnt = $dbhandler->prepare($query);
  $stmnt->execute(array($session_id, $data[0]["user_id"]));
  setcookie("session_id", $session_id, time()+86400, "/");
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
  $return["success"] = 1;
  $return["user_id"] = $data[0]["user_id"];
  $return["email_id"] = $data[0]["email_id"];
  $return["first_name"] = $data[0]["first_name"];
  $return["middle_name"] = $data[0]["middle_name"];
  $return["last_name"] = $data[0]["last_name"];
  $return["photo_filename"] = $data[0]["photo_filename"];
  $return["youtube_url"] = $data[0]["youtube_url"];
  $return["access_restricted"] = $data[0]["access_restricted"];
  $return["upload_restricted"] = $data[0]["upload_restricted"];
  $return["message"] = "Logged In";
  echo json_encode($return);
}

?>
