<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to login page
    header("Location: admin.php");
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

h2 {
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
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
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #007bff;
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
    margin-bottom: 30px;
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

.invalid-feedback {
    color: #dc3545;
    margin-top: 5px;
}

@media (max-width: 768px) {
    .container {
        padding: 10px;
    }
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
        <h2 class="mb-4">Add Doctor</h2>
        <form action="add_doctor_process.php" method="post">
      <div class="row">
        <!-- Country Dropdown -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="countryID">Select Country:</label>
            <select name="countryID" id="countryID" class="form-control" required>
              <option value="">Select Country</option>
            </select>
          </div>
        </div>
        <!-- State Dropdown -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="stateID">Select State:</label>
            <select name="stateID" id="stateID" class="form-control" required>
              <option value="">Select State</option>
            </select>
          </div>
        </div>
        <!-- City Dropdown -->
        <div class="col-md-4">
          <div class="form-group">
            <label for="cityID">Select City:</label>
            <select name="cityID" id="cityID" class="form-control" required>
              <option value="">Select City</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
          <!-- Hospital Dropdown -->
          <div class="form-group">
            <label for="hospitalID">Select Hospital:</label>
            <select name="hospitalID" id="hospitalID" class="form-control" required>
              <option value="">Select Hospital</option>
            </select>
          </div>
          <!-- Department Dropdown -->
          <div class="form-group">
            <label for="departmentID">Select Department:</label>
            <select name="departmentID" id="departmentID" class="form-control" required>
              <option value="">Select Department</option>
            </select>
          </div>
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
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
              <option value="">Status Not Selected</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <!-- Second Column -->
        <div class="col-md-6">
          <!-- Doctor Details -->
          
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
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Doctor</button>
        <button onclick="goBack()" class="btn btn-primary">Back</button>
      </div>
    </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Fetch countries
        fetch("fetch_countries.php")
            .then(response => response.json())
            .then(data => {
                // Populate country dropdown
                const countryDropdown = document.getElementById("countryID");
                data.forEach(country => {
                    const option = document.createElement("option");
                    option.value = country.countryID;
                    option.textContent = country.name;
                    countryDropdown.appendChild(option);
                });
            });

        // Event listener for country selection change
        document.getElementById("countryID").addEventListener("change", function() {
            const countryID = this.value;
            // Fetch and populate states based on country selection
            fetch("fetch_states.php?countryID=" + countryID)
                .then(response => response.json())
                .then(data => {
                    // Populate state dropdown
                    const stateDropdown = document.getElementById("stateID");
                    stateDropdown.innerHTML = "<option value=''>Select State</option>";
                    data.forEach(state => {
                        const option = document.createElement("option");
                        option.value = state.stateID;
                        option.textContent = state.name;
                        stateDropdown.appendChild(option);
                    });
                });
        });

        // Event listener for state selection change
        document.getElementById("stateID").addEventListener("change", function() {
            const stateID = this.value;
            // Fetch and populate cities based on state selection
            fetch("fetch_cities.php?stateID=" + stateID)
                .then(response => response.json())
                .then(data => {
                    // Populate city dropdown
                    const cityDropdown = document.getElementById("cityID");
                    cityDropdown.innerHTML = "<option value=''>Select City</option>";
                    data.forEach(city => {
                        const option = document.createElement("option");
                        option.value = city.cityID;
                        option.textContent = city.city;
                        cityDropdown.appendChild(option);
                    });
                });
        });

        // Event listener for city selection change
        document.getElementById("cityID").addEventListener("change", function() {
            const cityID = this.value;
            // Fetch and populate hospitals based on city selection
            fetch("fetch_hospitals.php?cityID=" + cityID)
                .then(response => response.json())
                .then(data => {
                    // Populate hospital dropdown
                    const hospitalDropdown = document.getElementById("hospitalID");
                    hospitalDropdown.innerHTML = "<option value=''>Select Hospital</option>";
                    data.forEach(hospital => {
                        const option = document.createElement("option");
                        option.value = hospital.hospitalID;
                        option.textContent = hospital.name;
                        hospitalDropdown.appendChild(option);
                    });
                });
        });

        document.getElementById("hospitalID").addEventListener("change", function() {
    const hospitalID = this.value;
    // Fetch and populate departments based on hospital selection
    fetch("fetch_departments.php?hospitalID=" + hospitalID)
        .then(response => response.json())
        .then(data => {
            // Populate department dropdown
            const departmentDropdown = document.getElementById("departmentID");
            // Clear previous options
            departmentDropdown.innerHTML = "<option value=''>Select Department</option>";
            // Check if data is empty
            if (data.length === 0) {
                // If no departments available, display message
                const option = document.createElement("option");
                option.textContent = "No departments available";
                departmentDropdown.appendChild(option);
            } else {
                // If departments available, populate dropdown with options
                data.forEach(department => {
                    const option = document.createElement("option");
                    option.value = department.departmentID;
                    option.textContent = department.name;
                    departmentDropdown.appendChild(option);
                });
            }
        })
        .catch(error => {
            // Handle any errors that occur during fetch
            console.error('Error fetching departments:', error);
            // Optionally, display an error message to the user
            const departmentDropdown = document.getElementById("departmentID");
            departmentDropdown.innerHTML = "<option value=''>Error fetching departments</option>";
        });
});



    </script>
</body>
</html>
