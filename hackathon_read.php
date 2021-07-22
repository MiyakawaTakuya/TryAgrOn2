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
    // $output = "";
    // foreach ($result as $record) {
    //     $output .= "<tr>";
    //     $output .= "<td>{$record["hackathon_name"]}</td>";
    //     $output .= "<td>{$record["event_date"]}</td>";
    //     $output .= "<td>{$record["event_location"]}</td>";
    //     $output .= "<td>{$record["pain"]}</td>";
    //     $output .= "<td>{$record["expectation"]}</td>";
    //     $output .= "<td>{$record["requirements"]}</td>";
    //     $output .= "<td>{$record["upper_limit"]}</td>";
    //     $output .= "<td>{$record["reward"]}</td>";
    //     $output .= "<td>{$record["join_place"]}</td>";
    //     $output .= "<td>{$record["created_at"]}</td>";
    //     $output .= "<td><img src=img/{$record["item_image"]}></td>";
    //     // edit deleteリンクを追

    //     // $output .= "<td>
    //     //                 <a href='./item_delete.php?item_id={$record["item_id"]}'>delete</a>
    //     //             </td>";
    //     $output .= "</tr>";
    // }
    // // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // // 今回は以降foreachしないので影響なし
    // unset($record);
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
    <link rel="stylesheet" href="css/home.css">
    <title>T r y A g r O n</title>
</head>

<body>
    <a href="hackathon_input.php">入力画面</a>

    <div class="main_body">
        <!-- 検索結果をここにカードタイプで吐き出す -->
        <div class="container">
            <div class="row" id="output"></div>
        </div>



    </div>

    <!-- <table>
        <thead>
            <tr>
                <th>ハッカソンハッカソン名</th>
                <th>開催予定日</th>
                <th>主催者</th>
                <th>課題</th>
                <th>期待すること</th>
                <th>参加条件</th>
                <th>参加者上限</th>
                <th>報酬・謝礼</th>
                <th>参加場所</th>
                <th>作成日</th>
            </tr>
        </thead>
    </table> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //検索結果の表示 カード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class="col-sm-3 my-3">
        <form action="book_details.php" method="get">
        <button type="submit" class="card" style="color: white; " >
            <img src="${x.img}" class="card-img-top" alt="...">

            <div class="card-body" style="max-width: 180px;">

            <h1 class="card-title" id="hackathon_name">イベント名:${x.hackathon_name}</h1>
            <h2 class="card-title" id="event_date">開催日時:${x.event_date}</h2>
            <h3 class="card-title" id="event_location">開催場所:${x.event_location}</h3>
            <h3 class="card-title" id="reward">報酬:${x.reward}</h3>
            <h3 class="card-title" id="upper_limit">上限人数:${x.upper_limit}</h3>
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