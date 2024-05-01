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

// Fetch doctors associated with the hospital
$hospitalID = $_SESSION['hospitalID'];
$fetchDoctorsQuery = "SELECT * FROM doctor WHERE hospitalID = '$hospitalID'";
$result = $conn->query($fetchDoctorsQuery);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $doctorID = $_POST['doctorID'];
    $newStatus = mysqli_real_escape_string($conn, $_POST['newStatus']);

    // Update the status of the doctor
    $updateStatusQuery = "UPDATE doctor SET status = '$newStatus' WHERE doctorID = '$doctorID'";

    if ($conn->query($updateStatusQuery) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: hospital_dashboard.php"); // Redirect to doctor list page
        exit();
    } else {
        // Handle error
        echo "Error updating status: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor Status</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding-top: 50px;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h4 {
    text-align: center;
    color: #007bff;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Style for the error message */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

    </style>

</head>
<body>
    <div class="container">
        <h4 class="mt-4">Update Doctor Status</h4>
        <hr>
        
        <!-- Doctor Selection Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="doctorID">Select Doctor:</label>
                <select name="doctorID" class="form-control" required>
                    <option value="">Not selected doctor</option>
                    <?php 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['doctorID']."'>".$row['name']."</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No doctors found</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="newStatus">Select New Status:</label>
                <select name="newStatus" class="form-control" required>
                   <option value="">Not selected status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
            <button onclick="goBack()" class="btn btn-primary">Back</button>
        </form>
    </div>

    <script>
    function goBack() {
      window.history.back();
    }
  </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
