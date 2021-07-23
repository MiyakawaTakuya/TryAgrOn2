<?php

include('functions.php');
session_start();
$pdo = connect_to_db();

// var_dump($_POST);
// exit();
if (
    // 氏名
    !isset($_POST['user_name']) || $_POST['user_name'] == '' ||
    // フリガナ
    !isset($_POST['rubi_name']) || $_POST['rubi_name'] == '' ||
    // メールアドレス
    !isset($_POST['email']) || $_POST['email'] == '' ||
    // 電話番号
    !isset($_POST['tel']) || $_POST['tel'] == '' ||
    // 年齢
    !isset($_POST['age']) || $_POST['age'] == '' ||
    // パスワード
    !isset($_POST['password']) || $_POST['password'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$user_name = $_POST['user_name'];
$rubi_name = $_POST['rubi_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$age = $_POST['age'];
$password = $_POST['password'];

$sql = 'INSERT INTO users_table(id, user_name, rubi_name, email, tel, age, password, is_deleted, created_at, updated_at) VALUES(NULL, :user_name, :rubi_name, :email, :tel, :age, :password,0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':rubi_name', $rubi_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:users_input.php");
    exit();
}

if(!$val){
    echo('ログイン情報に誤りがあります');
    echo ('<a href="user_login.php">login</a>');
    exit();
}else{
    $_SESSION['session_id']= session_id();
    $_SESSION['is_deleted']= $val['is_deleted'];
    $_SESSION['user_name']= $val['user_name'];
    $_SESSION['user_id']= $val['id'];
    header('Location:./admin_event_read.php');
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
