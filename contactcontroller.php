<?php
// Fix the include path to point to the database file correctly.
require_once 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $message = htmlspecialchars(strip_tags($_POST['message']));
    
    // Validate input
    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "Please fill in all fields.";
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please enter a valid email address.";
        exit;
    }
    
    // Save to database
    $database = new Database();
    $db = $database->getConnection();
    
    if ($db) {
        $query = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        
        if ($stmt->execute()) {
            // Send email notification (optional)
            $to = "your-email@example.com";
            $subject = "New Contact Form Submission";
            $emailMessage = "Name: $name\nEmail: $email\nMessage: $message";
            $headers = "From: $email";
            
            // Check if mail() function is available and configured
            // mail($to, $subject, $emailMessage, $headers);
            
            http_response_code(200);
            echo "Thank you for your message. I'll get back to you soon!";
        } else {
            http_response_code(500);
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        http_response_code(500);
        echo "Database connection failed. Please try again later.";
    }
} else {
    http_response_code(405);
    echo "Method not allowed.";
}



?>