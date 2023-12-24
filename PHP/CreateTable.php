<?
require_once("./Connection/connection.php");

$spl = "CREATE TABLE table1 (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
  name VARCHAR(20) NOT NULL,
  score INT(2) NOT NULL
);
";

try {
  $result = $connection -> exec($sql);
  echo $result;
}catch(PDOException $e){

}