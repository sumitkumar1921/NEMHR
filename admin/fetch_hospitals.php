<?php
// Include database connection
require_once "../db/configdb.php";

// Check if cityID is set
if (isset($_GET['cityID'])) {
    $cityID = $_GET['cityID'];

    // Prepare and execute SQL query to fetch hospitals based on city ID
    $sql = "SELECT hospitalID, name FROM hospital WHERE cityID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cityID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched hospitals
    $hospitals = array();

    // Fetch hospitals and add them to the array
    while ($row = $result->fetch_assoc()) {
        $hospitals[] = $row;
    }

    // Return the hospitals as JSON
    echo json_encode($hospitals);
} else {
    // If cityID is not set, return an empty array
    echo json_encode(array());
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
