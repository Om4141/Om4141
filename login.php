<?php
// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "phpmyadmin"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input
$uname = $_POST['login-id'];
$pass = $_POST['password'];

// Prevent SQL injection
$uname = mysqli_real_escape_string($conn, $uname);
$pass = mysqli_real_escape_string($conn, $pass);

// Query to fetch user details
$sql = "SELECT studentid, name, fathername, city, 12thpercent FROM userdetails WHERE studentid='$uname' AND password='$pass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output user details
    while ($row = $result->fetch_assoc()) {
        echo "Login ID: " . $row["studentid"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Father: " . $row["fathername"] . "<br>";
        echo "City name: " . $row["city"] . "<br>";
        echo "Score: " . $row["12thpercent"] . "<br>";
    }
} else {
    echo "Invalid username or password.";
}

// Close connection
$conn->close();
?>
