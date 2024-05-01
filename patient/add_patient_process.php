<?php

require_once "../db/configdb.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    

    // Retrieve form data
    $cityID = $_POST['cityID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];  
    $bloodGroup = $_POST['bloodGroup'];
    $aadharNumber = $_POST['aadharNumber'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $userID = $_POST['userID'];
    $password = $_POST['password'];
    $description = $_POST['description'];


    $sql = "SELECT * FROM patient WHERE aadharNumber = '$aadharNumber'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Patient already exists
        echo "<script>alert('Patient with Aadhar number $aadharNumber already exists.')</script>";
    } else{

    // Insert the data into the database
    $sql = "INSERT INTO patient (cityID, firstName, lastName, gender, dateOfBirth,  bloodGroup, aadharNumber, contact, email, address, city, state, userID, password, description) 
            VALUES ('$cityID', '$firstName', '$lastName', '$gender', '$dateOfBirth',  '$bloodGroup', '$aadharNumber', '$contact', '$email', '$address', '$city', '$state', '$userID', '$password', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Patient added successfully.'); window.location.href = 'patient.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect to the add patient form if accessed directly
    header("Location: add_patient.php");
    exit();
}
?>
