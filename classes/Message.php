<?php 

class Message {
    public $id;
    public $userId;
    public $recipientId;
    public $content;
    public $date;
    public static $table = 'messages';

    public function __construct($id) {
        global $db;
        $this->id = $id;
        $message = $db->getResult(self::$table, $id);
        $this->userId = $message['user_id'];
        $this->recipientId = $message['recipient_id'];
        $this->content = $message['content'];
        $this->date = $message['date'];
    }

    public function getContent() {
        return $this->content;
    }

    public function getRecipientId() {
        return $this->recipientId;
    }

    public function isMine() {
        return $this->userId == $_SESSION['id'];
    }

    public static function send($content, $recipientId) {
        global $db;
        $date = date("Y-m-d H:i:s");
        $message = $db->insert(self::$table, [
            'user_id' => $_SESSION['id'], 
            'date' => $date,
            'content' => $content,
            'recipient_id' => $recipientId
        ]);
        return $message;
    }

    public static function getChat($userId, $recipientId) {
        global $db;
        $messages = $db->getAllByKeysOr(self::$table, 'user_id', $userId, 'recipient_id', $recipientId);
        $results = [];
        foreach ($messages as $message) {
            $results[] = new Message($message['id']);
        }
        return $results;
    }

    public function getTime() {
        return date("H:i A", strtotime($this->date));
    }
}