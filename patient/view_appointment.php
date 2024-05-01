<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h4 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="javascript:history.back()" class="btn btn-secondary back-btn">Back</a>
    <h4>Appointment Information</h4>
    
    <?php
    session_start();
    
    // Check if patient is not logged in
    if (!isset($_SESSION["patientID"])) {
        // If not logged in, redirect to login page
        header("Location: patient.php");
        exit();
    }
    
    // Include the database configuration file
    require_once "../db/configdb.php";
    
    // Fetch appointments for the patient
    $patientID = $_SESSION["patientID"];
    
    $sql = "SELECT 
    a.appointmentID, 
    ds.slotDate, 
    ds.startTime, 
    ds.endTime, 
    d.name AS doctorName, 
    h.name AS hospitalName, 
    h.address AS hospitalAddress, 
    h.pincode, 
    h.contact AS hospitalContact, 
    h.email AS hospitalEmail
FROM 
    appointments a
INNER JOIN 
    doctor_slots ds ON a.slotID = ds.slotID
INNER JOIN 
    doctor d ON a.doctorID = d.doctorID
INNER JOIN 
    hospital h ON a.hospitalID = h.hospitalID
WHERE 
    a.patientID = ?;
";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if appointments are found
    if ($result->num_rows > 0) 
    ?>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slot Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Doctor Name</th>
                <th>Hospital Name</th>
                <th>Hospital Address</th>
                <th>Pincode</th>
                <th>Hospital Contact</th>
                <th>Hospital Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["appointmentID"] . "</td>";
                echo "<td>" . $row["slotDate"] . "</td>";
                echo "<td>" . $row["startTime"] . "</td>";
                echo "<td>" . $row["endTime"] . "</td>";
                echo "<td>" . $row["doctorName"] . "</td>";
                echo "<td>" . $row["hospitalName"] . "</td>";
                echo "<td>" . $row["hospitalAddress"] . "</td>";
                echo "<td>" . $row["pincode"] . "</td>";
                echo "<td>" . $row["hospitalContact"] . "</td>";
                echo "<td>" . $row["hospitalEmail"] . "</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    
</div>
</body>
</html>
