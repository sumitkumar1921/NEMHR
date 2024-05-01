<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Retrieve username and password from the form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // SQL query to check if username and password match
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Username and password match
            // Store username in session variable
            $user = $result->fetch_assoc();
            
            $_SESSION["username"] = $user["username"];
            $_SESSION["name"]= $user["name"];
            $_SESSION["adminID"] = $user["adminID"];
            // Redirect to dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid email and password');</script>";
            echo "<script>window.location='admin.php?error=Invalid email or password.';</script>";
            exit();
        }
    }
}
?>
