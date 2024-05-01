<?php


// Include database connection
include_once "../db/configdb.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and retrieve search parameters
    $searchName = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $searchDOB = isset($_POST['dob']) ? mysqli_real_escape_string($conn, $_POST['dob']) : '';
    $searchAadharNumber = isset($_POST['aadharNumber']) ? mysqli_real_escape_string($conn, $_POST['aadharNumber']) : '';

    // Construct SQL query
    $query = "SELECT patient.* FROM patient WHERE 1";

    // Add search conditions if provided
    if (!empty($searchName)) {
        $query .= " AND (patient.firstName LIKE '%$searchName%')";
    }
    if (!empty($searchDOB)) {
        $query .= " AND patient.dateOfBirth = '$searchDOB'";
    }
    if (!empty($searchAadharNumber)) {
        $query .= " AND patient.aadharNumber = '$searchAadharNumber'";
    }

    // Execute query
    $result = mysqli_query($conn, $query);

    // Initialize an array to store search results
    $searchResults = [];

    // Fetch search results and store in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row;
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($searchResults);
    exit();
}
?>
