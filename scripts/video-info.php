<?php
require "connect.php";
$v = $_POST["v"];
$sql = "update `video_detail` set views = views + 1 where id=?";
$stmnt = $dbhandler->prepare($sql);
if($stmnt->execute(array($v)))
{
    $sql = "select * from video_detail where id=?" ;;
    $stmnt = $dbhandler->prepare($sql);
    $stmnt->execute(array($v));
    $data = $stmnt->fetchAll();
    echo json_encode($data[0]);
}


?>
