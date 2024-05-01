<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are provided
    if (isset($_POST["userID"]) && isset($_POST["password"])) {
        // Retrieve email and password from the form
        $userID = $_POST["userID"];
        $password = $_POST["password"];

        // SQL query to check if email and password match
        $sql = "SELECT * FROM patient WHERE userID = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $userID, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Email and password match
            // Store hospital information in session variables
            $patient = $result->fetch_assoc();
            $_SESSION["patientID"] = $patient["patientID"];
            $_SESSION["userID"] = $patient["userID"];
            $_SESSION["patientID"] =$patient["patientID"];
            $_SESSION["firstName"] = $patient["firstName"];
            $_SESSION["lastName"] = $patient["lastName"];
           
            

            // Redirect to hospital dashboard
            header("Location: patient_dashboard.php");
            exit();
        } else {
            // Redirect back to login page with error message
            echo "<script>alert('Invalid email and password');</script>";
            echo "<script>window.location='patient.php?error=Invalid email or password.';</script>";
            exit();
        }
    }
}
?>
