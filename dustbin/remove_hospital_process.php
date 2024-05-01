<?php
// Include the database connection file
require_once "configdb.php";

// Check if form is submitted and the hospital and tableName are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hospital']) && isset($_POST['tableName'])) {
    // Retrieve and sanitize form data
    $selectedHospital = mysqli_real_escape_string($conn, $_POST['hospital']);
    $tableName = mysqli_real_escape_string($conn, $_POST['tableName']);

    // Construct the query to delete the hospital
    $sql = "DELETE FROM $tableName WHERE Hospital_Name = '$selectedHospital'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or show a success message
        echo "<script>alert('Hospital removed successfully.')</script>";
        echo "<script>window.location.href='remove_hospital.php';</script>";
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to the remove_hospital.php page if the form data is not complete
    header("Location: remove_hospital.php");
    exit();
}
?>
