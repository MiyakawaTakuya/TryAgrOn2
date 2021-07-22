<?php

include('functions.php');
$pdo = connect_to_db();
// var_dump($_POST);
// exit;
if (
    // ハッカソン名
    !isset($_POST['hackathon_name']) || $_POST['hackathon_name'] == '' ||
    // 開催予定日
    !isset($_POST['event_date']) || $_POST['event_date'] == '' ||
    // 開催場所
    !isset($_POST['event_location']) || $_POST['event_location'] == '' ||
    // 主催者名
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
    !isset($_POST['join_place']) || $_POST['join_place'] == ''
    // 主催者id
    // !isset($_POST['organizer_id']) || $_POST['organizer_id'] == ''

) {
    echo json_encode(["error_msg" => "auth no input"]);
    exit();
}

// var_dump($_POST);
// exit;

// ハッカソン名
$hackathon_name = $_POST['hackathon_name'];
// 開催予定日
$event_date = $_POST['event_date'];
// 開催場所
$event_location = $_POST['event_location'];
// 主催者名
$organizer_name = $_POST['organizer_name'];
// 課題館
$pain = $_POST['pain'];
// 期待すること
$expectation = $_POST['expectation'];
// 参加条件
$requirements = $_POST['requirements'];
// 参加者上限
$upper_limit = intval($_POST['upper_limit']);
// 報酬・謝礼
$reward = $_POST['reward'];
// 参加方法
$join_place = $_POST['join_place'];
// 主催者id
$organizer_id = 1;//$_POST['organizer_id'];



// $dbn = 'mysql:dbname=gsacf_l05_06;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

$img = $_FILES['img']['name'];
$img_data="";

if(isset($_FILES['img'])&& $_FILES['img']['error']==0){
    // 送信時OK
    // 送信されてきたファイルの情報を取得
    $uploaded_file_name = $_FILES['img']['name'];
    $temp_path = $_FILES['img']['tmp_name'];
    $directory_path='./upload/';
    // ファイル名の準備
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis').md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
    if(is_uploaded_file($temp_path)){
      // ここでtmpファイルを移動する
    //   var_dump($temp_path);
    //   var_dump($filename_to_save);
    //   exit();
        if(move_uploaded_file($temp_path, $filename_to_save)){
            chmod($filename_to_save, 0644);
            $img_data = $filename_to_save;
        }else{
            exit('Error:アップロードできませんでした');
        }
    }else{
        exit('Error：画像がありません');
    }
}else{
        // 送信時エラー
    exit('Error:画像が送信されていません');
}

    // var_dump($filename_to_save);
    // exit();


$sql = 'INSERT INTO events_table(id, hackathon_name, event_date, event_location, organizer_id, organizer_name, pain, expectation, requirements,  upper_limit, reward, img, join_place, is_deleted, created_at, updated_at)VALUES(NULL, :hackathon_name, :event_date, :event_location, :organizer_id, :organizer_name, :pain, :expectation, :requirements,  :upper_limit, :reward, :img, :join_place, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':hackathon_name', $hackathon_name, PDO::PARAM_STR);
$stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
$stmt->bindValue(':event_location', $event_location, PDO::PARAM_STR);
$stmt->bindValue(':organizer_id', $organizer_id, PDO::PARAM_INT);
$stmt->bindValue(':organizer_name', $organizer_name, PDO::PARAM_STR);
$stmt->bindValue(':pain', $pain, PDO::PARAM_STR);
$stmt->bindValue(':requirements', $requirements, PDO::PARAM_STR);
$stmt->bindValue(':expectation', $expectation, PDO::PARAM_STR);
$stmt->bindValue(':upper_limit', $upper_limit, PDO::PARAM_INT);
$stmt->bindValue(':reward', $reward, PDO::PARAM_STR);
$stmt->bindValue(':join_place', $join_place, PDO::PARAM_STR);
$stmt->bindValue(':img', $img_data, PDO::PARAM_STR);

$status = $stmt->execute();
// var_dump($status);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:hackathon_read.php");
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

// join_place

// is_deleted INT(1)
// created_at  DATETIME
// updated_at  DATETIME