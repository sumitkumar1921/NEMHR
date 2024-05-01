<?php
// Include database connection
require_once "configdb.php";

// Prepare and execute SQL query to fetch countries
$sql = "SELECT countryID, name FROM country";
$result = $conn->query($sql);

// Create an array to store the fetched countries
$countries = array();

// Fetch countries and add them to the array
while ($row = $result->fetch_assoc()) {
    $countries[] = $row;
}

// Return the countries as JSON
echo json_encode($countries);

// Close database connection
$conn->close();
?>
