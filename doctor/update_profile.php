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

// Function to handle form submission and update doctor details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $specialization = $_POST['specialization'];
    $license = $_POST['license'];
    $experience = $_POST['experience'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $doctorID = $_SESSION['doctorID'];

    // Prepare SQL statement to update doctor details
    $sql = "UPDATE doctor SET name=?, gender=?, DOB=?, specialization=?,  experience=?, contact=?, email=?, address=?, password=? WHERE doctorID=?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssissssi", $name, $gender, $dob, $specialization,  $experience, $contact, $email, $address, $password, $doctorID);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Doctor profile updated successfully.'); window.location.href = 'doctor_dashboard.php';</script>";
    } else {
        echo "Error updating doctor profile: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Fetch current doctor details from the database
$sql = "SELECT * FROM doctor WHERE doctorID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['doctorID']);
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
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-info">
                            <strong>Name:</strong> <input type="text" name="name" value="<?php echo isset($row['name']) ? htmlspecialchars($row['name']) : ""; ?>" required>
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
                            <strong>Date of Birth:</strong> <input type="date" name="dob" value="<?php echo isset($row['DOB']) ? htmlspecialchars($row['DOB']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Specialization:</strong> <input type="text" name="specialization" value="<?php echo isset($row['specialization']) ? htmlspecialchars($row['specialization']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>License:</strong> <?php echo isset($row['license']) ? htmlspecialchars($row['license']) : ""; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info">
                            <strong>Experience:</strong> <input type="text" name="experience" value="<?php echo isset($row['experience']) ? htmlspecialchars($row['experience']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Contact:</strong> <input type="text" name="contact" value="<?php echo isset($row['contact']) ? htmlspecialchars($row['contact']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Email:</strong> <input type="text" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Address:</strong> <input type="text" name="address" value="<?php echo isset($row['address']) ? htmlspecialchars($row['address']) : ""; ?>"required>
                        </div>
                        <div class="profile-info">
                            <strong>Password:</strong> <input type="password" name="password" value="<?php echo isset($row['password']) ? htmlspecialchars($row['password']) : ""; ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button> <a class="btn btn-primary"href="doctor_dashboard.php">Cancel</a>
                
            </form>
            
        </div>
    </div>
</div>
</body>
</html>
