<?php
require_once('./code/function/DBConnectionHandler.php');

$serverName = "140.127.74.201:9001";
$userName = "root";
$password = "root";
$db = "bigdata";


DBConnectionHandler::setConnection(
  $serverName,
  $userName,
  $password,
  $db
);
$connection = DBConnectionHandler::getConnection();

// 1.1
$sql = "SELECT COUNT(DISTINCT dp001_review_sn) AS result
        FROM edu_bigdata_imp1
        WHERE PseudoID =:ID
        ";
$stmt = $connection -> prepare($sql);
$stmt -> bindValue(':ID', 39);
$stmt -> execute();
$r = $stmt -> fetchAll(PDO::FETCH_ASSOC);
print_r($r);

// 1.2
$sql = "SELECT COUNT(DISTINCT dp001_exam_video_exam_sn) AS result
        FROM edu_bigdata_imp1
        WHERE PseudoID = :ID";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID', 39);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 2.1
$sql = "SELECT DISTINCT dp001_video_item_sn, dp001_indicator
        FROM edu_bigdata_imp1
        WHERE PseudoID = :ID";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID', 281);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 2.2
$sql = "SELECT COUNT(*) AS result
        FROM edu_bigdata_imp1
        WHERE PseudoID = :ID
        AND dp001_prac_binary_res = 1
        AND dp001_prac_score_rate = 100";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID', 281);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 3.1
$sql = "SELECT COUNT(*) AS result
        FROM edu_bigdata_imp1
        WHERE PseudoID = :ID
        AND dp001_record_plus_view_action = 'paused'";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID', 71);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 3.2
$sql = "SELECT DISTINCT DATE_FORMAT(FROM_UNIXTIME(dp001_prac_start_time), '%Y-%m-%d') AS entry_date
        FROM edu_bigdata_imp1
        WHERE PseudoID = :ID";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID', 71);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 4.1
$sql = "SELECT dp001_video_item_sn, COUNT(*) AS view_count
        FROM edu_bigdata_imp1
        WHERE dp001_video_item_sn IS NOT NULL
        GROUP BY dp001_video_item_sn
        ORDER BY view_count DESC
        LIMIT 1";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 4.2
$sql = "SELECT COUNT(*) AS result
        FROM edu_bigdata_imp1
        WHERE dp002_extensions_alignment = '十二年國民基本教育類'";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 4.3
$sql = "SELECT dp002_verb_display_zh_TW, COUNT(*) AS action_count
        FROM edu_bigdata_imp1
        WHERE dp002_verb_display_zh_TW IS NOT NULL
        GROUP BY dp002_verb_display_zh_TW
        ORDER BY action_count DESC
        LIMIT 3";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

// 4.4
$sql = "SELECT COUNT(*) AS result
        FROM edu_bigdata_imp1
        WHERE dp002_extensions_alignment = '校園職業安全'";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

?>