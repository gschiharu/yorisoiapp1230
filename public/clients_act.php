<?php
// 必要なファイルをインクルード
require_once __DIR__ . '/../models/Client.php'; // 発注者モデル
require_once __DIR__ . '/../config/database.php'; // データベース接続設定

session_start();

// 1. セッションのチェック（ログイン状態の確認）
//if (!isset($_SESSION['logged_in'])) {
//    header("Location: login.php");
//    exit();
//}

// 2. POSTデータの取得
$companyName = trim($_POST['company_name'] ?? '');
$contactName = trim($_POST['contact_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');

// 3. 必須フィールドのバリデーション
if (empty($companyName) || empty($contactName) || empty($email)) {
    exit('必須フィールドが入力されていません。');
}

// 4. データベース接続とモデルの初期化
$pdo = db_conn();
$clientModel = new Client($pdo);

// 5. 発注者の登録処理
try {
    $success = $clientModel->addClient($companyName, $contactName, $email, $phone);

    if ($success) {
        // 登録成功時は発注者管理画面にリダイレクト
        header("Location: clients.php?action=list");
        exit();
    } else {
        throw new Exception("発注者の登録に失敗しました。");
    }
} catch (Exception $e) {
    // エラー発生時の処理
    echo "エラーが発生しました: " . $e->getMessage();
    exit();
}
?>

