<?php
// Start the session
session_start();

// Include database connection
require_once "configdb.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $cityID = mysqli_real_escape_string($conn, $_POST['cityID']);
    $license = mysqli_real_escape_string($conn, $_POST['license']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Check if the hospital with the same email already exists
    $sql_check_email = "SELECT * FROM hospital WHERE email = ?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();
    
    if ($result_check_email->num_rows > 0) {
        // Hospital with the same email already exists, show an alert
        echo "<script>alert('Hospital with the same email already exists');</script>";
        // Redirect back to the form page or display an error message
        header("Location: add_hospital.php"); // Redirect back to the form page
        exit();
    } else {
        // Prepare insert statement
        $sql = "INSERT INTO hospital (cityID, license, type, name, contact, email, password, website, address, pincode, description, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssssss", $cityID, $license, $type, $name, $contact, $email, $password, $website, $address, $pincode, $description, $status);

        // Execute the insert query
        if ($stmt->execute()) {
            // Redirect to success page or display a success message
            header("Location: hospital_login.php"); // Redirect to success page
            exit();
        } else {
            // Handle database error
            echo ("Error adding hospital: " . $stmt->error);
            // Redirect to error page or display an error message
             // Redirect to error page
            exit();
        }
    }

    // Close statement
    
} else {
    // If the form is not submitted, redirect to the form page or display an error message
    header("Location: add_hospital.php"); // Redirect to form page
    exit();
}

// Close database connection

?>
