<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Description</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h4 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
<a href="javascript:history.back()" class="btn btn-secondary back-btn">Back</a>
    <h4>Preview Prescription</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Prescription</th>
                <th>Doctor</th>
                <th>Hospital</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Start the session
            session_start();

            // Include database connection
            include_once "../db/configdb.php";

            // Check if patientID is provided
            if (isset($_POST['patientID'])) {
                // Sanitize the input
                $patientID = mysqli_real_escape_string($conn, $_POST['patientID']);

                // Retrieve descriptions for the given patientID
                $query = "SELECT * FROM description WHERE patientID = '$patientID'";
                $result = mysqli_query($conn, $query);

                // Check if any description is found
                if (mysqli_num_rows($result) > 0) {
                    // Fetch and display all descriptions
                    while ($description_row = mysqli_fetch_assoc($result)) {
                        $description = $description_row['description'];
                        $doctorID = $description_row['doctorID'];
                        $dateTime = $description_row['created_at'];

                        // Retrieve doctor name and hospital name using doctorID and hospitalID
                        $queryDoctor = "SELECT name, hospitalID FROM doctor WHERE doctorID = '$doctorID'";
                        $resultDoctor = mysqli_query($conn, $queryDoctor);
                        $doctor_row = mysqli_fetch_assoc($resultDoctor);
                        $doctorName = $doctor_row['name'];
                        // Here you need to ensure that $hospitalID is set properly in your session or obtained from your application logic
                        $hospitalID = $doctor_row['hospitalID'];

                        // Retrieve hospital name
                        $queryHospital = "SELECT name FROM hospital WHERE hospitalID = '$hospitalID'";
                        $resultHospital = mysqli_query($conn, $queryHospital);
                        $hospital_row = mysqli_fetch_assoc($resultHospital);
                        $hospitalName = $hospital_row['name'];

                        // Display the description along with doctor and hospital details
                        echo "<tr>";
                        echo "<td>$description</td>";
                        echo "<td>$doctorName</td>";
                        echo "<td>$hospitalName</td>";
                        echo "<td>$dateTime</td>";
                        echo "</tr>";
                    }
                } else {
                    // If no description found for the patient, display a message
                    echo "<tr><td colspan='4'>No Prescription found for this patient.</td></tr>";
                }
            } else {
                // If patientID is not provided, display an error message
                echo "<tr><td colspan='4'>Error: Patient ID not provided.</td></tr>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
