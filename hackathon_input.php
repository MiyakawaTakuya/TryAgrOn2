<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/show.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>ハッカソン登録画面</title>
</head>

<body class="bg-light">
    <div class="bg-white m-5 p-3 rounded">
        <div class="text-center">
        <form action="hackathon_create.php" method="POST" enctype="multipart/form-data">
            <a class="text-secondary" href="hackathon_read.php">一覧画面</a>
            <div class="mt-4 mb-4">
                <h1>ハッカソン情報登録</h1>
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="ハッカソン名" type="text" name="hackathon_name" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="開催予定日" type="date" name="event_date" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="開催場所" type="text" name="event_location" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="主催者" type="text" name="organizer_name" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="課題感" type="text" name="pain" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="期待すること" type="text" name="expectation" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <select  name="join_place" class="border border-info border-2 rounded">
                    <option value="オンサイト">オンサイト</option>
                    <option value="オンライン">オンライン</option>
                    <option value="オン・オフ">オン・オフ混合</option>
                </select>
            </div>
            <div>
                <p> ※ 参加方法を選択</p>
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="参加者条件" type="text" name="requirements" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="参加者上限" type="number" name="upper_limit" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input placeholder="報酬・謝礼" type="text" name="reward" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <input type="file" name="img" accept="image/*">
            </div>
            <div>
                <input type="hidden" name="organizer_id">
            </div>

            <div class="mt-4 fs-4">
                <button type="submit" class="btn btn-info text-white">送信</button>
            </div>
        </form>
</div>
    </div>

</body>

</html>

<!-- event_id   INT INT(12) 主キー
hackathon_name  VARCHAR(32) 
event_date  VARCHAR(32)
event_location  VARCHAR(32)
organizer_id  INT(12)     ←不要
organizer_name  VSRCHAR(64)
pain  VARCHAR(255)
expectation  VARCHAR(128)
requirements  VARCHAR(255)
upper_limit INT(2)
reward  VARCHAR(128)
img VARCHAR(128)   イメージ画像

is_deleted INT(1)
created_at  DATETIME
updated_at  DATETIME -->