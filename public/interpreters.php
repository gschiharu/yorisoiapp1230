<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - 通訳者管理</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center p-4">
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden mb-4">メニューを開く</label>
            <h1 class="text-3xl font-bold mb-8">通訳者管理</h1>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>言語</th>
                            <th>経験年数</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>鈴木花子</td>
                            <td>suzuki@example.com</td>
                            <td>090-1234-5678</td>
                            <td>英語, 中国語</td>
                            <td>5-10 years</td>
                            <td>
                                <button class="btn btn-xs btn-info">編集</button>
                                <button class="btn btn-xs btn-error">削除</button>
                            </td>
                        </tr>
                        <!-- 他の通訳者データ -->
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary mt-4" onclick="document.getElementById('new-interpreter-modal').showModal()">新規通訳者登録</button>
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

    <dialog id="new-interpreter-modal" class="modal">
    <form method="POST" action="/php/yorisoiapp/public/interpreters_act.php" class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">新規通訳者登録</h3>
            <div class="form-control">
                <label class="label" for="name">
                    <span class="label-text">名前</span>
                </label>
                <input type="text" id="name" name="name" placeholder="名前" class="input input-bordered" required />
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
            <div class="form-control">
                <label class="label" for="languages">
                    <span class="label-text">言語</span>
                </label>
                <input type="text" id="languages" name="languages" placeholder="例: 英語, 中国語" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="profile">
                    <span class="label-text">プロフィール</span>
                </label>
                <textarea id="profile" name="profile" placeholder="プロフィール" class="textarea textarea-bordered"></textarea>
            </div>
            <div class="form-control">
                <label class="label" for="experience_level">
                    <span class="label-text">経験年数</span>
                </label>
                <select id="experience_level" name="experience_level" class="select select-bordered" required>
                    <option value="Less than 1 year">1年未満</option>
                    <option value="1-3 years">1-3年</option>
                    <option value="3-5 years">3-5年</option>
                    <option value="5-10 years">5-10年</option>
                    <option value="More than 10 years">10年以上</option>
                </select>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">登録</button>
                <button class="btn">キャンセル</button>
            </div>
        </form>
    </dialog>
</body>
</html>