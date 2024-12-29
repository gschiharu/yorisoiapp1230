<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - ログイン</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-base-200 flex items-center justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title justify-center mb-4">Yorisoi ログイン</h2>
                <form action="login.php" method="POST">
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
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>