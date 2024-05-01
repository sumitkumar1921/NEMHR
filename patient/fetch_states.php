<?php
// Include database connection
require_once "../db/configdb.php";

if (isset($_GET['countryID'])) {
    $countryID = $_GET['countryID'];

    // Prepare and execute SQL query to fetch states based on country ID
    $sql = "SELECT stateID, name FROM state WHERE countryID = ? order by name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $countryID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched states
    $states = array();

    // Fetch states and add them to the array
    while ($row = $result->fetch_assoc()) {
        $states[] = $row;
    }

    // Return the states as JSON
    echo json_encode($states);
} else {
    // If countryID is not set, return an empty array
    echo json_encode(array());
}
?>
