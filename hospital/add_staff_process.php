<?php
// Start the session
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}

// Include database connection
require_once "../db/configdb.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $hospitalID = $_POST['hospitalID'];
    $departmentID = $_POST['departmentID'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = $_POST['status']; // Fetching the status value from the form

    // Check if staff member already exists
    $check_query = "SELECT * FROM staff WHERE name='$name' AND contact='$contact'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // Staff member already exists, display alert
        echo "<script>alert('Staff member already exists!');</script>";
    } else {
        // Attempt to insert staff data into database
        $sql = "INSERT INTO staff (hospitalID, departmentID, name, category, contact, email, address, description, status) 
                VALUES ('$hospitalID', '$departmentID', '$name', '$category', '$contact', '$email', '$address', '$description', '$status')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to a success page or display a success message
            header("Location: hospital_dashboard.php");
            exit();
        } else {
            // Handle error if insertion fails
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>
