<?php
// 必要なファイルをインクルード
require_once __DIR__ . '/../models/Interpreter.php';
require_once __DIR__ . '/../config/database.php';

session_start();

// 1. セッションのチェック（オプション）
//if (!isset($_SESSION['logged_in'])) {
//    header("Location: login.php");
//    exit();
//}

// 2. POSTデータの取得
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$languages = trim($_POST['languages'] ?? '');
$profile = trim($_POST['profile'] ?? '');
$experienceLevel = trim($_POST['experience_level'] ?? '');

// 3. 必須フィールドのバリデーション
if (empty($name) || empty($email) || empty($languages) || empty($experienceLevel)) {
    exit('必須フィールドが入力されていません');
}

// 4. データベース接続とモデルの初期化
$pdo = db_conn();
$interpreterModel = new Interpreter($pdo);

// 5. 通訳者の登録処理
$success = $interpreterModel->addInterpreter($name, $email, $phone, $languages, $profile, $experienceLevel);

if ($success) {
    // 登録成功時は通訳者管理画面にリダイレクト
    header("Location: interpreters.php?action=list");
    exit();
} else {
    // 登録失敗時のエラーメッセージ
    echo "通訳者の登録に失敗しました。もう一度お試しください。";
}
?>
