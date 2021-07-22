<?php

include('./functions.php');
$pdo = connect_to_db();
// $dbn = 'mysql:dbname=YOUR_DB_NAME;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }



$sql = 'SELECT * FROM events_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["hackathon_name"]}</td>";
    $output .= "<td>{$record["event_date"]}</td>";
    $output .= "<td>{$record["event_location"]}</td>";
    $output .= "<td>{$record["pain"]}</td>";
    $output .= "<td>{$record["expectation"]}</td>";
    $output .= "<td>{$record["requirements"]}</td>";
    $output .= "<td>{$record["upper_limit"]}</td>";
    $output .= "<td>{$record["reward"]}</td>";
    $output .= "<td>{$record["join_place"]}</td>";
    $output .= "<td>{$record["created_at"]}</td>";
    $output .= "<td><img src=img/{$record["item_image"]}></td>";
    // edit deleteリンクを追
    
    // $output .= "<td>
    //                 <a href='./item_delete.php?item_id={$record["item_id"]}'>delete</a>
    //             </td>";
    $output .= "</tr>";
    }
  // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
    unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品表示</title>
</head>

<body>
    <a href="item_input.php">入力画面</a>
    <table>
        <thead>
            <tr>
            <th>ハッカソン名</th>
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
        <tbody>
            <?= $output ?>
        </tbody>
        </table>
</body>

</html>