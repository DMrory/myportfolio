<?php
// controllers/GalleryController.php
class GalleryController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Example method to get all gallery images
    public function getGalleryImages() {
        // This method would typically query a database for gallery images
        // For now, it can return the hardcoded data
        return [
            [
                'url' => 'assets/images/gallery/image1.jpg',
                'caption' => 'Modern office space design',
                'category' => 'Web Design'
            ],
            [
                'url' => 'assets/images/gallery/image2.jpg',
                'caption' => 'Abstract art installation',
                'category' => 'Photography'
            ],
            [
                'url' => 'assets/images/gallery/image3.jpg',
                'caption' => 'UX/UI wireframe for mobile app',
                'category' => 'UI/UX'
            ]
        ];
    }
}
?>