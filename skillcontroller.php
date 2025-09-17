<?php
// controllers/SkillController.php
class SkillController {
    private $conn;
    private $table_name = "skills";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllSkills() {
        $query = "SELECT skill_name, proficiency_level
                  FROM " . $this->table_name . "
                  ORDER BY display_order ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $skills = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $skills[] = $row;
        }

        return $skills;
    }
}
?>
