<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ハッカソン登録画面</title>
</head>

<body>
    <form action="hackathon_create.php" method="POST" enctype="multipart/form-data">
        <a href="item_read.php">一覧画面</a>
        <div>
            ハッカソン名: <input type="text" name="hackathon_name">
        </div>
        <div>
            開催予定日: <input type="date" name="event_date">
        </div>
        <div>
            開催場所: <input type="text" name="event_location">
        </div>
        <div>
            主催者: <input type="text" name="organizer_name">
        </div>
        <div>
            課題感: <input type="text" name="pain">
        </div>
        <div>
            期待すること: <input type="text" name="expectation">
        </div>
        <div>
            参加方法: <select name="join_place" >
                        <option value="オンサイト">オンサイト</option>
                        <option value="オンライン"></option>
                        <option value="オン・オフ">オン・オフ</option>
                    </select>
        </div>
        <div>
            参加者条件: <input type="text" name="requirements">
        </div>
        <div>
            参加者上限: <input type="number" name="upper_limit"> 人
        </div>
        <div>
            報酬・謝礼: <input type="text" name="reward">
        </div>
        <div>
            イメージ写真: <input type="file" name="img" accept="image/*">
        </div>
        <div>
            <input type="hidden" name="organizer_id" >
        </div>

        <div>
            <button>送信</button>
        </div>
    </form>

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