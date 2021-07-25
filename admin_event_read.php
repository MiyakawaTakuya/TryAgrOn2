<?php

session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['user_id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM events_table WHERE is_deleted = 0';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminevent.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <title>ハッカソンの編集画面</title>
</head>

<body>
    <div class="home">
        <a type="submit" class="text-secondary home" href="./hackathon_read.php">ホーム画面に戻る</a>
    </div>

    <h3>削除するハッカソンイベントをクリックして下さい</h3>
    <div class="container">
        <div id="output"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //検索結果の表示 カード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class="adminevents">
        <div class="my-3" >
        <form action="events_delete.php" method="get">
        <button type="submit" class="card" style="color: black; " >
        <div class="list">
            <div class="img">
            <img src="${x.img}" class="card-img-top" alt="...">
            </div>
            <div class="card-body text-start" >
            <h1 class="card-title" id="hackathon_name">イベント名:${x.hackathon_name}</h1>
            <h2 class="card-title" id="event_date">開催日時:${x.event_date}</h2>
            <h2 class="card-title" id="event_location">開催場所:${x.event_location}</h2>
            <h2 class="card-title" id="reward">報酬:${x.reward}</h2>
            <h2 class="card-title" id="upper_limit">上限人数${x.upper_limit}人</h2>   
            <input name="id" type="hidden" value="${x.id}">
            </div>
        </div>
        </button>  
        </div>
        </form>
        </div>
        </div>
        `)
        });
        $("#output").html(output_data);
        //カード型の挿入HTMLここまで
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"> </script>

</body>

</html>