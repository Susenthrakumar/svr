<?php
$servername = "localhost";
$username = "root";
$password = "";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS svhl_db";
if ($conn->query($sql) === TRUE) {
    echo "Database 'svhl_db' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("svhl_db");

// Create table
$sql = "CREATE TABLE IF NOT EXISTS admission_enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_name VARCHAR(100),
    mobile VARCHAR(15),
    dob DATE,
    location VARCHAR(100),
    student_name VARCHAR(100),
    email VARCHAR(100),
    standard VARCHAR(50),
    source VARCHAR(50),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'admission_enquiries' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
