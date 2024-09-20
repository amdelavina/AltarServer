<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "moas_db"; // The database you created

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$subParish = $_POST['subParish'];

// Insert user into the database (using backticks for column names with spaces)
$sql = "INSERT INTO users (`Full Name`, `Email`, `Contact Number`, `Sub Parish`) 
        VALUES ('$name', '$email', '$contact', '$subParish')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
