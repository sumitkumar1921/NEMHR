<?php
// Include database connection
require_once "../db/configdb.php";

// Check if cityID is provided
if(isset($_GET['cityID'])) {
    $cityID = $_GET['cityID'];

    // Prepare and execute SQL query to fetch hospitals based on cityID
    $sql = "SELECT * FROM hospital WHERE cityID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cityID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if hospitals are found
    if ($result->num_rows > 0) {
        $hospitals = array();

        // Fetch hospital data and store in an array
        while($row = $result->fetch_assoc()) {
            $hospital = array(
                'name' => $row['name'],
                'type' => $row['type'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'status' => $row['status']
                // Add other fields as needed
            );
            $hospitals[] = $hospital;
        }

        // Send JSON response with hospital data
        echo json_encode($hospitals);
    } else {
        // No hospitals found for the selected city
        echo json_encode(array());
    }
} else {
    // cityID parameter is not provided
    echo json_encode(array());
}

// Close database connection
$stmt->close();
$conn->close();
?>
