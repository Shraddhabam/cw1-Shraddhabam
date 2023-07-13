<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeinfodata";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['user'];
$email = $_POST['email'];
$message = $_POST['message'];

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the form data
$stmt = $conn->prepare("INSERT INTO userinfodata (user, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $message);

// Execute the statement
if ($stmt->execute()) {
  
  header('Location: index.html');
  // Data inserted successfully
} else {
  // Error occurred while inserting data
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>