<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if user is logged in


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $hospitalID = $_POST['hospitalID'];
    $doctorName = mysqli_real_escape_string($conn, $_POST['name']);
    $license = mysqli_real_escape_string($conn, $_POST['license']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    $age = $_POST['age'];
    $schedule = mysqli_real_escape_string($conn, $_POST['schedule']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $experience = $_POST['experience'];
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $loginPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $isActive = mysqli_real_escape_string($conn, $_POST['status']);

    // Check if the doctor with the same email already exists
    $checkExistingDoctor = "SELECT * FROM doctor WHERE email = '$email'";
    $resultExistingDoctor = $conn->query($checkExistingDoctor);

    if ($resultExistingDoctor->num_rows > 0) {
        // Doctor with the same email already exists, handle accordingly (display error message or take other action)
        echo "<script>alert('Doctor with the same email already exists');</script>";
    } else {
        // Prepare the insert statement
        $sql = "INSERT INTO doctor (hospitalID, name, license, gender, DOB, age, schedule, specialization, experience, contact, email, address, description, password, status) VALUES 
        ('$hospitalID', '$doctorName', '$license', '$gender', '$DOB', '$age', '$schedule', '$specialization', '$experience', '$contact', '$email', '$address', '$description', '$loginPassword', '$isActive')";

        // Execute the insert query
        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page or display a success message
            
            header("Location: doctor.php"); // Redirect to admin dashboard
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
