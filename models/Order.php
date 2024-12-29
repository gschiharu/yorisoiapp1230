<?php
class Order {
    private $pdo;

    // コンストラクタでPDOインスタンスを受け取る
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * 新しい発注を登録する
     * @param int $clientId 発注者ID
     * @param int $interpreterId 通訳者ID
     * @param string $eventDate 実施日
     * @param string $eventStartTime 開始時間
     * @param string $eventFinishTime 終了時間
     * @param string $languagePair 言語ペア
     * @param string $interpretationFormat 通訳形式
     * @param string $eventDetails イベント詳細
     * @return bool 登録成功時にtrue
     */
    public function addOrder($clientId, $interpreterId, $eventDate, $eventStartTime, $eventFinishTime, $languagePair, $interpretationFormat, $eventDetails) {
        $sql = "INSERT INTO orders (client_id, interpreter_id, event_date, event_start_time, event_finish_time, language_pair, interpretation_format, event_details) 
                VALUES (:client_id, :interpreter_id, :event_date, :event_start_time, :event_finish_time, :language_pair, :interpretation_format, :event_details)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':client_id', $clientId, PDO::PARAM_INT);
        $stmt->bindValue(':interpreter_id', $interpreterId, PDO::PARAM_INT);
        $stmt->bindValue(':event_date', $eventDate, PDO::PARAM_STR);
        $stmt->bindValue(':event_start_time', $eventStartTime, PDO::PARAM_STR);
        $stmt->bindValue(':event_finish_time', $eventFinishTime, PDO::PARAM_STR);
        $stmt->bindValue(':language_pair', $languagePair, PDO::PARAM_STR);
        $stmt->bindValue(':interpretation_format', $interpretationFormat, PDO::PARAM_STR);
        $stmt->bindValue(':event_details', $eventDetails, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
