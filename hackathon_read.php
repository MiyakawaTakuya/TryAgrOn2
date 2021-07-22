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

<head id="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/7-2-1/css/7-2-1.css"> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <title>T r y A g r O n</title>
</head>
<!-- トップのメニューバー -->


<body>
    <header id="header">
        <h4>TryAgrOn</h4>
        <div class="menu">
            <nav class="menu">
                <ul id="g-navi" class="menu">
                    <li><a href="#area-1">About</a></li>
                    <li><a href="#area-2">Hackathon List</a></li>
                    <li><a href="#area-3">Hold Hackathon</a></li>
                    <li><a href="#area-4">Barchix</a></li>
                    <li><a href="#area-4">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <a href="hackathon_input.php">入力画面</a>
    <div class="bg_test">
        <div class="line">
            <div class="bg_test-text">
                TryAgrOn
            </div>
        </div>
    </div>
    <section id="area-1">
        <div>
            <h3>About</h3>
            <p>"TryAgrOn"とは？ 山口県が実施するトライアスロンのような農業系のハッカソンの略称である. </p>
            <p>Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
            <p>Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>

        </div>
        <!--/area1-->
    </section>
    <section id="area-2">
        <div>
            <h3>Hackathon List</h3>
        </div>
        <div class="main_body">
            <!-- 検索結果をここにカードタイプで吐き出す -->
            <div class="container">
                <div id="output"></div>
                <!-- class="row" -->
            </div>
        </div>
        <!--/area2-->
    </section>

    <section id="area-3">
        <div>
            <h3>Hold Hackathon</h3>
            <p>"TryAgrOn"は農業に関わる課題解決を求める方であれば, どなたでも開催することができます. </p>
            <p>Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
            <p>Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
        </div>
        <!--/area3-->
    </section>

    <section id="area-4">
        <div>
            <h3>Barchix</h3>
            <p>我々"Barchix"は,ITスキルを用いて地域の課題解決を目指すプロフェッショナル集団である. </p>
            <p>メンバーはaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
            <p>Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.</p>
        </div>
        <!--/area4-->
    </section>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        //検索結果の表示 カード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class=" my-3" >
        <form action="hackathon_show.php" method="get">
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