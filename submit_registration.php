<?php
// Database configuration
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "moas_db";  // The database name you created

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$subParish = $_POST['subParish'];

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (`Full Name`, `Email`, `Contact Number`, `Sub Parish`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $contact, $subParish);  // "ssss" indicates four strings

// Execute the statement
if ($stmt->execute()) {
    // Display a success message and then redirect
    echo "
    <script>
        alert('Your input data has been recorded successfully! Redirecting to the main page...');
        setTimeout(function(){
            window.location.href = 'main.php';  // Change to your main page
        }, 3000);  // Redirect after 3 seconds
    </script>
    ";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
