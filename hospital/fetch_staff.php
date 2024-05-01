<?php
// Include database connection
require_once "../db/configdb.php";

// Check if department ID and hospital ID are provided
if (isset($_GET['departmentID']) && isset($_GET['hospitalID'])) {
    // Escape user inputs for security
    $departmentID = mysqli_real_escape_string($conn, $_GET['departmentID']);
    $hospitalID = mysqli_real_escape_string($conn, $_GET['hospitalID']);

    // Fetch staff members based on selected department
    $query = "SELECT * FROM staff WHERE departmentID='$departmentID' AND hospitalID='$hospitalID'";
    $result = mysqli_query($conn, $query);

    // Display staff members in a table
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Category</th>";
        echo "<th>Contact</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['staffID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No staff members found for this department</p>";
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Error: Department ID and Hospital ID are required";
}
?>
