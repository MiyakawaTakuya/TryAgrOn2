<?php

// session_start();
include("functions.php");
// check_session_id();

// $user_id = $_SESSION['id'];
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
// $output = "";
// foreach ($result as $record) {
//     $output .= "<tr>";
//     $output .= "<td><img src='{$record["img"]}' height=150px></td>";
//     $output .= "<td>{$record["hackathon_name"]}</td>";
//     $output .= "<td>{$record["event_date"]}</td>";
//     $output .= "<td>{$record["event_location"]}</td>";
//     $output .= "<td>{$record["organizer_id"]}</td>";
//     $output .= "<td>{$record["organizer_name"]}</td>";
//     $output .= "<td>{$record["pain"]}</td>";
//     $output .= "<td>{$record["expectation"]}</td>";
//     $output .= "<td>{$record["requirements"]}</td>";
//     $output .= "<td>{$record["upper_limit"]}</td>";
//     $output .= "<td>{$record["reward"]}</td>";
//     $output .= "<td>{$record["join_place"]}</td>";
//     $output .= "<td><a href='events_delete.php?id={$record["id"]}'>delete</a></td>";

//     $output .= "</tr>";
// }
// unset($value);
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminevent.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <title>ハッカソン一覧画面</title>
</head>

<body>
    <h2>削除するハッカソンイベントをクリックしてください。</h2>
    <div class="container">
        <div id="output"></div>
        <!-- class="row" -->
    </div>
    <!-- <fieldset>
        <legend>ハッカソン一覧</legend>
        <a href="hackathon_input.php">入力画面</a>
        <a href="todo_logout.php">ログアウト</a>
        <table border="1" class="table table-hover" class="table-responsive">
            <thead>
                <tr>
                    <th>ハッカソン名</th>
                    <th>開催予定日</th>
                    <th>開催場所</th>
                    <th>主催者ID</th>
                    <th>主催者</th>
                    <th>課題感</th>
                    <th>期待すること</th>
                    <th>参加条件</th>
                    <th>参加者上限</th>
                    <th>報酬・謝礼</th>
                    <th>参加場所</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </fieldset> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //検索結果の表示 カード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class="adminevents">
        <div class=" my-3" >
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
        // const output_delete_button = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        // data.forEach(function(x) {
        //     output_delete_button.push(`
        // <a href = 'events_delete.php?id="id"'> delete </a>  
        //         `)
        // });
        // $("#output_button").html(output_delete_button);
        //カード型の挿入HTMLここまで
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"> </script>

</body>

</html>