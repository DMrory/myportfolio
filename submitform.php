<?php
// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $error_msg = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $error_msg = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email address is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg = "Please enter a valid email address.";
        }
    }
    
    // Validate message
    if (empty(trim($_POST["message"]))) {
        $error_msg = "Please enter a message.";
    } else {
        $message = trim($_POST["message"]);
    }
    
    // Get user's IP address
    function getClientIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    $sender_ip = getClientIP();
    
    // Check input errors before inserting in database
    if (empty($error_msg)) {
        // Prepare an insert statement
        $sql = "INSERT INTO contacts (name, email, message, sender_ip) VALUES (?, ?, ?, ?)";
         
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_name, $param_email, $param_message, $param_ip);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_message = $message;
            $param_ip = $sender_ip;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $success_msg = "Thank you for your message! I will get back to you soon.";
                
                // Clear form fields
                $name = $email = $message = "";
            } else {
                $error_msg = "Oops! Something went wrong. Please try again later.";
            }
            
            // Close statement
            $stmt->close();
        }
    }
}
?>