<?php
session_start();

// Check if user is logged in
require_once "configdb.php";
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to login page
    header("Location: admin.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['stateName']); // Adjusted variable name to match table column
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $countryID = mysqli_real_escape_string($conn, $_POST['countryID']);
    $capital = mysqli_real_escape_string($conn, $_POST['capital']); // Added variable for capital
    $zone = mysqli_real_escape_string($conn, $_POST['zone']); // Added variable for zone

    // Validate zone selection
    $allowed_zones = array("north", "east", "west", "south", "north-east", "south-east", "north-west", "south-west", "central");
    if (!in_array($zone, $allowed_zones)) {
        echo "<script>alert('Invalid zone selection');</script>";
        // Handle the error, you might redirect back to the form or display an error message
        exit(); // Stop further execution
    }

    // Check if state already exists for the given country
    $nameLower = strtolower($name);

    // Prepare a query to check if the state already exists for the selected country
    $checkExistingState = "SELECT * FROM state WHERE LOWER(name) = '$nameLower' AND countryID = '$countryID'";
    $resultExistingState = $conn->query($checkExistingState);

    if ($resultExistingState->num_rows > 0) {
        // State already exists for the selected country
        echo "<script>alert('State already exists for this country.');</script>";
    } else {
        // State does not exist, proceed with insertion
        // Prepare insert statement
        $sql = "INSERT INTO state (countryID, name, capital, zone, description) VALUES ('$countryID', '$name', '$capital', '$zone', '$description')"; // Adjusted SQL query to match table columns

        // Execute the insert query
        if ($conn->query($sql) === TRUE) {
            // Redirect to success page or display a success message
            echo "<script>alert('State added successfully');</script>";
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit();
        } else {
            // Handle error
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>
