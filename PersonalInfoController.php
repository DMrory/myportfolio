<?php
// controllers/PersonalInfoController.php
class PersonalInfoController {
    private $conn;
    private $table_name = "personal_info";
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getPersonalInfo() {
        $query = "SELECT * FROM " . $this->table_name . " LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>