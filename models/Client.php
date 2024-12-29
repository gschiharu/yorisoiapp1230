<?php
class Client {
    private $pdo;

    // コンストラクタでPDOインスタンスを受け取る
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * クライアントの一覧を取得する
     * @return array クライアントデータの配列
     */
    public function getAllClients() {
        $sql = "SELECT * FROM clients ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // 配列として結果を取得
    }

    /**
     * クライアントをIDで取得する
     * @param int $id クライアントのID
     * @return array|false クライアントデータ（存在しない場合はfalse）
     */
    public function getClientById($id) {
        $sql = "SELECT * FROM clients WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // 1件の結果を取得
    }

    /**
     * クライアントを新規登録する
     * @param string $companyName 会社名
     * @param string $contactName 担当者名
     * @param string $email メールアドレス
     * @param string|null $phone 電話番号（任意）
     * @return bool 成功時にtrueを返す
     */
    public function addClient($companyName, $contactName, $email, $phone = null) {
        $sql = "INSERT INTO clients (company_name, contact_name, email, phone) 
                VALUES (:company_name, :contact_name, :email, :phone)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':company_name', $companyName, PDO::PARAM_STR);
        $stmt->bindValue(':contact_name', $contactName, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        return $stmt->execute();
    }

    

    /**
     * クライアントを更新する
     * @param int $id クライアントのID
     * @param string $companyName 会社名
     * @param string $contactName 担当者名
     * @param string $email メールアドレス
     * @param string|null $phone 電話番号（任意）
     * @return bool 成功時にtrueを返す
     */
    public function updateClient($id, $companyName, $contactName, $email, $phone = null) {
        $sql = "UPDATE clients 
                SET company_name = :company_name, contact_name = :contact_name, 
                    email = :email, phone = :phone, updated_at = NOW() 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':company_name', $companyName, PDO::PARAM_STR);
        $stmt->bindValue(':contact_name', $contactName, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * クライアントを削除する
     * @param int $id クライアントのID
     * @return bool 成功時にtrueを返す
     */
    public function deleteClient($id) {
        $sql = "DELETE FROM clients WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
