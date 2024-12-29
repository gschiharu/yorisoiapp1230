<?php
// 必要なファイルをインクルード
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../config/database.php';

session_start();

// セッションチェックをコメントアウト（必要なら戻す）
// if (!isset($_SESSION['logged_in'])) {
//     header("Location: login.php");
//     exit();
// }

// POSTデータを取得
$clientId = trim($_POST['client_id'] ?? '');
$interpreterId = trim($_POST['interpreter_id'] ?? '');
$eventDate = trim($_POST['event_date'] ?? '');
$eventStartTime = trim($_POST['event_start_time'] ?? '');
$eventFinishTime = trim($_POST['event_finish_time'] ?? '');
$languagePair = trim($_POST['language_pair'] ?? '');
$interpretationFormat = trim($_POST['interpretation_format'] ?? '');
$eventDetails = trim($_POST['event_details'] ?? '');

// 必須フィールドのバリデーション
if (empty($clientId) || empty($interpreterId) || empty($eventDate) || empty($eventStartTime) || empty($eventFinishTime) || empty($languagePair) || empty($interpretationFormat) || empty($eventDetails)) {
    exit('必須フィールドが入力されていません。');
}

// データベース接続とモデルの初期化
$pdo = db_conn();
$orderModel = new Order($pdo);

// 発注情報の登録
try {
    $success = $orderModel->addOrder($clientId, $interpreterId, $eventDate, $eventStartTime, $eventFinishTime, $languagePair, $interpretationFormat, $eventDetails);

    if ($success) {
        // 成功時は発注管理画面にリダイレクト
        header("Location: orders.php?action=list");
        exit();
    } else {
        throw new Exception("発注情報の登録に失敗しました。");
    }
} catch (Exception $e) {
    // エラー発生時のメッセージ表示
    echo "エラーが発生しました: " . $e->getMessage();
    exit();
}
?>
