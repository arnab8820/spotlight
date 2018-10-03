<?php
require 'connect.php';
session_start();
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$gender = $_POST["gender"];
$photo = $_FILES["photo"]['tmp_name'];
$temp = explode("@", $_SESSION["username"], 2);
$path_parts = pathinfo($_FILES["photo"]['name']);
$ext = $path_parts['extension'];
$allowed =  array('gif','png' ,'jpg');
if(!in_array($ext,$allowed))
{
	echo(json_encode(array('error' => true, 'message' => "Please choose a valid image file!")));
}

$photo_filename = $temp[0].".".$ext;
$destpath = "../images/user/".$photo_filename;
$result1 = move_uploaded_file($photo, $destpath);


$sql = "update `user_detail` set `first_name`=?, `middle_name`=?, `last_name`=?, `gender`=?, `photo_filename`=?, `upload_restricted`=\"0\", `detail_given`=\"1\" where `user_id`=?";
$stmnt = $dbhandler->prepare($sql);
$result2 = $stmnt->execute(array($firstname, $middlename, $lastname, $gender, $photo_filename, $_SESSION["user_id"]));
if($result1 == true && $result2 == true)
{
	echo(json_encode(array('error' => false, 'message' => "Details saved successfully!")));
}
else
{
	echo(json_encode(array('error' => true, 'message' => "There was an error!")));
}
?>