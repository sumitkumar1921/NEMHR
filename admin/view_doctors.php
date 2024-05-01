<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctors</title>
    <!-- Bootstrap CSS -->
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            background-color: #f3f4f6;
            color: #495057;
            cursor: pointer;
        }
        #hospitalList {
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
        <h4 class="mt-4">View Doctors</h4>
        <hr>
        <!-- Country Dropdown -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="countryID">Select Country:</label>
                    <select name="countryID" id="countryID" class="form-control">
                        <option value="">Select Country</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <!-- State Dropdown -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="stateID">Select State:</label>
                    <select name="stateID" id="stateID" class="form-control">
                        <option value="">Select State</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <!-- City Dropdown -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cityID">Select City:</label>
                    <select name="cityID" id="cityID" class="form-control">
                        <option value="">Select City</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <div class="col-md=3">
            <div class="form-group">
            <label for="hospitalID">Select Hospital:</label>
            <select name="hospitalID" id="hospitalID" class="form-control">
            <option value="">Select Hospital</option>
                <!-- Options will be populated via JavaScript -->
            </select>
            </div>
            </div>

        </div>
        
        <!-- Hospital Dropdown -->
        

        <!-- Doctor List -->
<div id="doctorList" class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>License</th>
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
    // Fetch and populate doctors based on hospital selection
    fetch("fetch_doctors.php?hospitalID=" + hospitalID)
        .then(response => response.json())
        .then(data => {
            // Populate doctor list
            const doctorList = document.getElementById("doctorList").querySelector("tbody");
            doctorList.innerHTML = ""; // Clear previous list
            if (data.length === 0) {
                doctorList.innerHTML = "<tr><td colspan='6'>No doctors found for this hospital</td></tr>";
            } else {
                data.forEach(doctor => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${doctor.name}</td>
                        <td>${doctor.license}</td>
                        <td>${doctor.specialization}</td>
                        <td>${doctor.contact}</td>
                        <td>${doctor.email}</td>
                        <td>${doctor.status}</td>
                    `;
                    doctorList.appendChild(row);
                });
            }
        });
});

    </script>
</body>
</html>
