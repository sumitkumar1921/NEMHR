<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<a style="margin:20px" href="doctor_dashboard.php" class="btn btn-primary back-btn">Back</a>
    <div class="text-center"><h4>All Patient Details </h4></div>
    <?php
    // Start the session
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["doctorID"])) {
        // If not logged in, redirect to login page
        header("Location: doctor.php");
        exit();
    }

    // Include your database connection file
    include_once "../db/configdb.php";

    // Query to select appointments and patient details
    $query = "SELECT DISTINCT patient.patientID, patient.firstName, patient.lastName, patient.dateOfBirth, patient.gender, patient.bloodGroup, patient.contact, patient.email 
    FROM patient 
    INNER JOIN appointments ON  patient.patientID  = appointments.patientID
    WHERE appointments.doctorID = {$_SESSION['doctorID']}";


    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='container'>";
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Blood Group</th><th>Contact</th><th>Email</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" .$row['patientID'] ."</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['dateOfBirth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['bloodGroup'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<p>No appointments found.</p>";
        echo "</div>";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
