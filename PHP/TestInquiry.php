<?php
require_once("./Connection/connection.php");

$sql = "SELECT * FROM test_table";

$stmt = $connection -> prepare($sql);
$stmt -> execute();
$stmt -> setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt -> fetchAll() as $key => $value) {
  echo "id : {$value['id']} , name : {$value['name']} , math : {$value['math']} </br>" ;
}
?>