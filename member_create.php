<?php

include('functions.php');
$pdo = connect_to_db();

// var_dump($_POST);
// exit();

if (
    // 氏名
    !isset($_POST['member_name']) || $_POST['member_name'] == '' ||
    // メールアドレス
    !isset($_POST['email']) || $_POST['email'] == '' ||
    // 年齢
    !isset($_POST['age']) || $_POST['age'] == '' ||
    // 意気込み
    !isset($_POST['passion']) || $_POST['passion'] == ''||
    // ハッカソンid
    !isset($_POST['event_id']) || $_POST['event_id'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$member_name = $_POST['member_name'];
$passion = $_POST['passion'];
$event_id = $_POST['event_id'];
$age = $_POST['age'];

// $dbn = 'mysql:dbname=gsacf_l05_06;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }


$sql = 'INSERT INTO members_table(id, event_id, member_name, email,age, passion, is_deleted, created_at, updated_at) VALUES(NULL, :event_id, :member_name, :email,:age, :passion, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':event_id', $event_id, PDO::PARAM_STR);
$stmt->bindValue(':member_name', $member_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':passion', $passion, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:hackathon_show.php?id={$event_id}");
    exit();
}


// user_id   INT INT(12) 主キー

// user_name VARCHAR(32)
// rubi_name VARCHARA(32)
// email VARCHARA(32)
// tel VARCHARA(11)
// age INT(2)
// password VARCHARA(32)

// is_deleted INT(1)
// created_at  DATETIME
// updated_at  DATETIME
