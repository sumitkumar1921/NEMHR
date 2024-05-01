<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hospital</title>
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
        <h4 class="mt-4">View Hospitals</h4>
        <hr>
        <!-- Country Dropdown -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="countryID">Select Country:</label>
                    <select name="countryID" id="countryID" class="form-control">
                        <option value="">Select Country</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <!-- State Dropdown -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="stateID">Select State:</label>
                    <select name="stateID" id="stateID" class="form-control">
                        <option value="">Select State</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <!-- City Dropdown -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cityID">Select City:</label>
                    <select name="cityID" id="cityID" class="form-control">
                        <option value="">Select City</option>
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Hospital Table -->
        <div id="hospitalList">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hospital list will be displayed here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    
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
            // Fetch hospitals based on city selection
            fetch("fetch_hospital.php?cityID=" + cityID)
                .then(response => response.json())
                .then(data => {
                    // Display the list of hospitals
                    displayHospitals(data);
                });
        });

        // Function to display hospitals
        function displayHospitals(hospitals) {
    const hospitalList = document.getElementById("hospitalList").querySelector("tbody");
    hospitalList.innerHTML = ""; // Clear previous list

    if (hospitals.length === 0) {
        hospitalList.innerHTML = "<tr><td colspan='5'>No hospitals found for this city</td></tr>";
    } else {
        hospitals.forEach(hospital => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${hospital.name}</td>
                <td>${hospital.type}</td>
                <td>${hospital.contact}</td>
                <td>${hospital.email}</td>
                <td class="${hospital.status === 'active' ? 'status' : 'status inactive'}">${hospital.status}</td>
            `;
            hospitalList.appendChild(row);
        });
    }
}

    
    </script>
</body>
</html>
