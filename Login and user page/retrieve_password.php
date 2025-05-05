<?php
// Database connection parameters
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "forza motors";

// Establish a database connection
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reset_username = $_POST['reset_username'];

    $stmt = $conn->prepare("SELECT confirm_password FROM users_data WHERE username = ?");
    $stmt->bind_param("s", $reset_username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $password = $row['confirm_password']; // Assuming the password is stored in plain text (not recommended)
        echo "<p>Your password is: " . htmlspecialchars($password) . "</p>";
    } else {
        echo "<p>User not found.</p>";
    }
}

// Close connection
$conn->close();
?>
