<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>新規ユーザー登録</title>
</head>

<body>
    <form action="users_create.php" method="POST">
        <div class="mt-4">
            <input type="text" name="user_name" placeholder="氏名" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <input type="text" name="rubi_name" placeholder="フリガナ" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <input type="email" name="email" placeholder="メールアドレス" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <input type="text" name="tel" placeholder="電話番号" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <input type="number" name="age" placeholder="年齢" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <input type="password" name="password" placeholder="パスワード" class="p-2 rounded border-1" style="width: 500px;">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-success" style="width: 500px;">アカウントを作成する</button>
        </div>
        <div class="mt-3 text-center">
            <p class="d-inline text-secondary ">すでにアカウントをお持ちの方は</p>
            <a class="d-inline text-secondary " href="./user_login.php">ログインへ</a>
        </div>
    </form>
</body>

</html>

<!--
user_id   INT INT(12) 主キー
user_name VARCHAR(32)
rubi_name VARCHARA(32)
email VARCHARA(32)
tel VARCHARA(11)
age INT(2)
password VARCHARA(32)

is_deleted INT(1)
created_at  DATETIME
updated_at  DATETIME -->