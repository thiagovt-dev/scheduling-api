<?php 

class Notification
{
    private $table_name = 'notifications';
    private $conn;
    
    public $id;
    public $type;
    public $recipient_name;
    public $message;
    public $scheduling_date;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO {$this->table_name} (type, recipient_name, message, scheduling_date, status) VALUES (:type, :recipient_name, :message, :scheduling_date, :status)";
        $stmt = $this->conn->prepare($query);

        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->recipient_name = htmlspecialchars(strip_tags($this->recipient_name));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->scheduling_date = htmlspecialchars(strip_tags($this->scheduling_date));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':recipient_name', $this->recipient_name);
        $stmt->bindParam(':message', $this->message);
        $stmt->bindParam(':scheduling_date', $this->scheduling_date);
        $stmt->bindParam(':status', $this->status);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}