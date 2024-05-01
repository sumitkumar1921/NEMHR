<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["doctorID"])) {
    // If not logged in, redirect to login page
    header("Location: doctor.php");
    exit();
}

// Include database connection
include_once "../db/configdb.php";

// Get current date
$currentDate = date("Y-m-d");

// Retrieve appointments data for the current date onwards
$query = "SELECT appointments.appointmentID, appointments.patientID, appointments.doctorID, patient.*,  doctor_slots.slotDate, doctor_slots.startTime, doctor_slots.endTime
          FROM appointments
          INNER JOIN doctor ON appointments.doctorID = doctor.doctorID
          INNER JOIN patient ON appointments.patientID = patient.patientID
          INNER JOIN doctor_slots ON appointments.slotID = doctor_slots.slotID
          WHERE appointments.doctorID = {$_SESSION["doctorID"]}
          AND doctor_slots.slotDate >= '$currentDate'";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            padding-top: 20px;
        }
        .container {
            max-width:95%;
            margin: 0 auto;
        }
        h4 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            background-color: #fff;
            border-collapse: collapse;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
<a href="doctor_dashboard.php" class="btn btn-primary back-btn">Back</a>
    <h4>Appointment Patient Details</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slot Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Add Prescription</th>
                <th>View Prescription</th> <!-- Added column for actions -->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" .$row["appointmentID"]."</td>";
                echo "<td>" . $row["slotDate"] . "</td>";
                echo "<td>" . $row["startTime"] . "</td>";
                echo "<td>" . $row["endTime"] . "</td>";
                echo "<td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                
                echo "<td>";
                // Add button for adding description
                echo "<form action='add_description.php' method='post'>";
                echo "<input type='hidden' name='appointmentID' value='" . $row["appointmentID"] . "'>";
                echo "<input type='hidden' name='patientID' value='" . $row["patientID"] . "'>";
                echo "<input type='hidden' name='doctorID' value='" . $row["doctorID"] . "'>";
                echo "<button type='submit' class='btn btn-primary btn-sm'>Add Prescription</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                // Add button for previewing previous description
                echo "<form action='preview_description.php' method='post'>";
                echo "<input type='hidden' name='patientID' value='" . $row["patientID"] . "'>";
                echo "<button type='submit' class='btn btn-secondary btn-sm'>View Prescription</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
