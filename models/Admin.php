<?php
class Admin {
    private $pdo;

    // コンストラクタでPDOを受け取る
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * 管理者のログイン認証を行う
     *
     * @param string $username ユーザー名
     * @param string $password 入力されたパスワード
     * @return array|false 認証成功時に管理者情報を返し、失敗時はfalseを返す
     */
    public function login($username, $password) {
        // SQL文を準備
        $sql = "SELECT * FROM admins WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        // 実行
        $status = $stmt->execute();

        // SQL実行エラーの確認
        if ($status === false) {
            sql_error($stmt);
        }

        // 結果を取得
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // パスワード検証
        if ($admin && password_verify($password, $admin['password'])) {
            return $admin; // 認証成功時に管理者情報を返す
        }
        return false; // 認証失敗時はfalse
    }

    /**
     * 管理者の新規登録
     *
     * @param string $username ユーザー名
     * @param string $password パスワード（平文）
     * @param string $email メールアドレス
     * @return bool 成功時はtrue、失敗時はfalse
     */
    public function register($username, $password, $email) {
        // パスワードをハッシュ化
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL文を準備
        $sql = "INSERT INTO admins (username, password, email, created_at) VALUES (:username, :password, :email, NOW())";
        $stmt = $this->pdo->prepare($sql);

        // バインド
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        // 実行
        $status = $stmt->execute();

        // エラー確認
        if ($status === false) {
            sql_error($stmt);
            return false;
        }
        return true;
    }
}
?>
