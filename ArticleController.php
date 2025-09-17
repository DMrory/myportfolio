<?php
// controllers/ArticleController.php
class ArticleController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Example method to get all articles
    public function getArticles() {
        // This method would typically query a database for articles
        // For now, it could return the hardcoded data from index.php
        return [
            [
                'title' => 'The Importance of a Strong Cybersecurity Posture',
                'content' => 'In today\'s digital landscape, cybersecurity is not an option but a necessity. This article explores key strategies for protecting your digital assets...',
                'date_published' => '2024-05-10',
                'tags' => 'Cybersecurity, Web Security, Data Protection',
                'url' => '#'
            ],
            [
                'title' => 'Optimizing Database Performance with Indexing',
                'content' => 'Database performance is crucial for any data-driven application. We dive into how proper indexing can dramatically improve query speeds...',
                'date_published' => '2024-04-22',
                'tags' => 'Databases, MySQL, Performance',
                'url' => '#'
            ]
        ];
    }
}
?>