
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
    <title>Add Staff</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    
    body {
        background-color: #f8f9fa; /* Set a light background color */
    }

    .container {
        max-width: 60%; /* Set the maximum width of the container */
        margin: auto; /* Center the container horizontally */
        padding: 20px; /* Add some padding inside the container */
        background-color: #fff; /* Set a white background color */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    h4 {
        text-align: center;
         /* Center align the heading */
       color:blue;     }

    .form-group {
        margin-bottom: 20px; /* Add some bottom margin to form groups */
    }

    label {
        font-weight: bold; /* Make labels bold */
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="tel"],
    input[type="email"],
    select,
    textarea {
        width: 100%; /* Make form inputs and selects full width */
        padding: 10px; /* Add some padding */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 5px; /* Add rounded corners */
        box-sizing: border-box; /* Include padding and border in width */
    }

    select {
        appearance: none; /* Remove default select styles */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="%23000" d="M7.5 11l5-5 5 5H7.5z"/></svg>'); /* Add custom arrow */
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    textarea {
        resize: none; /* Disable textarea resizing */
    }

    

    .btn-primary:hover {
        background-color: #007bff; /* Change background color on hover */
        border-color: #007bff;
    }
</style>
</head>
<body>
    <div class="container">
        <h4 class="mb-4">Add Staff</h4>
        <hr>
        <div class="row">
            <div class="col-md-6">
        <form action="add_staff_process.php" method="post">
            <!-- Hospital ID (from session) -->
            <input type="hidden" name="hospitalID" value="<?php echo $_SESSION['hospitalID']; ?>">
            <!-- Staff Details -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" name="contact" id="contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="department">Department</label>
                <select name="departmentID" id="department" class="form-control" required>
                    <option value="">Select Department</option>
                    <!-- Department options will be fetched dynamically -->
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                   <option value="">Selected Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Staff</button>
                <button onclick="goBack()" class="btn btn-primary">Back</button>
            </div>
            
        </form>
        
        
</div>
    </div>

    <script>
    function goBack() {
      window.history.back();
    }
  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Fetch Department Options -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hospitalID = "<?php echo $_SESSION['hospitalID']; ?>";
            const departmentSelect = document.getElementById("department");
            fetch(`fetch_departments.php?hospitalID=${hospitalID}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(department => {
                        const option = document.createElement("option");
                        option.value = department.departmentID;
                        option.text = department.name;
                        departmentSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
