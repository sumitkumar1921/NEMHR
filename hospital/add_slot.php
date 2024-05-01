<?php
// Start the session
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include your database connection file
include_once "../db/configdb.php"; // Make sure to replace "db_connection.php" with the actual file name

// Fetch doctor IDs and names based on hospital ID
$hospitalID = $_SESSION["hospitalID"];
$sql = "SELECT doctorID, name FROM doctor WHERE hospitalID = $hospitalID";
$result = mysqli_query($conn, $sql);

// Check if any doctors are found
if (mysqli_num_rows($result) > 0) {
    // Doctors found, create dropdown options
    $doctorOptions = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $doctorID = $row['doctorID'];
        $doctorName = $row['name'];
        $doctorOptions .= "<option value='$doctorID'>ID: $doctorID - Name: $doctorName</option>";
    }
} else {
    // No doctors found
    $doctorOptions = "<option value=''>No doctors available</option>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Slots</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Add Slots</h2>
            <form method="post" action="add_slot_process.php">
                <!-- Dropdown for doctor selection -->
                <div class="form-group">
                    <label for="doctorID">Doctor:</label>
                    <select class="form-control" id="doctorID" name="doctorID" required>
                        <?php echo $doctorOptions; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="availableDate">Available Date:</label>
                    <input type="date" class="form-control" id="availableDate" name="availableDate" required>
                </div>
                <div class="form-group">
                    <label for="startTime">Start Time:</label>
                    <input type="time" class="form-control" id="startTime" name="startTime" required>
                </div>
                <div class="form-group">
                    <label for="endTime">End Time:</label>
                    <input type="time" class="form-control" id="endTime" name="endTime" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Slots</button>
                <button onclick="goBack()" class="btn btn-primary">Back</button>
            </form>
        </div>
    </div>
</div>
<script>
    function goBack() {
      window.history.back();
    }
</script>
</body>
</html>
