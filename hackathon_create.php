<?php
var_dump($_POST);
exit;
include('./functions.php');
$pdo = connect_to_db();

if (
    // ハッカソン名
    !isset($_POST['hackathon_name']) || $_POST['hackathon_name'] == '' ||
    // 開催予定日
    !isset($_POST['event_date']) || $_POST['event_date'] == '' ||
    // 開催場所
    !isset($_POST['event_location']) || $_POST['event_location'] == '' ||
    // 主催者
    !isset($_POST['organizer_name']) || $_POST['organizer_name'] == '' ||
    // 課題館
    !isset($_POST['pain']) || $_POST['pain'] == '' ||
    // 期待すること
    !isset($_POST['expectation']) || $_POST['expectation'] == '' ||
    // 参加条件
    !isset($_POST['requirements']) || $_POST['requirements'] == '' ||
    // 参加者上限
    !isset($_POST['upper_limit']) || $_POST['upper_limit'] == '' ||
    // 報酬・謝礼
    !isset($_POST['reward']) || $_POST['reward'] == '' ||
    // 参加方法
    !isset($_POST['place']) || $_POST['place'] == ''

) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// $dbn = 'mysql:dbname=gsacf_l05_06;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }


$sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, updated_at) VALUES(NULL, :todo, :deadline, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:todo_input.php");
    exit();
}

// event_id   INT INT(12) 主キー
// hackathon_name  VARCHAR(32) 
// event_date  VARCHAR(32)
// event_location  VARCHAR(32)
// organizer_id  INT(12)     ←不要
// organizer_name  VSRCHAR(64)
// pain  VARCHAR(255)
// expectation  VARCHAR(128)
// requirements  VARCHAR(255)
// upper_limit INT(2)
// reward  VARCHAR(128)
// img VARCHAR(128)   イメージ画像

// place

// is_deleted INT(1)
// created_at  DATETIME
// updated_at  DATETIME