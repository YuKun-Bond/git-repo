<?php
require_once("./Connection/connection.php");

$sql = "SELECT *
        FROM test_table
        GROUP BY name
        ORDER BY chinese DESC
        ";

$stmt = $connection -> prepare($sql);
$stmt -> execute();
$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key => $value) {
  echo "{$value['chinese']} </br>";
}
?>