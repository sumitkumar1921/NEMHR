<?php
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include database connection
include_once "../db/configdb.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and retrieve search parameters
    $patientID = isset($_POST['patientID']) ? mysqli_real_escape_string($conn, $_POST['patientID']) : '';
    $provider = isset($_POST['provider']) ? mysqli_real_escape_string($conn, $_POST['provider']) : '';
    $policyNumber = isset($_POST['policyNumber']) ? mysqli_real_escape_string($conn, $_POST['policyNumber']) : '';

    // Log the search parameters
    // Implement logging here if needed
    // For example: error_log("Search Parameters: Patient ID: $patientId, Provider: $provider, Policy Number: $policyNumber");

    // Construct SQL query
    $query = "SELECT * FROM insurance WHERE 1";

    // Add search conditions if provided
    if (!empty($patientID)) {
        $query .= " AND patientID = '$patientID'";
    }
    if (!empty($provider)) {
        $query .= " AND provider = '$provider'";
    }
    if (!empty($policyNumber)) {
        $query .= " AND policyNumber = '$policyNumber'";
    }

    // Log the SQL query
    // Implement logging here if needed
    // For example: error_log("SQL Query: $query");

    // Execute query
    $result = mysqli_query($conn, $query);

    // Initialize an array to store search results
    $searchResults = [];

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) { // corrected the comparison operator
        // Fetch all rows of insurance data
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    } else {
        // If no results found, return an empty array
        $searchResults = [];
    }
    
    // Log the search results
    error_log("Search Results: " . print_r($searchResults, true));

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($searchResults);
    exit();
}
?>
