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
    <title>View Staff</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for staff list table */
.container {
    margin-top: 30px;
}

h4 {
    text-align: center;
    color: #007bff;
    margin-bottom: 30px;
}

/* Styling for department selection form */
.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

/* Styling for staff list table */
#staffList {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

.table th,
.table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #f2f2f2;
}

/* Styling for table rows and cells */
.table tr:hover {
    background-color: #f2f2f2;
}

/* Styling for table cells */
.table td {
    color: #555;
}

/* Styling for table header cells */
.table th {
    color: #333;
    font-weight: bold;
    text-transform: uppercase;
}

/* Styling for form select */
.form-control {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    background-color: #f3f4f6;
    color: #495057;
    cursor: pointer;
}

/* Styling for form button */
.btn {
    padding: 8px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

/* Styling for error message */
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
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
        <h4 style="color:blue;padding-top:10px;" class="text-center mb-4">View Staff</h4>
        <hr>
        <form id="departmentForm">
            <!-- Hospital ID (from session) -->
            <input type="hidden" name="hospitalID" value="<?php echo $_SESSION['hospitalID']; ?>">
            <!-- Department selection -->
            <div class="form-group">
                <label for="department">Select Department:</label>
                <select name="departmentID" id="department" class="form-control">
                    <option value="">Select Department</option>
                    <!-- Department options will be fetched dynamically -->
                    <?php
                    // Include database connection
                    require_once "../db/configdb.php";

                    // Fetch departments based on hospital ID from session
                    $hospitalID = $_SESSION['hospitalID'];
                    $query = "SELECT * FROM department WHERE hospitalID='$hospitalID'";
                    $result = mysqli_query($conn, $query);

                    // Check if departments exist
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $departmentID = $row['departmentID'];
                            $name = $row['name'];
                            echo "<option value='$departmentID'>$name</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No departments found</option>";
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            
        </form>

        <!-- Staff List Table -->
        <div id="staffList">
            <!-- Staff members will be displayed here -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const departmentSelect = document.getElementById("department");
            departmentSelect.addEventListener("change", function() {
                const departmentID = this.value;
                const hospitalID = "<?php echo $_SESSION['hospitalID']; ?>";
                
                if (departmentID !== '') {
                    fetch(`fetch_staff.php?departmentID=${departmentID}&hospitalID=${hospitalID}`)
                        .then(response => response.text())
                        .then(data => {
                            // Update staffList div with fetched staff members
                            document.getElementById("staffList").innerHTML = data;
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    // Clear staffList div if no option is selected
                    document.getElementById("staffList").innerHTML = "";
                }
            });
        });
    </script>
</body>
</html>
