<?php
class Interpreter {
    private $pdo;

    // コンストラクタでPDOインスタンスを受け取る
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * 通訳者一覧を取得する
     * @return array 通訳者データの配列
     */
    public function getAllInterpreters() {
        $sql = "SELECT * FROM interpreters ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // 配列として結果を取得
    }

    
    /**
     * 通訳者をIDで取得する
     * @param int $id 通訳者のID
     * @return array|false 通訳者データ（存在しない場合はfalse）
     */
    public function getInterpreterById($id) {
        $sql = "SELECT * FROM interpreters WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // 1件の結果を取得
    }

    /**
     * 新しい通訳者を登録する
     * @param string $name 名前
     * @param string $email メールアドレス
     * @param string|null $phone 電話番号（任意）
     * @param string $languages 通訳可能な言語
     * @param string|null $profile プロフィール（任意）
     * @param string $experienceLevel 通訳年数（ENUM）
     * @return bool 成功時にtrueを返す
     */
    public function addInterpreter($name, $email, $phone, $languages, $profile, $experienceLevel) {
        $sql = "INSERT INTO interpreters (name, email, phone, languages, profile, experience_level) 
                VALUES (:name, :email, :phone, :languages, :profile, :experience_level)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':languages', $languages, PDO::PARAM_STR);
        $stmt->bindValue(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindValue(':experience_level', $experienceLevel, PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * 通訳者の情報を更新する
     * @param int $id 通訳者のID
     * @param string $name 名前
     * @param string $email メールアドレス
     * @param string|null $phone 電話番号（任意）
     * @param string $languages 通訳可能な言語
     * @param string|null $profile プロフィール（任意）
     * @param string $experienceLevel 通訳年数（ENUM）
     * @return bool 成功時にtrueを返す
     */
    public function updateInterpreter($id, $name, $email, $phone, $languages, $profile, $experienceLevel) {
        $sql = "UPDATE interpreters 
                SET name = :name, email = :email, phone = :phone, languages = :languages, 
                    profile = :profile, experience_level = :experience_level, updated_at = NOW() 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':languages', $languages, PDO::PARAM_STR);
        $stmt->bindValue(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindValue(':experience_level', $experienceLevel, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * 通訳者を削除する
     * @param int $id 通訳者のID
     * @return bool 成功時にtrueを返す
     */
    public function deleteInterpreter($id) {
        $sql = "DELETE FROM interpreters WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
