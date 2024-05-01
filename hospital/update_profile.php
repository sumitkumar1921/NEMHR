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

// Function to handle form submission and update hospital details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    $type = $_POST['type'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    $hospitalID = $_SESSION['hospitalID'];

    // Prepare SQL statement to update hospital details
    $sql = "UPDATE hospital SET  type=?, name=?, contact=?, email=?, website=?, address=?, pincode=?, description=?, password=? WHERE hospitalID=?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssisss",  $type, $name, $contact, $email, $website, $address, $pincode, $description, $password, $hospitalID);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Hospital profile updated successfully.'); window.location.href = 'hospital_dashboard.php';</script>";
    } else {
        echo "Error updating hospital profile: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Fetch current hospital details from the database
$sql = "SELECT * FROM hospital WHERE hospitalID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['hospitalID']);
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
<div style="margin-top:10px;" class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Hospital Profile</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-info">
                            <strong>License:</strong> <?php echo isset($row['license']) ? htmlspecialchars($row['license']) : ""; ?>
                        </div>
                        <div class="profile-info">
    <strong>Type:</strong>
    <select name="type">
        <option value="private" <?php if(isset($row['type']) && $row['type'] == "private") echo "selected"; ?>>Private</option>
        <option value="public" <?php if(isset($row['type']) && $row['type'] == "public") echo "selected"; ?>>Public</option>
    </select>
    <!-- Debugging -->
</div>

                        <div class="profile-info">
                            <strong>Name:</strong> <input type="text" name="name" value="<?php echo isset($row['name']) ? htmlspecialchars($row['name']) : ""; ?>" required>
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
                            <strong>Website:</strong> <input type="text" name="website" value="<?php echo isset($row['website']) ? htmlspecialchars($row['website']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Address:</strong> <input type="text" name="address" value="<?php echo isset($row['address']) ? htmlspecialchars($row['address']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Pincode:</strong> <input type="text" name="pincode" value="<?php echo isset($row['pincode']) ? htmlspecialchars($row['pincode']) : ""; ?>" required>
                        </div>
                        <div class="profile-info">
                            <strong>Description:</strong> <input type="text" name="description" value="<?php echo isset($row['description']) ? htmlspecialchars($row['description']) : ""; ?>"required>
                        </div>
                        <div class="profile-info">
                            <strong>Password:</strong> <input type="password" name="password" value="<?php echo isset($row['password']) ? htmlspecialchars($row['password']) : ""; ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button> <a class="btn btn-secondary"href="hospital_dashboard.php">Cancel</a>
            </form>
        </div>
    </div>
</div>


</body>
</html>
