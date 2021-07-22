<?php

// session_start();
include("functions.php");
// check_session_id();

// $user_id = $_SESSION['id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM events_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td><img src='{$record["img"]}' height=150px></td>";
        $output .= "<td>{$record["hackathon_name"]}</td>";
        $output .= "<td>{$record["event_date"]}</td>";
        $output .= "<td>{$record["event_location"]}</td>";
        $output .= "<td>{$record["organizer_id"]}</td>";
        $output .= "<td>{$record["organizer_name"]}</td>";
        $output .= "<td>{$record["pain"]}</td>";
        $output .= "<td>{$record["expectation"]}</td>";
        $output .= "<td>{$record["requirements"]}</td>";
        $output .= "<td>{$record["upper_limit"]}</td>";
        $output .= "<td>{$record["reward"]}</td>";
        $output .= "<td>{$record["join_place"]}</td>";
        $output .= "<td><a href='events_delete.php?id={$record["id"]}'>delete</a></td>";

        $output .= "</tr>";
    }
    unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>ハッカソン一覧画面</title>
</head>

<body>
    <fieldset>
        <legend>ハッカソン一覧</legend>
        <a href="hackathon_input.php">入力画面</a>
        <a href="todo_logout.php">ログアウト</a>
        <table>
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
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>