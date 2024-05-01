<?php
// Establish database connection
include("../db/configdb.php");

// Initialize an empty array to store state data
$states = array();

// Fetch state IDs and names from the states table
$sql = "SELECT stateID, name FROM state order by name";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are any states
    if ($result->num_rows > 0) {
        // Fetch and store state data
        while ($row = $result->fetch_assoc()) {
            $states[] = $row;
        }
    }
    // Close the result set
    $result->close();
} else {
    // Handle the case where the query fails
    $states = array(); // Return an empty array
}

// Close connection
$conn->close();

// Return states data in JSON format
echo json_encode($states);
?>
