<?php
// Include database connection
require_once "../db/configdb.php";

// Check if stateID is set
if (isset($_GET['stateID'])) {
    $stateID = $_GET['stateID'];

    // Prepare and execute SQL query to fetch cities based on state ID
    $sql = "SELECT cityID, city FROM city WHERE stateID = ? order by city";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $stateID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched cities
    $cities = array();

    // Fetch cities and add them to the array
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }

    // Return the cities as JSON
    echo json_encode($cities);

    // Close statement
    $stmt->close();
} else {
    // If stateID is not set, return an empty array
    echo json_encode(array());
}
?>
