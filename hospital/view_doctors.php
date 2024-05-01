<?php
// Start the session
session_start();

// Check if hospital is not logged in
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
    <title>View Doctors</title>
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h4 {
            color: #007bff;
            text-align: center;
        }
        #doctorTable {
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f2f2f2;
        }
        .status {
            font-weight: bold;
            color: green;
        }
        .status.inactive {
            color: red;
        }
    </style>

<script>
    function goBack() {
      window.history.back();
    }
  </script>

</head>
<body>
    <div class="container">
    <button onclick="goBack()" class="btn btn-primary mb-3">Back</button>
        <h4 class=" mt-4">View Doctors</h4>
        <hr>

        <!-- Doctor List Table -->
        <div id="doctorTable">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>License</th>
                        <th>Department</th>
                        <th>Specialization</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Doctor list will be displayed here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch and populate doctors based on hospital ID from session
            const hospitalID = "<?php echo $_SESSION['hospitalID']; ?>";
            fetch("fetch_doctors.php?hospitalID=" + hospitalID)
                .then(response => response.json())
                .then(data => {
                    const doctorTable = document.getElementById("doctorTable").querySelector("tbody");
                    if (data.length === 0) {
                        doctorTable.innerHTML = "<tr><td colspan='7'>No doctors found for this hospital</td></tr>";
                    } else {
                        data.forEach(doctor => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                                <td>${doctor.doctorID}</td>
                                <td>${doctor.name}</td>
                                <td>${doctor.license}</td>
                                <td>${doctor.department}</td>
                                <td>${doctor.specialization}</td>
                                <td>${doctor.contact}</td>
                                <td>${doctor.email}</td>
                                <td class="${doctor.status === 'active' ? 'status' : 'status inactive'}">${doctor.status}</td>
                            `;
                            doctorTable.appendChild(row);
                        });
                    }
                });
        });
    </script>
</body>
</html>
