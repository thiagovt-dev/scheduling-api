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
    public $created_at;
    public $updated_at;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO {$this->table_name} (type, recipient_name, message, scheduling_date, status, created_at, updated_at) VALUES (:type, :recipient_name, :message, :scheduling_date, :status)";
        $stmt = $this->conn->prepare($query);

        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->recipient_name = htmlspecialchars(strip_tags($this->recipient_name));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->scheduling_date = htmlspecialchars(strip_tags($this->scheduling_date));
        $this->status = 'pending';
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':recipient_name', $this->recipient_name);
        $stmt->bindParam(':message', $this->message);
        $stmt->bindParam(':scheduling_date', $this->scheduling_date);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}