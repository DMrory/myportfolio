<?php
// models/Project.php
class Project {
    private $conn;
    private $table_name = "projects";
    
    public $id;
    public $title;
    public $description;
    public $technologies;
    public $project_url;
    public $image_urls;
    public $featured;
    public $completion_date;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY completion_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function readFeatured() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE featured = 1 ORDER BY completion_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET title=:title, description=:description, technologies=:technologies, 
                  project_url=:project_url, image_urls=:image_urls, featured=:featured, 
                  completion_date=:completion_date";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind parameters
        $stmt->bindParam(":title", htmlspecialchars(strip_tags($this->title)));
        $stmt->bindParam(":description", htmlspecialchars(strip_tags($this->description)));
        $stmt->bindParam(":technologies", htmlspecialchars(strip_tags($this->technologies)));
        $stmt->bindParam(":project_url", htmlspecialchars(strip_tags($this->project_url)));
        $stmt->bindParam(":image_urls", $this->image_urls);
        $stmt->bindParam(":featured", $this->featured);
        $stmt->bindParam(":completion_date", $this->completion_date);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>