<?php
// Start session and check if admin is logged in
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

include 'config.php';

// Fetch all messages from database
$sql = "SELECT id, name, email, message, created_at, sender_ip, is_read FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .unread { font-weight: bold; background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Contact Form Messages</h1>
    
    <?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>IP Address</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="<?php echo $row['is_read'] ? '' : 'unread'; ?>">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><?php echo $row['sender_ip']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['is_read'] ? 'Read' : 'Unread'; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>No messages found.</p>
    <?php endif; ?>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>