<?php
// config.php (Database credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'coursework';

// Create a connection to the MySQL server
$conn = mysqli_connect($host, $username, $password);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, $database) or die("Could not select database");


// Create the table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS user_form (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $query)) {
    echo "Table 'user_form' created successfully or already exists.";
} else {
    die("Error creating table: " . mysqli_error($conn));
}

// Handle user registration form submission
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Avoid using md5 for password hashing (see note below)
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User already exists!';
    } else {
        mysqli_query($conn, "INSERT INTO `user_form` (name, email, password) VALUES ('$name', '$email', '$pass')") or die('query failed');
        $message[] = 'Registered successfully!';
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">' . $msg . '</div>';
    }
}
?>

<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <input type="text" name="name" required placeholder="Enter username" class="box">
        <input type="email" name="email" required placeholder="Enter email" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
        <input type="submit" name="submit" class="btn" value="Register Now">
        <p>Already have an account? <a href="login.php">Login Now</a></p>
    </form>
</div>

</body>
</html>
<?php
// config.php (Database credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'shop_db';

// Create a connection to the MySQL server
$conn = mysqli_connect($host, $username, $password);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, $database) or die("Could not select database");

// Create the table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS user_form (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $query)) {
    echo "Table 'user_form' created successfully or already exists.";
} else {
    die("Error creating table: " . mysqli_error($conn));
}

// Handle user registration form submission
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Avoid using md5 for password hashing (see note below)
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User already exists!';
    } else {
        mysqli_query($conn, "INSERT INTO `user_form` (name, email, password) VALUES ('$name', '$email', '$pass')") or die('query failed');
        $message[] = 'Registered successfully!';
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">' . $msg . '</div>';
    }
}
?>

<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <input type="text" name="name" required placeholder="Enter username" class="box">
        <input type="email" name="email" required placeholder="Enter email" class="box">
        <input type="password" name="password" required placeholder="Enter password" class="box">
        <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
        <input type="submit" name="submit" class="btn" value="Register Now">
        <p>Already have an account? <a href="login.php">Login Now</a></p>
    </form>
</div>

</body>
</html>
