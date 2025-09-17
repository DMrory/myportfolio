<?php
class ProjectController {
    private $conn;
    private $table_name = "projects";
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getFeaturedProjects() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE featured = 1 ORDER BY completion_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $projects = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decode JSON image URLs
            $row['image_urls'] = json_decode($row['image_urls'], true);
            $projects[] = $row;
        }
        
        return $projects;
    }
    
    public function getAllProjects() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY completion_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $projects = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['image_urls'] = json_decode($row['image_urls'], true);
            $projects[] = $row;
        }
        
        return $projects;
    }
    
    public function getProjectById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $project = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($project) {
            $project['image_urls'] = json_decode($project['image_urls'], true);
        }
        
        return $project;
    }
    
    public function createProject($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET title=:title, description=:description, technologies=:technologies, 
                  project_url=:project_url, image_urls=:image_urls, featured=:featured, 
                  completion_date=:completion_date";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind parameters
        $stmt->bindParam(":title", htmlspecialchars(strip_tags($data['title'])));
        $stmt->bindParam(":description", htmlspecialchars(strip_tags($data['description'])));
        $stmt->bindParam(":technologies", htmlspecialchars(strip_tags($data['technologies'])));
        $stmt->bindParam(":project_url", htmlspecialchars(strip_tags($data['project_url'])));
        $stmt->bindParam(":image_urls", json_encode($data['image_urls']));
        $stmt->bindParam(":featured", $data['featured']);
        $stmt->bindParam(":completion_date", $data['completion_date']);
        
        return $stmt->execute();
    }
}
?>