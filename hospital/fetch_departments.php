<?php
// Include database connection
require_once "../db/configdb.php";

// Initialize empty array for department data
$departments = array();

// Check if hospitalID is set
if (isset($_GET['hospitalID'])) {
    // Sanitize the input
    $hospitalID = filter_var($_GET['hospitalID'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to fetch departments based on hospital ID
    $sql = "SELECT departmentID, name, HOD, facilities, description FROM department WHERE hospitalID = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bind_param("i", $hospitalID);

    // Execute statement
    if ($stmt->execute()) {
        // Get result
        $result = $stmt->get_result();

        // Fetch departments and add them to the array
        while ($row = $result->fetch_assoc()) {
            // Define values for undefined fields
            $row['departmentID'] = $row['departmentID'] ?: "DeaprtmentID : undefined";
            $row['HOD'] = $row['HOD'] ?: "Head of Department: undefined";
            $row['facilities'] = $row['facilities'] ?: "Facilities: undefined";
            $row['description'] = $row['description'] ?: "Description: undefined";
            
            // Add department to the array
            $departments[] = $row;
        }
    } else {
        // Handle SQL execution error
        echo json_encode(array('error' => 'Failed to execute SQL query'));
    }

    // Close result set
    $result->close();
} else {
    // If hospitalID is not set, return an empty array
    echo json_encode(array());
}

// Close statement
$stmt->close();

// Close database connection
$conn->close();

// Return department data as JSON
echo json_encode($departments);
?>
