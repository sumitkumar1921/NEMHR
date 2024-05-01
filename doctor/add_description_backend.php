<?php
// Start the session
session_start();

// Check if the form is submitted and if the user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["doctorID"])) {
    // Include database connection
    include_once "../db/configdb.php";

    // Check if description and appointment details are provided
    if (isset($_POST["description"], $_POST["appointmentID"], $_POST["patientID"], $_POST["doctorID"])) {
        // Sanitize input
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $appointmentID = mysqli_real_escape_string($conn, $_POST["appointmentID"]);
        $patientID = mysqli_real_escape_string($conn, $_POST["patientID"]);
        $doctorID = mysqli_real_escape_string($conn, $_POST["doctorID"]);

        // Insert the description into the database
        $sql = "INSERT INTO description (appointmentID, patientID, doctorID, description) VALUES ('$appointmentID', '$patientID', '$doctorID', '$description')";
        if (mysqli_query($conn, $sql)) {
            // Description added successfully
            echo "<script>alert('Description added successfully.'); window.location.replace('doctor_dashboard.php');</script>";
        } else {
            // Error in adding description
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.replace('add_description.php');</script>";
        }
    } else {
        // If appointment details are not provided, display an error message
        echo "<script>alert('Error: Appointment details not provided.'); window.location.replace('add_description.php');</script>";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // If the form is not submitted or the user is not logged in, redirect to an error page or display an error message
    echo "<script>alert('Error: Unauthorized access.'); window.location.replace('add_description.php');</script>";
}
?>
