<?php
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["patientID"])) {
    // If not logged in, redirect to login page
    header("Location: patient.php");
    exit();
}

// Include the database configuration file
require_once "../db/configdb.php";

// Fetch counts for each category


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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
        a{
            text-decoration:none !important;
        }
    </style>
</head>
<body>
<div style="padding:20px;">
    <h5>Dashboard</h5>
</div>
<div style="padding-top:50px" class="container">
    <div class="row">
    <div class="col-md-4">
    <a href="view_medical.php" class="cube-link">
        <div class="cube-box">
            <div class="text-center">
                <i class="fas fa-notes-medical fa-3x"></i>
                <h2>Medical History</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-4">
    <a href="view_appointment.php" class="cube-link">
        <div class="cube-box">
            <div class="text-center">
                <i class="fas fa-calendar-alt fa-3x"></i>
                <h2>Appoint History</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="view_insurance.php" class="cube-link">
        <div class="cube-box">
            <div class="text-center">
                <i class="fas fa-shield-alt fa-3x"></i>
                <h2>Insurance</h2>
            </div>
        </div>
    </a>
</div>



</div>
</body>
</html>
