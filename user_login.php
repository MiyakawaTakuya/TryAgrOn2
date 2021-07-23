<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>ログイン画面</title>
</head>

<body class="bg-light">
    <div class="bg-white m-5 p-3 rounded">
        <div class="mx-auto" style="width: 500px;">
            <form action="./user_login_act.php" method="post" class="mt-5 mb-5">
            <p class="h2 mt-4 fw-bold">ログインする</p>
            <div class="mt-5 fs-4">
                ユーザー名: <input type="text" name="user_name" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
            パスワード: <input type="password" name="password" class="border border-info border-2 rounded">
            </div>
            <div class="mt-4 fs-4">
                <button type="submit" class="btn btn-info text-white">ログイン</button>
            </div>
            <div class="mt-4">
                <p class="text-secondary d-inline">新しく主催者登録する→</p>
                <span><a href="./users_input.php" class="text-info">新規登録</a></span>
            </div>
            <!-- <a href="todo_register.php">or register</a> -->
            </form>
        </div>
    </div>
</body>

</html>