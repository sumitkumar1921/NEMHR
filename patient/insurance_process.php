<?php
// Start the session
session_start();
include_once("../db/configdb.php");
// Check if hospital is not logged in
if (!isset($_SESSION["patientID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include database connection


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $patientID = $_POST["patientID"];
    $policyType = $_POST["policyType"];
    $policyNumber = $_POST["policyNumber"];
    $provider = $_POST["provider"];
    $validFrom = $_POST["validFrom"];
    $validTo = $_POST["validTo"];

    // Prepare insert statement
    $stmt = $conn->prepare("INSERT INTO insurance (patientID, policyType, policyNumber, provider, validFrom, validTo) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("isssss", $patientID, $policyType, $policyNumber, $provider, $validFrom, $validTo);

    // Execute statement
    if ($stmt->execute()) {
        // Insurance information inserted successfully
        echo "<script>alert('Insurance information added successfully.');</script>";
    } else {
        // Error occurred while inserting insurance information
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close statement
    $stmt->close();
} else {
    // If not a POST request, redirect to form page
    header("Location: insurance.php");
    exit();
}

// Close database connection
$conn->close();
?>
