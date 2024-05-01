<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if form is submitted and email and password are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a SELECT statement
    $stmt = $conn->prepare("SELECT * FROM doctor WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password); // bind $loginPassword instead of $adminPassword

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Admin login successful, store user information in session variables
        $user = $result->fetch_assoc();
        $_SESSION['doctorID'] = $user['doctorID'];  
        $_SESSION['name'] =$user['name'];
       
        

        // Redirect to admin dashboard or home page
        header("Location: doctor_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email and password');</script>";
        echo "<script>window.location='doctor.php?error=Invalid email or password.';</script>";
         exit();
    }

    // Close the statement
    
}

// Close database connection
$conn->close();
?>
