<?php
// Start session to access session variables
session_start();

require_once "../db/configdb.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection

    // Escape user inputs for security
    $hospitalID = $_POST['hospitalID'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $HOD = mysqli_real_escape_string($conn, $_POST['HOD']);
    $facilities = mysqli_real_escape_string($conn, $_POST['facilities']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if department already exists in the hospital
    $check_query = "SELECT * FROM department WHERE hospitalID = '$hospitalID' AND name = '$name'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        // Department already exists, show alert
        echo "<script>alert('Department already exists in this hospital');</script>";
    } else {
        // Attempt to insert department data into database
        $sql = "INSERT INTO department (hospitalID, name, HOD, facilities, description) 
                VALUES ('$hospitalID', '$name', '$HOD', '$facilities', '$description')";

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
