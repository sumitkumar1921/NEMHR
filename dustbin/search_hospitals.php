<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hospitals</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Search Hospitals</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="state">Select State:</label>
                <select id="state" name="state" class="form-control">
                    <?php
                    // Include the database connection file
                    require_once "configdb.php";

                    // Fetch all state names from the states table
                    $sql = "SELECT State_Name FROM states";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['State_Name'] . "'>" . $row['State_Name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="mt-5">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve and sanitize form data
                $stateName = mysqli_real_escape_string($conn, $_POST['state']);

                // Construct the hospital table name
                $tableName = str_replace(' ', '_', strtolower($stateName)); // Replace spaces with underscores and convert to lowercase

                // Query to fetch hospitals from the dynamically generated table name
                $sql = "SELECT * FROM $tableName";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<h4>Hospitals in $stateName</h4>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Hospital Name</th><th>Contact Number</th><th>Pincode</th><th>District</th><th>Address</th><th>Email</th><th>Website</th></tr></thead>";
                    echo "<tbody>";
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["Hospital_Name"] . "</td>";
                        echo "<td>" . $row["Contact_Number"] . "</td>";
                        echo "<td>" . $row["Pincode"] . "</td>";
                        echo "<td>" . $row["District"] . "</td>";
                        echo "<td>" . $row["Address"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["Website"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p>No hospitals found in $stateName.</p>";
                }

                // Close the database connection
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
