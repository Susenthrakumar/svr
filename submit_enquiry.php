<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "svhl_db";

// DB connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form values
$parent_name = $_POST['parent_name'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$location = $_POST['location'];
$student_name = $_POST['student_name'];
$email = $_POST['email'];
$standard = $_POST['standard'];
$source = $_POST['source'];
$message = $_POST['message'];

// Insert into DB
$sql = "INSERT INTO admission_enquiries (parent_name, mobile, dob, location, student_name, email, standard, source, message)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $parent_name, $mobile, $dob, $location, $student_name, $email, $standard, $source, $message);

if ($stmt->execute()) {
    echo "Admission enquiry submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
