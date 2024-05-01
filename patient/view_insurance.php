<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Insurance</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .insurance-details {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .insurance-details h4 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #007bff;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div>
        <button class="btn btn-primary mb-4" onclick="goBack()">Back</button>
    </div>
    <h2 class="mb-4">Insurance Information</h2>
    <?php
    session_start();

    // Check if patient is not logged in
    if (!isset($_SESSION["patientID"])) {
        // If not logged in, redirect to login page
        header("Location: patient.php");
        exit();
    }

    // Include the database configuration file
    require_once "../db/configdb.php";

    // Get patientID from session
    $patientID = $_SESSION["patientID"];

    // Query to retrieve insurance information based on patientID
    $sql = "SELECT * FROM insurance WHERE patientID = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $patientID);

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if there are any insurance records for the patient
    if ($result->num_rows > 0) {
        // Output insurance information in a table
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-light'>";
        echo "<tr>";
        echo "<th>Policy Type</th>";
        echo "<th>Policy Number</th>";
        echo "<th>Provider</th>";
        echo "<th>Valid From</th>";
        echo "<th>Valid To</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["policyType"] . "</td>";
            echo "<td>" . $row["policyNumber"] . "</td>";
            echo "<td>" . $row["provider"] . "</td>";
            echo "<td>" . $row["validFrom"] . "</td>";
            echo "<td>" . $row["validTo"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        // If no insurance records found
        echo "<p class='text-center'>No insurance information available.</p>";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
    ?>
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
