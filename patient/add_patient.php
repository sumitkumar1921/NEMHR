
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
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
</head>
<body>
<div class="container">
    <h4 style="color:blue;padding-top:15px;" class="text-center mb-4">Add Patient</h4>
    <hr>
    <form action="add_patient_process.php" method="post">
        <!-- Country Dropdown -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="countryID">Select Country:</label>
                    <select name="countryID" id="countryID" class="form-control" required>
                        <option value="">Select Country</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <!-- State Dropdown -->
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
            <div class="col-md-6">
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
                        <option value=" ">Select Gender</option>
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
                <!-- Blood Group -->
    <div class="form-group">
    <label for="bloodGroup">Blood Group:</label>
    <select name="bloodGroup" id="bloodGroup" class="form-control" required>
        <option value="">Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
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
            </div>
            <div class="col-md-6">
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="state" name="state" id="state" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="city" name="city" id="city" class="form-control">
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div> 
                
                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
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
            </div>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Patient</button>
        <a style="padding:10px;" class="btn btn-secondary" href="../index.php">Cancel</a>
    </form>
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
        
    </script>
</body>
</html>

    