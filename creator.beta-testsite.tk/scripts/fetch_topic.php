<?php
require 'connect.php';
$sql = "select * from `topic_list`";
$stmnt = $dbhandler->prepare($sql);
$stmnt->execute();
$data = $stmnt->fetchAll();
echo(json_encode($data));
?>