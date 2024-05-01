<?php
// Start the session
session_start();

// Check if user is logged in
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
    <title>Doctor Slots</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 10px;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: #007bff;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }

        // Function to handle form submission using Fetch API
        function showDoctorSlots() {
            event.preventDefault(); // Prevent default form submission

            // Get selected doctor ID
            var doctorID = document.getElementById("doctorID").value;

            // Fetch doctor slots using Fetch API
            fetch('this_page.php?doctorID=' + doctorID)
                .then(response => response.text()) // Parse response as text
                .then(data => {
                    // Replace the content of the doctor slots div with the fetched data
                    document.getElementById('doctorSlots').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>

<div class="container">
    <button onclick="goBack()" class="btn btn-primary mb-3">Back</button>
    <h3>Doctor Slots</h3>
    <!-- Doctor selection form -->
    <form onsubmit="showDoctorSlots()">
        <div class="form-group">
            <label for="doctorID">Select Doctor:</label>
            <select class="form-control" id="doctorID" name="doctorID">
                <?php
                // Include database connection
                require_once "../db/configdb.php";

                // Fetch doctor IDs and names based on hospital ID
                $hospitalID = $_SESSION["hospitalID"];
                $sql = "SELECT doctorID, name FROM doctor WHERE hospitalID = $hospitalID";
                $result = mysqli_query($conn, $sql);

                // Check if any doctors are found
                if (mysqli_num_rows($result) > 0) {
                    // Doctors found, create dropdown options
                    while ($row = mysqli_fetch_assoc($result)) {
                        $doctorID = $row['doctorID'];
                        $doctorName = $row['name'];
                        echo "<option value='$doctorID'>ID: $doctorID - Name: $doctorName</option>";
                    }
                } else {
                    // No doctors found
                    echo "<option value=''>No doctors available</option>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Show Slots</button>
    </form>
    <!-- End of doctor selection form -->

    <!-- Display doctor slots -->
    <div style="padding-top:10px;" id="doctorSlots"></div>
    <!-- End of doctor slots -->
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
