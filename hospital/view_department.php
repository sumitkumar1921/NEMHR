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
    <title>View Department</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        h4 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
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
        <h4 class="mt-4">View Department</h4>
       <hr>
        <!-- Department List Table -->
        <div id="departmentList" class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Head of Department</th>
                        <th>Facilities</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Department list will be displayed here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Fetch Departments -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch departments based on hospital ID from session
            const hospitalID = "<?php echo $_SESSION['hospitalID']; ?>";
            fetch(`fetch_departments.php?hospitalID=${hospitalID}`)
                .then(response => response.json())
                .then(data => {
                    const departmentTable = document.getElementById("departmentList").querySelector("tbody");
                    if (data.length === 0) {
                        departmentTable.innerHTML = "<tr><td colspan='4'>No departments found for this hospital</td></tr>";
                    } else {
                        data.forEach(department => {
                            const row = document.createElement("tr");
                            row.innerHTML = `
                                 <td>${department.departmentID}</td>
                                <td>${department.name}</td>
                                <td>${department.HOD}</td>
                                <td>${department.facilities}</td>
                                <td>${department.description}</td>
                            `;
                            departmentTable.appendChild(row);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
