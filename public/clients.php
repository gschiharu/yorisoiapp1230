<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - 発注者管理</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center p-4">
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden mb-4">メニューを開く</label>
            <h1 class="text-3xl font-bold mb-8">発注者管理</h1>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>会社名</th>
                            <th>担当者名</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>株式会社A</td>
                            <td>山田太郎</td>
                            <td>yamada@example.com</td>
                            <td>03-1234-5678</td>
                            <td>
                                <button class="btn btn-xs btn-info">編集</button>
                                <button class="btn btn-xs btn-error">削除</button>
                            </td>
                        </tr>
                        <!-- 他の発注者データ -->
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary mt-4" onclick="document.getElementById('new-client-modal').showModal()">新規発注者登録</button>
        </div> 
        <div class="drawer-side">
            <label for="my-drawer-2" class="drawer-overlay"></label> 
            <ul class="menu p-4 w-80 h-full bg-base-200 text-base-content">
                <li><a href="dashboard.php">ダッシュボード</a></li>
                <li><a href="clients.php">発注者管理</a></li>
                <li><a href="interpreters.php">通訳者管理</a></li>
                <li><a href="orders.php">発注管理</a></li>
                <li><a href="login.php?logout=1">ログアウト</a></li>
            </ul>
        </div>
    </div>

    <dialog id="new-client-modal" class="modal">
       <!-- 修正箇所: <form> タグを追加 -->
       <form method="POST" action="/php/yorisoiapp/public/clients_act.php" class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">新規発注者登録</h3>
            <div class="form-control">
                <label class="label" for="company_name">
                    <span class="label-text">会社名</span>
                </label>
                <input type="text" id="company_name" name="company_name" placeholder="会社名" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="contact_name">
                    <span class="label-text">担当者名</span>
                </label>
                <input type="text" id="contact_name" name="contact_name" placeholder="担当者名" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="email">
                    <span class="label-text">メールアドレス</span>
                </label>
                <input type="email" id="email" name="email" placeholder="メールアドレス" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="phone">
                    <span class="label-text">電話番号</span>
                </label>
                <input type="tel" id="phone" name="phone" placeholder="電話番号" class="input input-bordered" />
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">登録</button>
                <button class="btn">キャンセル</button>
            </div>
        </form>
    </dialog>
</body>
</html>