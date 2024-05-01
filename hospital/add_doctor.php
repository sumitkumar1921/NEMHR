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
    <title>Add Doctor</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h4 {
        color: #333;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="%23171717" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
        background-repeat: no-repeat;
        background-position: right 8px top 50%;
        background-size: 16px;
    }

    textarea {
        resize: vertical;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 12px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
    <div class="container">
        <h4 class="text-center mb-4">Add Doctor</h4>
        <hr>
        <form action="add_doctor_process.php" method="post">
        <input type="hidden" name="hospitalID" value="<?php echo $_SESSION['hospitalID']; ?>">
            
        <div class="row">
            <div class="col-md-6">
            
            <!-- Doctor Details -->
            <!-- Add other input fields for doctor details here -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="license">License:</label>
                <input type="text" name="license" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" class="form-control" required>
            </div>
            
  <div class="form-group">
  <label for="specialization">Specialization:</label>
  <select name="specialization" id="specialization" class="form-control" required>
    <option value="">Select Specialization</option>
    <option value="Cardiology">Cardiology</option>
    <option value="Dermatology">Dermatology</option>
    <option value="Endocrinology">Endocrinology</option>
    <option value="Gastroenterology">Gastroenterology</option>
    <option value="Hematology">Hematology</option>
    <option value="Infectious Disease">Infectious Disease</option>
    <option value="Nephrology">Nephrology</option>
    <option value="Neurology">Neurology</option>
    <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
    <option value="Oncology">Oncology</option>
    <option value="Ophthalmology">Ophthalmology</option>
    <option value="Orthopedics">Orthopedics</option>
    <option value="Otolaryngology">Otolaryngology (ENT)</option>
    <option value="Pediatrics">Pediatrics</option>
    <option value="Psychiatry">Psychiatry</option>
    <option value="Pulmonology">Pulmonology</option>
    <option value="Rheumatology">Rheumatology</option>
    <option value="Urology">Urology</option>
    <option value="Anesthesiology">Anesthesiology</option>
    <option value="Radiology">Radiology</option>
    <option value="Emergency Medicine">Emergency Medicine</option>
    <option value="Family Medicine">Family Medicine</option>
    <option value="Internal Medicine">Internal Medicine</option>
    <option value="Physical Medicine and Rehabilitation">Physical Medicine and Rehabilitation</option>
    <option value="Allergy and Immunology">Allergy and Immunology</option>
    <option value="Critical Care Medicine">Critical Care Medicine</option>
    <option value="Geriatrics">Geriatrics</option>
    <option value="Nuclear Medicine">Nuclear Medicine</option>
    <option value="Pain Medicine">Pain Medicine</option>
    <option value="Sports Medicine">Sports Medicine</option>
  </select>
</div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                <option value="">Status Not Selected</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="departmentID">Select Department:</label>
                <select name="departmentID" id="departmentID" class="form-control" required>
                    <option value="">Select Department</option>
                </select>
            </div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="number" name="experience" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="tel" name="contact" class="form-control" pattern="[0-9]{10}" required>
                <div class="invalid-feedback">Please enter a valid 10-digit contact number.</div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            
</div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Doctor</button>
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
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const hospitalID = "<?php echo $_SESSION['hospitalID']; ?>";
        const departmentSelect = document.getElementById("departmentID"); // Corrected ID
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
