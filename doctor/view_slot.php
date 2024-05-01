<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["doctorID"])) {
    // If not logged in, redirect to login page
    header("Location: doctor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Slots</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 10px;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: #007bff;
        }

        .date-header {
            font-weight: bold;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>

<div class="container">
    <button onclick="goBack()" class="btn btn-primary mb-3">Back</button>
    <h3>Doctor Slots</h3>
    <?php
    // Include database connection
    require_once "../db/configdb.php";

    // Fetch doctor's slots grouped by date
    $doctorID = $_SESSION['doctorID'];

    // Get current date and calculate dates for the next 7 days
    $currentDate = date("Y-m-d");
    $nextWeekDates = array();
    for ($i = 0; $i < 7; $i++) {
        $nextWeekDates[] = date("Y-m-d", strtotime("+$i day", strtotime($currentDate)));
    }

    // Prepare and execute SQL query to fetch doctor slots based on doctorID and dates for the next week
    $sql = "SELECT slotID, slotDate, startTime, endTime FROM doctor_slots WHERE doctorID = ? AND slotDate IN (" . implode(',', array_fill(0, count($nextWeekDates), '?')) . ") ORDER BY slotDate, startTime";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($nextWeekDates) + 1), $doctorID, ...$nextWeekDates);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize a variable to keep track of the current date
    $currentDate = null;

    // Display the slots in a table grouped by date
    while ($row = $result->fetch_assoc()) {
        // If it's a new date, display a header with the date
        if ($row['slotDate'] !== $currentDate) {
            if ($currentDate !== null) {
                echo "</tbody></table>"; // Close previous table if not the first date
            }
            $currentDate = $row['slotDate'];
            echo "<h5 class='date-header mt-4'>$currentDate</h5>";
            echo "<table class='table table-striped'>";
            echo "<thead class='thead-dark'><tr><th>ID</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Action</th></tr></thead><tbody>";
        }
        
        // Display the slot
        echo "<tr>";
        echo "<td>" .$row['slotID'] . "</td>";
        echo "<td>" . $row['slotDate'] . "</td>";
        echo "<td>" . $row['startTime'] . "</td>";
        echo "<td>" . $row['endTime'] . "</td>";
        echo "<td><a class='btn btn-danger' href='slot_delete.php?slotID=" . $row['slotID'] . "'>Delete</a></td>";
        echo "</tr>";
    }

    // Close the last table
    echo "</tbody></table>";

    // Close statement and database connection
    $stmt->close();
    $conn->close();
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
