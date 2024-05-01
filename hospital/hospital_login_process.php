<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are provided
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Retrieve email and password from the form
        $email = $_POST["email"];
        $password = $_POST["password"];

        // SQL query to check if email and password match
        $sql = "SELECT * FROM hospital WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Email and password match
            // Store hospital information in session variables
            $hospital = $result->fetch_assoc();
            $_SESSION["hospitalID"] = $hospital["hospitalID"];
            $_SESSION["email"] = $hospital["email"];
            $_SESSION["name"] = $hospital["name"];
            $_SESSION["license"] = $hospital["license"];
            $_SESSION["contact"] = $hospital["contact"];
            $_SESSION["website"] = $hospital["website"];
            $_SESSION["address"] = $hospital["address"];
            $_SESSION["description"] = $hospital["description"];

            // Redirect to hospital dashboard
            header("Location: hospital_dashboard.php");
            exit();
        } else {
            // Redirect back to login page with error message
            echo "<script>alert('Invalid email and password');</script>";
            echo "<script>window.location='hospital_login.php?error=Invalid email or password.';</script>";
            exit();
        }
    }
}
?>
