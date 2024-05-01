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
    <title>Add Department</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    
    body {
        background-color: #f8f9fa; /* Set a light background color */
    }

    .container {
        max-width: 500px; /* Set the maximum width of the container */
        margin: auto; /* Center the container horizontally */
        padding: 20px; /* Add some padding inside the container */
        background-color: #fff; /* Set a white background color */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    h4 {
        text-align: center; 
        color:blue;/* Center align the heading */
        margin-bottom: 30px; /* Add some bottom margin */
    }

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
        <h4 class="mb-4">Add Department</h4>
        <hr>
        <form action="add_department_process.php" method="post">
            <!-- Hospital ID (from session) -->
            <input type="hidden" name="hospitalID" value="<?php echo $_SESSION['hospitalID']; ?>">
            <!-- Department Details -->
            <div class="form-group">
                <label for="name">Department Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="HOD">Head of Department</label>
                <input type="text" name="HOD" id="HOD" class="form-control">
            </div>
            <div class="form-group">
                <label for="facilities">Facilities</label>
                <textarea name="facilities" id="facilities" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Department</button>
                <button onclick="goBack()" class="btn btn-primary">Back</button>
            </div>
        </form>
    </div>


    <script>
    function goBack() {
      window.history.back();
    }
  </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
