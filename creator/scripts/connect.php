<?php

//database configuration
$host = "sql305.epizy.com";      //database host
$db = "epiz_22038220_database1";    //database name
$user = "epiz_22038220";           //database username
$pass = "testsite3";               //database password
$hdb = "mysql:host=".$host.";dbname=".$db;


//create connection
try{
  $dbhandler = new PDO($hdb, $user, $pass);
  $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
  echo $e->getMessage();
}

?>
