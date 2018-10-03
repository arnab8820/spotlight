<?php
require 'connect.php';
$sub = $_POST["sub"];
$sql = "select * from `video_detail` where subject=? order by `views` desc";
$stmnt = $dbhandler->prepare($sql);
$stmnt->execute(array($sub));
$data = $stmnt->fetchAll();
echo json_encode($data);
?>
