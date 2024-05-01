<?php
include("../db/configdb.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $hospitalID = $_POST["hospitalID"];
    $doctorID = $_POST["doctorID"];
    $patientID = $_POST["patientID"];
    $slotID = $_POST["slotID"];

    // Check if the slot is already booked
    $sql_check = "SELECT * FROM appointments WHERE doctorID = ? AND slotID = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $doctorID, $slotID);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Slot is already booked
        echo "<script>alert('Slot already booked. Please choose another slot.');window.location.href = 'patient_dashboard.php';</script>";
    } else {
        // Slot is available, proceed to book appointment

        // Prepare the SQL statement
        $sql_insert = "INSERT INTO appointments (hospitalID, doctorID, patientID, slotID) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);

        if ($stmt_insert === false) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt_insert->bind_param("iiii",$hospitalID, $doctorID, $patientID, $slotID);

        // Execute the statement
        if ($stmt_insert->execute()) {
            echo "<script>alert('Appointment booked successfully!');window.location.href = 'patient_dashboard.php';</script>";
        } else {
            echo "Error booking appointment: " . $stmt_insert->error;
        }

        // Close insert statement
        $stmt_insert->close();
    }

    // Close select statement and connection
    $stmt_check->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect to the form page
    header("Location:/");
    exit();
}
?>
