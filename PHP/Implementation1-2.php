<?php
require_once("./Connection/connection.php");

$sql = "SELECT 
    MAX(chinese) AS max, 
    MIN(chinese) AS min, 
    SUM(chinese) AS sum, 
    AVG(chinese) AS avg
  FROM test_table";

$stmt = $connection -> prepare($sql);
$stmt -> execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
echo "國文最高分 {$result['max']} </br>" ;
echo "國文最低分 {$result['min']} </br>" ;
echo "國文總分 {$result['sum']} </br>" ;
echo "國文平均值 {$result['avg']} </br>" ;
?>