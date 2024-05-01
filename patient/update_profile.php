<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["patientID"])) {
    // If not logged in, redirect to login page
    header("Location: patient.php");
    exit();
}

// Include the database configuration file
require_once "../db/configdb.php";

// Function to handle form submission and update patient details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $bloodGroup = $_POST['bloodGroup'];
    $aadharNumber = $_POST['aadharNumber'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $userID = $_POST['userID'];
    $password = $_POST['password'];

    // Ensure $_SESSION['userID'] is treated as a string
    $patientID = $_SESSION['patientID'];

    // Prepare SQL statement to update patient details
    $sql = "UPDATE patient SET firstName=?, lastName=?, gender=?, dateOfBirth=?, contact=?, email=?, bloodGroup=?, aadharNumber=?, city=?, state=?, address=?, userID=?, password=? WHERE patientID=?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssssssssssi", $firstName, $lastName, $gender, $dateOfBirth, $contact, $email, $bloodGroup, $aadharNumber, $city, $state, $address, $userID, $password, $patientID);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Profile Updated Successfully.');window.location.href = 'patient_dashboard.php';</script>";
    } else {
        echo "Error updating patient details: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Fetch current patient details from the database
$sql = "SELECT * FROM patient WHERE userID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['userID']); // Bind $_SESSION['userID'] as a string
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
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
            <h4>Patient Profile</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-info">
                            <strong>First Name:</strong> <input type="text" name="firstName" value="<?php echo isset($row['firstName']) ? htmlspecialchars($row['firstName']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Last Name:</strong> <input type="text" name="lastName" value="<?php echo isset($row['lastName']) ? htmlspecialchars($row['lastName']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
    <strong>Gender:</strong>
    <select name="gender">
        <option value="Male" <?php if(isset($row['gender']) && $row['gender'] == "Male") echo "selected"; ?>>Male</option>
        <option value="Female" <?php if(isset($row['gender']) && $row['gender'] == "Female") echo "selected"; ?>>Female</option>
        <option value="Other" <?php if(isset($row['gender']) && $row['gender'] == "Other") echo "selected"; ?>>Other</option>
    </select>
</div>

                        <div class="profile-info">
                            <strong>Date of Birth:</strong> <input type="date" name="dateOfBirth" value="<?php echo isset($row['dateOfBirth']) ? htmlspecialchars($row['dateOfBirth']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Contact:</strong> <input type="text" name="contact" value="<?php echo isset($row['contact']) ? htmlspecialchars($row['contact']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Email:</strong> <input type="text" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ""; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="profile-info">
    <strong>Blood Group:</strong>
    <select name="bloodGroup" required>
        <option value="" disabled selected>Select Blood Group</option>
        <option value="A+" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "A+") echo "selected"; ?>>A+</option>
        <option value="A-" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "A-") echo "selected"; ?>>A-</option>
        <option value="B+" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "B+") echo "selected"; ?>>B+</option>
        <option value="B-" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "B-") echo "selected"; ?>>B-</option>
        <option value="AB+" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "AB+") echo "selected"; ?>>AB+</option>
        <option value="AB-" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "AB-") echo "selected"; ?>>AB-</option>
        <option value="O+" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "O+") echo "selected"; ?>>O+</option>
        <option value="O-" <?php if(isset($row['bloodGroup']) && $row['bloodGroup'] == "O-") echo "selected"; ?>>O-</option>
    </select>
</div>

                        <div class="profile-info">
                            <strong>Aadhar Number:</strong> <input type="text" name="aadharNumber" value="<?php echo isset($row['aadharNumber']) ? htmlspecialchars($row['aadharNumber']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>City:</strong> <input type="text" name="city" value="<?php echo isset($row['city']) ? htmlspecialchars($row['city']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>State:</strong> <input type="text" name="state" value="<?php echo isset($row['state']) ? htmlspecialchars($row['state']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Address:</strong> <input type="text" name="address" value="<?php echo isset($row['address']) ? htmlspecialchars($row['address']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>User ID:</strong><input type="text" name="userID" value="<?php echo isset($row['userID']) ? htmlspecialchars($row['userID']) : ""; ?>" required> <!-- Display the current user ID -->
                        </div>
                        <div class="profile-info">
                            <strong>Password:</strong> <!-- Input field for password (for updating password) -->
                            <input type="password" name="password" placeholder="Enter new password" value="<?php echo isset($row['password']) ? htmlspecialchars($row['password']) : ""; ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="patient_dashboard.php" class="btn btn-secondary">Cancel</a>
                
            </form>
        </div>
    </div>
</div>
</body>
</html>
