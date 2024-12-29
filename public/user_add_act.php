<?php
// パスを正しく指定
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../config/database.php';

// データベース接続とAdminクラスの初期化
$pdo = db_conn();
$admin = new Admin($pdo);

// POSTデータを取得
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// 新規管理者の登録処理
if ($admin->register($username, $password, $email)) {
    // 成功した場合はログイン画面にリダイレクト
    header("Location: login.php");
    exit();
} else {
    // エラー時のメッセージ
    echo "管理者の登録に失敗しました。もう一度お試しください。";
}
?>
