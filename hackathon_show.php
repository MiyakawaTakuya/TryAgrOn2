<?php

// var_dump($_GET);
// exit();
include("functions.php");
session_start();
// check_session_id();

$pdo = connect_to_db();

$id = $_GET["id"];

$sql = 'SELECT * FROM events_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($_GET);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

// メインのイベント情報を表示
$main_post = "";
$main_post = "<p><img src={$record['img']}></p>";
$main_post .= "<p>ハッカソン名 {$record['hackathon_name']}</p>";
$main_post .= "<p>開催日 {$record['event_date']}</p>";
$main_post .= "<p>開催場所 {$record['event_location']}</p>";
$main_post .= "<p>解決したい課題 {$record['pain']}</p>";
$main_post .= "<p>期待するもの {$record['expectation']}</p>";
$main_post .= "<p>応募条件 {$record['requirements']}</p>";
$main_post .= "<p>参加者上限 {$record['upper_limit']}人</p>";
$main_post .= "<p>報酬 {$record['reward']}</p>";


$member_id = $_GET['id'];


$sql_member = 'SELECT * FROM members_table WHERE event_id=:member_id ';


$stmt_member = $pdo->prepare($sql_member);
$stmt_member->bindValue(':member_id', $member_id, PDO::PARAM_INT);
$status_member = $stmt_member->execute();

// var_dump($for_post_id);
// exit();
if ($status_member == false) {
    $error = $stmt_member->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt_member->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record_member) {
        $output .= "<div>";
        $output .= "<p>{$record_member["member_name"]}</p>";
        $output .= "<div>";
        $output .= "<p>{$record_member["created_at"]}</p>";
        $output .= "</div>";

        $output .= "</div>";

        unset($value);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- マテリアルアイコン -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/comment.css">

    <title>ハッカソン詳細ページ</title>
</head>

<body>
    <div class="warapper">

        <div class="header">


        </div>


        <!-- コメントされる側の投稿 -->
        <div class="posted_card">
            <!-- デザイン皆無です、お願いします -->
            <?= $main_post ?>
            <p class="posted_time"><?= $record['post_created_at'] ?></p>
        </div>

        <a href="./member_input.php?id=<?=$id?>">応募する</a>



        <!-- コメント表示 -->
        <div class="comment_area">
            <?= $output ?>
        </div>


    </div>

</body>


</html>