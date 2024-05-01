<?php
// Include database connection
require_once "../db/configdb.php";

// Check if doctorID is provided
if (isset($_POST['doctorID'])) {
    // Sanitize the input
    $doctorID = mysqli_real_escape_string($conn, $_POST['doctorID']);

    // Prepare and execute SQL query to fetch doctor slots based on doctorID
    $sql = "SELECT  slotDate, startTime, endTime FROM doctor_slots WHERE doctorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctorID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an array to store the fetched slots
    $slots = array();

    // Fetch slots and add them to the array
    while ($row = $result->fetch_assoc()) {
        // Format slot start time and end time

        $start = $row['slotDate'] . 'T' . $row['startTime'];
        $end = $row['slotDate'] . 'T' . $row['endTime'];

        // Add slot to array
        $slots[] = array(
            
            'start' => $start,
            'end' => $end
        );
    }

    // Return the slots as JSON
    echo json_encode($slots);
} else {
    // If doctorID is not provided, return an empty array
    echo json_encode(array());
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
