<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorisoi - ダッシュボード</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col items-center justify-center">
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden mb-4">メニューを開く</label>
            <h1 class="text-3xl font-bold mb-8">Yorisoi ダッシュボード</h1>
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <div class="stat-title">総発注数</div>
                    <div class="stat-value text-primary">25.6K</div>
                    <div class="stat-desc">21% 先月比増加</div>
                </div>
                
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="stat-title">新規通訳者</div>
                    <div class="stat-value text-secondary">2.6M</div>
                    <div class="stat-desc">21% 先月比増加</div>
                </div>
            </div>
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
</body>
</html>