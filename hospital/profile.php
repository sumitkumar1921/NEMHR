<?php
// Start the session
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include the database configuration file
require_once "../db/configdb.php";

// Prepare the SQL statement with a parameter placeholder
$sql = "SELECT * FROM hospital WHERE hospitalID = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $_SESSION['hospitalID']);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if query was successful
if ($result) {
    // Fetch the data as an associative array
    $row = mysqli_fetch_assoc($result);
    
    // Check if row exists
    if (!$row) {
        echo "No hospital found with the provided hospital ID.";
    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto;
            margin-top: -75px;
        }
        .profile-info {
            padding: 10px;
        }
        .profile-info strong {
            width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Hospital Profile</h4>
        </div>
        
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-info">
                        <strong>License:</strong> <?php echo $row['license']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Type:</strong> <?php echo ucfirst($row['type']); ?>
                    </div>
                    <div class="profile-info">
                        <strong>Name:</strong> <?php echo $row['name']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Contact:</strong> <?php echo $row['contact']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Email:</strong> <?php echo $row['email']; ?>
                    </div>
                    <a href="update_profile.php" class="btn btn-primary">Update</a>
                </div>
                <div class="col-md-6">
                    <div class="profile-info">
                        <strong>Website:</strong> <?php echo $row['website']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Address:</strong> <?php echo $row['address']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Pincode:</strong> <?php echo $row['pincode']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Description:</strong> <?php echo $row['description']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Status:</strong> <?php echo ucfirst($row['status']); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
