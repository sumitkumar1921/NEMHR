<?php
session_start();

// Check if user is logged in
require_once "../db/configdb.php";
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to login page
    header("Location: admin.php");
    exit();
}

// Fetch countries for dropdown
$sql_countries = "SELECT countryID, name FROM country";
$result_countries = $conn->query($sql_countries);

// Fetch states for dropdown
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <style>
        body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
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
        <h2>Add City</h2>
        <form action="add_city_process.php" method="post">
            <div class="form-group">
                <label for="countryID">Select Country<span class="required"></span> :</label>
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
                <label for="stateID">Select State<span class="required"></span> :</label>
                <select name="stateID" id="stateID" class="form-control" required>
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cityName">City Name<span class="required"></span> :</label>
                <input type="text" id="cityName" name="cityName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pincode" class="required">Pincode :</label>
                <input type="text" id="pincode" name="pincode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" class="required">Description :</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add City</button>
            <button onclick="goBack()" class="btn btn-primary">Back</button>
        </form>
    </div>

    <!-- jQuery -->
   
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Ensure jQuery is ready before executing jQuery-dependent code
        $(document).ready(function() {
            // Event listener for country selection change
            $('#countryID').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    // Fetch states using fetch API
                    fetchStates(countryID);
                } else {
                    $('#stateID').empty().append('<option value="">Select State</option>');
                }
            });

            // Function to fetch states based on country ID
            function fetchStates(countryID) {
                fetch('fetch_states.php?countryID=' + countryID)
                    .then(response => response.json())
                    .then(data => {
                        var stateSelect = $('#stateID');
                        stateSelect.empty().append('<option value="">Select State</option>');
                        data.forEach(state => {
                            stateSelect.append($('<option>', {
                                value: state.stateID,
                                text: state.name
                            }));
                        });
                    })
                    .catch(error => console.error('Error fetching states:', error));
            }

            // Event listener for form submission
            
        });
    </script>
</body>
</html>
