<?php
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include the database configuration file
require_once "../db/configdb.php";

// Fetch counts for each category using regular queries and hospitalID
$hospitalID = $_SESSION["hospitalID"];

// Fetch count of doctors
$sqlDoctor = "SELECT COUNT(*) as count FROM doctor WHERE hospitalID = '$hospitalID'";
$resultDoctor = $conn->query($sqlDoctor);
$rowDoctor = $resultDoctor->fetch_assoc();
$doctorCount = $rowDoctor['count'];

// Fetch count of patients
$sqlpatient = "SELECT COUNT(DISTINCT patientID) AS patientcount FROM appointments WHERE hospitalID = $hospitalID";
$resultpatient = $conn->query($sqlpatient);
$rowpatient = $resultpatient->fetch_assoc();
$patientCount = $rowpatient['patientcount'];


// Fetch count of staff
$sqlStaff = "SELECT COUNT(*) as count FROM staff WHERE hospitalID = '$hospitalID'";
$resultStaff = $conn->query($sqlStaff);
$rowStaff = $resultStaff->fetch_assoc();
$staffCount = $rowStaff['count'];

// Fetch count of departments
$sqlDepartment = "SELECT COUNT(*) as count FROM department WHERE hospitalID = '$hospitalID'";
$resultDepartment = $conn->query($sqlDepartment);
$rowDepartment = $resultDepartment->fetch_assoc();
$departmentCount = $rowDepartment['count'];

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }
        .container {
            max-width: 800px;
        }
        .cube-box {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .cube-box:hover {
            transform: scale(1.05);
        }
        .cube-box h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .cube-box p {
            font-size: 18px;
            margin-bottom: 0;
            color: #555;
        }
        .icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #007bff;
        }
    </style>
</head>
<body>
<div style="padding:15px;">
    <h4 class="text-center">Dashboard</h4>
</div>
<hr>
<div  class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-user-md icon"></i>
                    <h2>Doctor</h2>
                    <p><?php echo $doctorCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-user-injured icon"></i>
                    <h2>Patient</h2>
                    <p><?php echo $patientCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-users icon"></i>
                    <h2>Staff</h2>
                    <p><?php echo $staffCount; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-hospital icon"></i>
                    <h2>Department</h2>
                    <p><?php echo $departmentCount; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
