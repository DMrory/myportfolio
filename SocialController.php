<?php
// controllers/SocialController.php
class SocialController {
    private $conn;
    private $table_name = "social_links";
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getSocialLinks() {
        $query = "SELECT platform_name, icon_class, profile_url 
                  FROM " . $this->table_name . " 
                  ORDER BY display_order ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $social_links = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $social_links[] = $row;
        }
        
        return $social_links;
    }
    
    public function renderSocialIcons() {
        $links = $this->getSocialLinks();
        $html = '';
        
        foreach ($links as $link) {
            $html .= '<a href="' . $link['profile_url'] . '" class="social-icon" target="_blank">';
            $html .= '<i class="' . $link['icon_class'] . '"></i>';
            $html .= '</a>';
        }
        
        return $html;
    }
}
// Implementation in frontend

// Make sure to include your database configuration file and database class
// For example, if your database class is in a file named `Database.php`:
require_once 'Database.php';

// Instantiate the database class BEFORE you use it.
$database = new Database(); 

// Now, the $database variable is defined and can be used
$socialController = new SocialController($database->getConnection());
$social_icons = $socialController->renderSocialIcons();
?>