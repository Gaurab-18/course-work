<?php
// Database connection
$servername = "localhost"; // Your database server
$username = "root"; // database username
$password = ""; //  database password
$dbname = "credentials"; //  database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        session_start();
        $_SESSION['username']=$username;
        header("Location: web.html");
        exit; 
    } else {
        echo "Invalid username or password";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>