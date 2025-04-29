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

$sql = "SELECT * FROM admission_enquiries ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>SVHL Admission Enquiries - Admin View</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        h2 { text-align: center; color: #333; }
    </style>
</head>
<body>
    <h2>All Admission Enquiries</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Parent Name</th>
            <th>Mobile</th>
            <th>DOB</th>
            <th>Location</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Standard</th>
            <th>Source</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['parent_name']}</td>
                        <td>{$row['mobile']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['standard']}</td>
                        <td>{$row['source']}</td>
                        <td>{$row['message']}</td>
                        <td>{$row['submitted_at']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No enquiries found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
