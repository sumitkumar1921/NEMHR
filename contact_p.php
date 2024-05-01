<?php

include('db/configdb.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        
        // Prepare SQL statement to insert data into the database
        $stmt = $conn->prepare("INSERT INTO ContactForm (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        
        // Set parameters and execute
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $stmt->execute();
        
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        
        // Display success message
        echo '<script>alert("Thank you! Your message has been submitted successfully.");window.location.href = "index.php";</script>';
    } else {
        // Display error message if any field is empty
        echo '<script>alert("Please fill in all fields.");</script>';
    }
} else {
    // Display error message if the form is not submitted
    echo '<script>alert("Error: Form submission failed.");</script>';
}
?>
