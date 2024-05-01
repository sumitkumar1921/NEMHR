<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["doctorID"])) {
    // If not logged in, redirect to login page
    header("Location: doctor.php");
    exit();
}

// Include the database configuration file
require_once "../db/configdb.php";

// Prepare the SQL statement with a parameter placeholder
$sql = "SELECT * FROM doctor WHERE doctorID = ?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $_SESSION['doctorID']);

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
        echo "No Doctor found with the provided doctorID.";
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
    <title>Doctor Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
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
            <h4>Doctor Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-info">
                        <strong>Name:</strong> <?php echo $row['name']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Gender:</strong> <?php echo $row['gender']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Date of Birth:</strong> <?php echo $row['DOB']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Specialization:</strong> <?php echo $row['specialization']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>License:</strong> <?php echo $row['license']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="profile-info">
                        <strong>Experience:</strong> <?php echo $row['experience']; ?> years
                    </div>
                    <div class="profile-info">
                        <strong>Contact:</strong> <?php echo $row['contact']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Email:</strong> <?php echo $row['email']; ?>
                    </div>
                    <div class="profile-info">
                        <strong>Address:</strong> <?php echo $row['address']; ?>
                    </div>
                    <a class="btn btn-primary" href="update_profile.php">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
