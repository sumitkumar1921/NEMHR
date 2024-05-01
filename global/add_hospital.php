<?php
// Check if user is logged in
require_once "configdb.php";

// Fetch countries for dropdown
$sql_countries = "SELECT countryID, name FROM country";
$result_countries = $conn->query($sql_countries);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>
<body>
    <div class="container mt-5">
        <h2>Hospital Signup</h2>
        <form action="add_hospital_process.php" method="post">
            <div class="form-group">
                <label for="countryID">Select Country:</label>
                <select name="countryID" id="countryID" class="form-control" required>
                    <option value="">Select Country</option>
                    <?php
                    // Populate dropdown with countries
                    if ($result_countries->num_rows > 0) {
                        while ($row_country = $result_countries->fetch_assoc()) {
                            echo "<option value='" . $row_country["countryID"] . "'>" . $row_country["name"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No countries available</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="stateID">Select State:</label>
                <select name="stateID" id="stateID" class="form-control" required>
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cityID">Select City:</label>
                <select name="cityID" id="cityID" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>
            <div class="form-group">
        <label for="license">License Number:</label>
        <input type="text" id="license" name="license" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="type">Hospital Type:</label>
        <select name="type" id="type" class="form-control">
            <option value="private">Private</option>
            <option value="public">Public</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Hospital Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" class="form-control" pattern="[0-9]{10}" required>
        <div class="invalid-feedback">Please enter a valid 10-digit contact number.</div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" id="website" name="website" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Hospital</button>
</form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to fetch states based on country ID
        function fetchStates(countryID) {
            fetch('fetch_states.php?countryID=' + countryID)
                .then(response => response.json())
                .then(data => {
                    var stateSelect = document.getElementById('stateID');
                    stateSelect.innerHTML = '<option value="">Select State</option>';
                    data.forEach(state => {
                        var option = document.createElement('option');
                        option.value = state.stateID;
                        option.textContent = state.name;
                        stateSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching states:', error));
        }

        // Function to fetch cities based on state ID
        function fetchCities(stateID) {
            fetch('fetch_cities.php?stateID=' + stateID)
                .then(response => response.json())
                .then(data => {
                    var citySelect = document.getElementById('cityID');
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    data.forEach(city => {
                        var option = document.createElement('option');
                        option.value = city.cityID;
                        option.textContent = city.city;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching cities:', error));
        }

        // Event listener for country selection change
        document.getElementById('countryID').addEventListener('change', function() {
            var countryID = this.value;
            if (countryID) {
                fetchStates(countryID);
            } else {
                document.getElementById('stateID').innerHTML = '<option value="">Select State</option>';
                document.getElementById('cityID').innerHTML = '<option value="">Select City</option>';
            }
        });

        // Event listener for state selection change
        document.getElementById('stateID').addEventListener('change', function() {
            var stateID = this.value;
            if (stateID) {
                fetchCities(stateID);
            } else {
                document.getElementById('cityID').innerHTML = '<option value="">Select City</option>';
            }
        });
    });
</script>

</body>
</html>
