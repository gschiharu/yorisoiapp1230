<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - 発注管理</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center p-4">
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden mb-4">メニューを開く</label>
            <h1 class="text-3xl font-bold mb-8">発注管理</h1>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>発注者</th>
                            <th>通訳者</th>
                            <th>実施日</th>
                            <th>開始時間</th>
                            <th>終了時間</th>
                            <th>言語ペア</th>
                            <th>通訳形式</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>株式会社A</td>
                            <td>鈴木花子</td>
                            <td>2024-12-27</td>
                            <td>10:00</td>
                            <td>12:00</td>
                            <td>English to Japanese</td>
                            <td>In-person</td>
                            <td>
                                <button class="btn btn-xs btn-info">詳細</button>
                                <button class="btn btn-xs btn-warning">編集</button>
                            </td>
                        </tr>
                        <!-- 他の発注データ -->
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary mt-4" onclick="document.getElementById('new-order-modal').showModal()">新規発注登録</button>
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

    <?php
    require_once __DIR__ . '/../config/database.php';
    require_once __DIR__ . '/../models/Client.php';
    require_once __DIR__ . '/../models/Interpreter.php';

    $pdo = db_conn();

    // 発注者リストを取得
    $clientModel = new Client($pdo);
    $clients = $clientModel->getAllClients();

    // 通訳者リストを取得
    $interpreterModel = new Interpreter($pdo);
    $interpreters = $interpreterModel->getAllInterpreters();
    ?>

    <dialog id="new-order-modal" class="modal">
        <form method="POST" action="/php/yorisoiapp/public/orders_act.php" class="modal-box w-11/12 max-w-5xl">
        <form method="dialog" class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">新規発注登録</h3>
            <div class="form-control">
                <label class="label" for="client_id">
                    <span class="label-text">発注者</span>
                </label>
                <select id="client_id" name="client_id" class="select select-bordered" required>
                    <option value="">発注者を選択してください</option>
                    <!-- PHPで動的に発注者リストを生成 -->
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= htmlspecialchars($client['id']) ?>"><?= htmlspecialchars($client['company_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="interpreter_id">
                    <span class="label-text">通訳者</span>
                </label>
                <select id="interpreter_id" name="interpreter_id" class="select select-bordered" required>
                    <option value="">通訳者を選択してください</option>
                    <!-- PHPで動的に通訳者リストを生成 -->
                    <?php foreach ($interpreters as $interpreter): ?>
                        <option value="<?= htmlspecialchars($interpreter['id']) ?>"><?= htmlspecialchars($interpreter['name']) ?></option>
                     <?php endforeach; ?> 
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="event_date">
                    <span class="label-text">実施日</span>
                </label>
                <input type="date" id="event_date" name="event_date" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="event_start_time">
                    <span class="label-text">開始時間</span>
                </label>
                <input type="time" id="event_start_time" name="event_start_time" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="event_finish_time">
                    <span class="label-text">終了時間</span>
                </label>
                <input type="time" id="event_finish_time" name="event_finish_time" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="language_pair">
                    <span class="label-text">言語ペア</span>
                </label>
                <input type="text" id="language_pair" name="language_pair" placeholder="例: English to Japanese" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label" for="interpretation_format">
                    <span class="label-text">通訳形式</span>
                </label>
                <select id="interpretation_format" name="interpretation_format" class="select select-bordered" required>
                    <option value="In-person">対面</option>
                    <option value="Remote">リモート</option>
                    <option value="Telephone">電話</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label" for="event_details">
                    <span class="label-text">イベント詳細</span>
                </label>
                <textarea id="event_details" name="event_details" placeholder="イベントの詳細情報" class="textarea textarea-bordered" required></textarea>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">登録</button>
                <button class="btn">キャンセル</button>
            </div>
        </form>
    </dialog>
</body>
</html>