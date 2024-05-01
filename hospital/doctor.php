<?php
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Additional CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }
        .container {
            max-width: 800px;
        }
        .cube-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 30px;
        }
        .cube {
            width: 150px;
            height: 150px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .cube:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .cube a {
            color: #fff;
            text-decoration: none;
        }
        .cube i {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .cube p {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 style="padding-top:15px;" class="text-center mb-4">Doctor Management</h4>
        <hr>
        <div class="cube-container">
            <!-- Cube box to view doctors -->
            <div class="cube">
                <a href="view_doctors.php">
                    <i class="fas fa-users"></i>
                    <p>View Doctors</p>
                </a>
            </div>
            <!-- Cube box to add a new doctor -->
            <div class="cube">
                <a href="add_doctor.php">
                    <i class="fas fa-user-plus"></i>
                    <p>Add Doctor</p>
                </a>
            </div>
            <!-- Cube box to update doctor status -->
            <div class="cube">
                <a href="update_status.php">
                    <i class="fas fa-user-edit"></i>
                    <p>Update Status</p>
                </a>
            </div>
            <!-- Additional menu items for doctor management -->
            
            <!-- Add more cube boxes for other functionalities -->
        </div>
    </div>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
