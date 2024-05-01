<?php
// Start the session
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
    <title>Slots Dashboard</title>
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
        <h4 style="padding-top:10px;" class="text-center mb-4">Slots Management</h4>
        <div class="cube-container">
            <!-- Cube box to view doctors -->
            <div class="cube">
                <a href="view_slot.php">
                <i class="fas fa-dice"></i>
                    <p>View Slots</p>
                </a>
            </div>
            <!-- Cube box to add a new doctor -->
            <div class="cube">
                <a href="add_slot.php">
                <i class="fas fa-dice"></i> 
                    <p>Add Slots</p>
                </a>
            </div>
            
            <!-- Add more cube boxes for other functionalities -->
        </div>
    </div>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
