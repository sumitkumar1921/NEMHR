<?php
// Start the session
session_start();

// Include database configuration
require_once "../db/configdb.php";

// Check if user is logged in
if (!isset($_SESSION["doctorID"])) {
    // If not logged in, redirect to login page
    header("Location: doctor.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $startDate = $_POST['availableDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $doctorID = $_SESSION['doctorID']; // Get doctorID from session

    // Check if start time is before end time
    if ($startTime >= $endTime) {
        echo "<script>alert('Error: End time must be after start time');window.location.replace('add_slot.php');</script>";
        exit();
    }

    // Calculate the difference between start time and end time in minutes
    $startTimestamp = strtotime($startTime);
    $endTimestamp = strtotime($endTime);
    $timeDifference = ($endTimestamp - $startTimestamp) / 60; // in minutes

    // Check if the difference is at least 15 minutes
    if ($timeDifference < 15) {
        echo "<script>alert('Error: Slot duration must be at least 15 minutes');window.location.replace('add_slot.php');</script>";
        exit();
    }

    // Iterate over each day of the week and insert slots
    $currentDate = strtotime($startDate);
    $endDate = strtotime("+6 days", $currentDate); // End date is 6 days from the start date

    while ($currentDate <= $endDate) {
        $currentDateFormatted = date("Y-m-d", $currentDate);

        // Insert slots for the current date
        $slotTime = $startTime;
        while ($slotTime < $endTime) {
            // Calculate end time for each slot
            $slotEndTime = date('H:i:s', strtotime($slotTime . ' +15 minutes'));

            // Check if slot already exists for the doctor at the specified time on the given date
            $sql_check_slot = "SELECT * FROM doctor_slots WHERE doctorID = '$doctorID' AND slotDate = '$currentDateFormatted' AND ((startTime >= '$slotTime' AND startTime < '$slotEndTime') OR (endTime > '$slotTime' AND endTime <= '$slotEndTime'))";
            $result_check_slot = mysqli_query($conn, $sql_check_slot);
            if (mysqli_num_rows($result_check_slot) > 0) {
                echo "<script>alert('Error: Slot already exists for the doctor at the specified time on the given date');window.location.replace('add_slot.php');</script>";
                exit();
            }

            // Insert slot into database
            $sql_insert = "INSERT INTO doctor_slots (doctorID, slotDate, startTime, endTime) VALUES ('$doctorID', '$currentDateFormatted', '$slotTime', '$slotEndTime')";
            if (!mysqli_query($conn, $sql_insert)) {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');window.location.replace('add_slot.php');</script>";
                exit();
            }

            // Increment slot time by 15 minutes
            $slotTime = date('H:i:s', strtotime($slotTime . ' +15 minutes'));
        }

        // Move to the next day
        $currentDate = strtotime("+1 day", $currentDate);
    }

    // Close connection
    mysqli_close($conn);

    // Redirect to doctor dashboard upon successful insertion
    echo "<script>alert('Slots added successfully');window.location.replace('doctor_dashboard.php');</script>";
    exit();
} else {
    // Handle invalid requests
    echo "<script>alert('Invalid request');window.location.replace('add_slot.php');</script>";
    exit();
}
?>
