<?php
// Include the database configuration file
require_once "../db/configdb.php";

// Check if hospitalID is provided via GET request
if (isset($_GET['hospitalID'])) {
    // Sanitize the input
    $hospitalID = mysqli_real_escape_string($conn, $_GET['hospitalID']);

    // Prepare a SELECT statement to fetch doctors for the given hospitalID
    $sql = "SELECT * FROM doctor WHERE hospitalID = $hospitalID";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any doctors are found
    if ($result->num_rows > 0) {
        // Initialize an empty array to store the doctors
        $doctors = [];

        // Fetch and store each doctor in the array
        while ($row = $result->fetch_assoc()) {
            $doctor = [
                'name' => $row['name'],
                'license' => $row['license'],
                'specialization' => $row['specialization'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'status' => $row['status']
            ];
            // Add the doctor to the array
            $doctors[] = $doctor;
        }

        // Send the doctors data as JSON response
        echo json_encode($doctors);
    } else {
        // If no doctors are found for the hospital, send an empty JSON array
        echo json_encode([]);
    }
} else {
    // If hospitalID is not provided, return an error message
    echo json_encode(['error' => 'HospitalID is missing']);
}
// Close database connection
$conn->close();
?>
