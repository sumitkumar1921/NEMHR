<?php
// Include database connection
include("../db/configdb.php");

// Check if hospitalID is set
if (isset($_GET['hospitalID'])) {
    $hospitalID = $_GET['hospitalID'];

    // Prepare and execute SQL query to fetch doctors based on hospital ID
    $sql = "SELECT doctorID, name, specialization FROM doctor WHERE hospitalID = ? order by name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $hospitalID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched doctors
    $doctors = array();

    // Fetch doctors and add them to the array
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }

    // Return the doctors as JSON
    echo json_encode($doctors);

    // Close statement
    $stmt->close();
} else {
    // If hospitalID is not set, return an empty array
    echo json_encode(array());
}

// Close connection
$conn->close();
?>
