<?php
require_once 'models/Admin.php';
require_once 'config/database.php';

$pdo = db_conn();
$admin = new Admin($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['lid'];
    $password = $_POST['lpw'];
    $result = $admin->login($username, $password);
    if ($result) {
        session_start();
        $_SESSION['admin'] = $result;
        redirect('dashboard.php');
    } else {
        echo "ログインに失敗しました。";
    }
}
?>
