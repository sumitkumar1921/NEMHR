<?php
// Start the session
session_start();

// Include the database configuration file
require_once "configdb.php";

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to login page
    header("Location: admin.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $countryName = mysqli_real_escape_string($conn, $_POST['name']); // Changed to match form input name attribute
    $capital = mysqli_real_escape_string($conn, $_POST['capital']); // Added to match form input name attribute
    $continent = mysqli_real_escape_string($conn, $_POST['continent']); // Added to match form input name attribute
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if country with the same name exists
    $checkExistingCountry = "SELECT * FROM country WHERE LOWER(name) = LOWER('$countryName')";
    $resultExistingCountry = $conn->query($checkExistingCountry);

    if ($resultExistingCountry->num_rows > 0) {
        // Country already exists, handle accordingly (display error message or take other action)
        echo "<script>alert('Country already exists');</script>";
    } else {
        // Prepare the insert statement
        $sql = "INSERT INTO country (name, capital, continent, description) VALUES ('$countryName', '$capital', '$continent', '$description')";

        // Execute the insert query
        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page or display a success message
            echo "<script>alert('Country added successfully');</script>";
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
