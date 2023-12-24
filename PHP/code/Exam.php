<?php
require_once('./function/DBConnectionHandler.php');

$serverName = "140.127.74.201:9001";
$userName = "root";
$password = "root";
$db = "bigdata";

try {
  DBConnectionHandler::setConnection(
    $serverName,
    $userName,
    $password,
    $db
  );
  $connection = DBConnectionHandler::getConnection();
  echo "success";
}catch(Exception $e){
  echo " ERROR ". $sql . "<br>". $e -> getMessage();
}


?>