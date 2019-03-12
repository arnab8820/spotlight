<?php
  require 'connect.php';
  session_start();

  $userid = $_SESSION["user_id"];
  $session_id = "";
  $query = "update user_detail set session_id=? where user_id=?";
  $stmnt = $dbhandler->prepare($query);
  $stmnt->execute(array($session_id, $userid));
  setcookie("session_id", $session_id, time()+1, "/");
  session_destroy();
  header('location: ../index.php');
?>
