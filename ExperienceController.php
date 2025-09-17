<?php
// controllers/ExperienceController.php
class ExperienceController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Example method to get all experiences
    public function getExperiences() {
        // This method would typically query a database
        // For now, it could return the hardcoded data
        return [
            [
                'job_title' => 'Senior ICT Specialist',
                'company' => 'Tech Solutions Inc.',
                'start_date' => '2020-01-01',
                'end_date' => 'Present',
                'responsibilities' => 'Led the development of scalable web applications. Managed cloud infrastructure on AWS. Mentored junior developers.'
            ],
            [
                'job_title' => 'Junior Web Developer',
                'company' => 'Creative Agency',
                'start_date' => '2018-06-01',
                'end_date' => '2019-12-31',
                'responsibilities' => 'Built and maintained client websites using PHP and JavaScript. Collaborated on a variety of digital projects.'
            ]
        ];
    }
}
?>