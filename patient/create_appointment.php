<?php
// Include database connection
include("../db/configdb.php");

// Check if doctorID is set
if (isset($_GET['doctorID'])) {
    $doctorID = $_GET['doctorID'];

    // Get current date and next date
    $currentDate = date("Y-m-d");
    $nextDate = date("Y-m-d", strtotime("+1 day"));

    // Prepare and execute SQL query to fetch doctor slots based on doctorID and date
    $sql = "SELECT slotID, slotDate, startTime, endTime FROM doctor_slots WHERE doctorID = ? AND (slotDate = ? OR slotDate = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $doctorID, $currentDate, $nextDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched slots
    $slots = array();

    // Fetch slots and add them to the array
    while ($row = $result->fetch_assoc()) {
        $slots[] = $row;
    }

    // Return the slots as JSON
    echo json_encode($slots);

    // Close statement
    $stmt->close();
} else {
    // If doctorID is not set, return an empty array
    echo json_encode(array());
}

// Close connection
$conn->close();
?>
