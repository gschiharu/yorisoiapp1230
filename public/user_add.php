<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - 管理者登録</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-base-200 flex items-center justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title justify-center mb-4">管理者登録</h2>
                <form action="user_add_act.php" method="POST">
                    <div class="form-control">
                        <label class="label" for="username">
                            <span class="label-text">ユーザー名</span>
                        </label>
                        <input type="text" id="username" name="username" placeholder="ユーザー名" class="input input-bordered" required />
                    </div>
                    <div class="form-control mt-4">
                        <label class="label" for="password">
                            <span class="label-text">パスワード</span>
                        </label>
                        <input type="password" id="password" name="password" placeholder="パスワード" class="input input-bordered" required />
                    </div>
                    <div class="form-control mt-4">
                        <label class="label" for="email">
                            <span class="label-text">メールアドレス</span>
                        </label>
                        <input type="email" id="email" name="email" placeholder="メールアドレス" class="input input-bordered" required />
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <p><a href="login.php" class="link link-primary">ログイン画面に戻る</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
