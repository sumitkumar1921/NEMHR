<?php
// Check if doctor ID is set and not empty
if (isset($_GET['doctorID']) && !empty($_GET['doctorID'])) {
    // Fetch doctor's slots from the database
    $doctorID = $_GET['doctorID'];

    // Get current date and next date
    $startDate = date("Y-m-d");
    $endDate = date("Y-m-d", strtotime("+6 days"));

    // Include database connection
    require_once "../db/configdb.php";

    // Initialize an array to store slots for each date
    $slotsByDate = array();

    // Iterate over each date and fetch slots
    $currentDate = strtotime($startDate);
    while ($currentDate <= strtotime($endDate)) {
        $currentDateFormatted = date("Y-m-d", $currentDate);

        // Prepare and execute SQL query to fetch doctor slots based on doctorID and date
        $sql = "SELECT slotID,slotDate, startTime, endTime FROM doctor_slots WHERE doctorID = ? AND slotDate = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $doctorID, $currentDateFormatted);
        $stmt->execute();
        $result = $stmt->get_result();

        // Store the slots for the current date in the array
        $slotsByDate[$currentDateFormatted] = array();
        while ($row = $result->fetch_assoc()) {
            $slotsByDate[$currentDateFormatted][] = $row;
        }

        // Move to the next date
        $currentDate = strtotime("+1 day", $currentDate);
    }

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();

    // Output the slots grouped by date
    foreach ($slotsByDate as $date => $slots) {
        echo "<h4>$date</h4>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Date</th>";
        echo "<th>Start Time</th>";
        echo "<th>End Time</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($slots as $slot) {
            echo "<tr>";
            echo "<td>" . $slot['slotID'] . "</td>";
            echo "<td>" .$slot['slotDate']. "</td>";
            echo "<td>" . $slot['startTime'] . "</td>";
            echo "<td>" . $slot['endTime'] . "</td>";
            echo "<td><a class='btn btn-danger' href='slot_delete.php?slotID=" . $slot['slotID'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
} else {
    // If doctorID is not set or empty, display an error message
    echo "<p>No doctor selected.</p>";
}
?>
