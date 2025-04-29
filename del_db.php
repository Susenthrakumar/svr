<?php
$servername = "localhost";
$username = "root";
$password = "";

// Connect to MySQL (not selecting any DB yet)
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete database
$sql = "DROP DATABASE IF EXISTS svhl_db";
if ($conn->query($sql) === TRUE) {
    echo "Database 'svhl_db' has been deleted successfully.";
} else {
    echo "Error deleting database: " . $conn->error;
}

$conn->close();
?>
