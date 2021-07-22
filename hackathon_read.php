<?php

include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM events_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/7-2-1/css/7-2-1.css">
    <link rel="stylesheet" href="css/main.css">
    <title>T r y A g r O n</title>
</head>

<body>
    <a href="hackathon_input.php">入力画面</a>
    <div class="bg_test">
        <div class="bg_test-text">
            背景画像を設定します
        </div>
    </div>

    <div class="main_body">
        <!-- 検索結果をここにカードタイプで吐き出す -->
        <div class="container">
            <div class="row" id="output"></div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //検索結果の表示 カード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class="col-sm-3 my-3">
        <form action="hackathon_show.php" method="get">
        <button type="submit" class="card" style="color: black; " >
            <img src="${x.img}" class="card-img-top" alt="...">

            <div class="card-body" style="max-width: 180px;">

            <h1 class="card-title" id="hackathon_name">イベント名:${x.hackathon_name}</h1>
            <h2 class="card-title" id="event_date">開催日時:${x.event_date}</h2>
            <h3 class="card-title" id="event_location">開催場所:${x.event_location}</h3>
            <h3 class="card-title" id="reward">報酬:${x.reward}</h3>
            <h3 class="card-title" id="upper_limit">上限人数${x.upper_limit}人</h3>
            </div>
            <div>
            <input name="id" type="hidden" value="${x.id}">
            </div>
        </button>
        </form>
        </div>
        `)
        });
        $("#output").html(output_data);
        //カード型の挿入HTMLここまで
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"> </script>


</body>

</html>