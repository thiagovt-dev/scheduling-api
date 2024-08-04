<?php 

class ServiceBooking {
    private $table_name = 'services_booking'; 
    private $conn;

    public $id;
    public $client_name;
    public $client_email;
    public $client_phone;
    public $service;
    public $data_hora;
    public $status;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
        $query = "INSERT INTO {$this->table_name} (client_name, client_email, client_phone, service, data_hora, status) VALUES (:client_name, :client_email, :client_phone, :service, :data_hora, :status)";

        $stmt = $this->conn->prepare($query);

        $this->client_name = htmlspecialchars(strip_tags($this->client_name));
        $this->client_email = htmlspecialchars(strip_tags($this->client_email));
        $this->client_phone = htmlspecialchars(strip_tags($this->client_phone));
        $this->service = htmlspecialchars(strip_tags($this->service));
        $this->data_hora = htmlspecialchars(strip_tags($this->data_hora));
        $this->status = htmlspecialchars(strip_tags($this->status));
        
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':client_email', $this->client_email);
        $stmt->bindParam(':client_phone', $this->client_phone);
        $stmt->bindParam(':service', $this->service);
        $stmt->bindParam(':data_hora', $this->data_hora);
        $stmt->bindParam(':status', $this->status);
        $stmt->execute();

        if($stmt->execute()){
            return true;
        }    
        return false;
    } 
}