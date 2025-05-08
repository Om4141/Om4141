<?php
$servername = "your-db-endpoint";
$username = "your-db-username";
$password = "your-db-password";
$dbname = "your-db-name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_id = $_POST['login-id'];
$password_input = $_POST['password'];

$sql = "SELECT * FROM userdetails WHERE loginid='$login_id' AND password='$password_input'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Detail</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #efdecd; /* Almond */
      font-family: 'Poppins', sans-serif;
      padding: 30px;
      color: #4e342e;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background-color: #fff7f0;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .quote {
      font-size: 20px;
      margin-bottom: 20px;
      color: #6d4c41;
      font-weight: 600;
      text-shadow: 1px 1px 1px #d2b48c;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #bfa28f;
    }

    th {
      background-color: #8d6e63;
      color: white;
    }

    td {
      background-color: #f8f0e3;
    }

    .error {
      color: red;
      font-weight: bold;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      color: #4e342e;
      text-decoration: none;
      font-weight: 600;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="quote">🌟 Believe in yourself. You are capable of amazing things. 🌟</div>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Class</th><th>Age</th><th>Father's Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["class"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["fathername"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<div class='error'>Invalid Login ID or Password</div>";
}
$conn->close();
?>
  <a href="index.html">🔙 Back to Login</a>
</div>

</body>
</html>
