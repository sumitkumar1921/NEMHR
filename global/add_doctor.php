<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Add Doctor</h2>
        <form action="add_doctor_process.php" method="post">
            <!-- Country Dropdown -->
            <div class="form-group">
                <label for="countryID">Select Country:</label>
                <select name="countryID" id="countryID" class="form-control" required>
                    <option value="">Select Country</option>
                </select>
            </div>
            <!-- State Dropdown -->
            <div class="form-group">
                <label for="stateID">Select State:</label>
                <select name="stateID" id="stateID" class="form-control" required>
                    <option value="">Select State</option>
                </select>
            </div>
            <!-- City Dropdown -->
            <div class="form-group">
                <label for="cityID">Select City:</label>
                <select name="cityID" id="cityID" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>
            <!-- Hospital Dropdown -->
            <div class="form-group">
                <label for="hospitalID">Select Hospital:</label>
                <select name="hospitalID" id="hospitalID" class="form-control" required>
                    <option value="">Select Hospital</option>
                </select>
            </div>
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
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="schedule">Schedule:</label>
                <input type="text" name="schedule" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" name="specialization" class="form-control" required>
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
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Doctor</button>
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
    </script>
</body>
</html>
