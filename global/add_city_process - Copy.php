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
    $cityName = mysqli_real_escape_string($conn, $_POST['cityName']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $stateID = mysqli_real_escape_string($conn, $_POST['stateID']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

    // Check if the city already exists in the same state
    $checkExistingCity = "SELECT * FROM city WHERE city = '$cityName' AND stateID = '$stateID'";
    $resultExistingCity = $conn->query($checkExistingCity);

    if ($resultExistingCity->num_rows > 0) {
        // City already exists in the same state, handle accordingly (display error message or take other action)
        echo "<script>alert('City already exists in the selected state');</script>";
        exit(); // Stop further execution
    } else {
        // Prepare insert statement
        $sql = "INSERT INTO city (stateID, city, description, pincode) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $stateID, $cityName, $description, $pincode);

        // Execute the insert query
        if ($stmt->execute()) {
            // Redirect to success page or display a success message
            echo "<script>alert('City added successfully');</script>";
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit();
        } else {
            // Handle database error
            echo "<script>alert('Error adding city');</script>";
            // Log the error for debugging purposes
            error_log("Error adding city: " . $stmt->error);
        }

        // Close statement
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>
