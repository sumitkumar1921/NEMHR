<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
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
    <h2 class="mb-4">Add Patient</h2>
    <form action="add_patient_process.php" method="post">
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
        <!-- First Name -->
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" class="form-control" required>
        </div>
        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" class="form-control" required>
        </div>
        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dateOfBirth">Date of Birth:</label>
            <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" class="form-control" required>
        </div>
        <!-- Blood Group -->
        <div class="form-group">
            <label for="bloodGroup">Blood Group:</label>
            <input type="text" name="bloodGroup" id="bloodGroup" class="form-control" required>
        </div>
        <!-- Aadhar Number -->
        <div class="form-group">
            <label for="aadharNumber">Aadhar Number:</label>
            <input type="text" name="aadharNumber" id="aadharNumber" class="form-control" required>
        </div>
        <!-- Contact -->
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="tel" name="contact" id="contact" class="form-control" pattern="[0-9]{10}" required>
            <div class="invalid-feedback">Please enter a valid 10-digit contact number.</div>
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>
        <!-- Address -->
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input name="state" id="state" class="form-control" required>
        </div>
        <!-- User ID -->
        <div class="form-group">
            <label for="userID">User ID:</label>
            <input type="text" name="userID" id="userID" class="form-control" required>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <!-- Description -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Patient</button>
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
        
    </script>
</body>
</html>

    