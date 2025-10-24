<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // XAMPP default user
$password_db = ""; // XAMPP default password (empty)
$dbname = "Registation";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if (isset($_POST['sub'])) {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Password hash for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO signup (firstName, lastName, email, number, password)
            VALUES ('$firstName', '$lastName', '$email', '$number', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Registration Successful!";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
