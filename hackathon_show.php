<?php
// var_dump($_GET);
// exit();
include("functions.php");


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
$main_post .= "<div class='show_box'>";
$main_post .= "<table>";
$main_post .= "<tr>";
$main_post .= "<td><h2>ハッカソン名</h2></td><td> <p>{$record['hackathon_name']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>開催日 </h2></td> <td><p>{$record['event_date']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>開催場所 </h2></td><td> <p>{$record['event_location']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>解決したい課題 </h2></td><td> <p>{$record['pain']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>期待するもの </h2></td><td> <p>{$record['expectation']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>応募条件 </h2></td><td> <p>{$record['requirements']}</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>参加者上限 </h2></td><td> <p>{$record['upper_limit']}人</p></td>";
$main_post .= "</tr>";
$main_post .= "<tr>";
$main_post .= "<td><h2>報酬 </h2> </td><td><p>{$record['reward']}</p><td>";
$main_post .= "</tr>";

$main_post .= "</table>";
$main_post .= "</div>";



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
        $output .= "<div><h3>{$record_member["member_name"]}</h3></div>";
        $output .= "<div><p class='small '>{$record_member["created_at"]}</p></div>";


        unset($value);
    }
}


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- マテリアルアイコン -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/show.css">

    <title>Hakathon Details</title>

</head>

<body class="body">
    <div id="particles-js"></div>
    <div id="wrapper">
        <div class="home">
            <a type="submit" class="text-secondary home" href="./hackathon_read.php?id=<?= $id ?>">ホーム画面に戻る</a>
        </div>

        <div class="header">
        </div>

        
        <!-- コメントされる側の投稿 -->
        <h1>Hakathon Details</h1>
        <div class="post">
            <?= $main_post ?>
            <p class="posted_time small"><?= $record['post_created_at'] ?></p>
        </div>

        <a type="submit" class="btn btn-info text-white" href="./member_input.php?id=<?= $id ?>">このハッカソンに応募します</a>
        <div class="mt-4"><h2>現状の参加メンバーリスト</h2></div>
        <div class="box">
            <?= $output ?>
        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="main.js"></script>
</body>


</html>