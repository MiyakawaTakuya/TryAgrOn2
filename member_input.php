<?php

$id = $_GET["id"];
// var_dump($id);
// exit();




?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>申し込みフォーム</title>
</head>

<body class="bg-light">
    <div class="bg-white m-5 p-3 rounded">
        <div class="text-center">
            <div class="mt-4">
                <h1>お申し込みフォーム</h1>
            </div>
            <form action="member_create.php" method="POST">
                <div class="mt-4">
                    <input type="text" name="member_name" placeholder="氏名" class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="age" placeholder="年齢" class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="passion" placeholder="意気込み" class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="text" name="email" placeholder="メールアドレス" class="p-2 rounded border-1" style="width: 500px;">
                </div>
                <div class="mt-4">
                    <input type="hidden" name="event_id" value="<?=$id?>">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-info text-white" style="width: 500px;">送信する</button>
                </div>

                <div class="mt-4">
                    <a class="text-secondary" href="./hackathon_show.php?id=<?=$id?>">戻る</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
