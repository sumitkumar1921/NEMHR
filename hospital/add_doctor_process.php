<?php
// Start the session
session_start();

// Include the database configuration file
require_once "../db/configdb.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    $hospitalID = $_POST['hospitalID'];
    $departmentID = $_POST['departmentID'];
    $doctorName = mysqli_real_escape_string($conn, $_POST['name']);
    $license = mysqli_real_escape_string($conn, $_POST['license']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    
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
        $sql = "INSERT INTO doctor (hospitalID, departmentID, name, license, gender, DOB,  specialization, experience, contact, email, address, description, password, status) VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bind_param("iissssssisssss", $hospitalID, $departmentID, $doctorName, $license, $gender, $DOB,  $specialization, $experience, $contact, $email, $address, $description, $loginPassword, $isActive);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            header("Location: hospital_dashboard.php"); // Redirect to admin dashboard
            exit();
        } else {
            // Handle error
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close statement
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>
