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

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize selected state
            $selectedState = mysqli_real_escape_string($conn, $_POST['state']);

            // Fetch hospitals based on the selected state
            $tableName = strtolower(str_replace(' ', '_', $selectedState)); // Get table name
            $sql = "SELECT Hospital_Name FROM $tableName";
            $result = mysqli_query($conn, $sql);

            // Display hospitals in a dropdown menu
            echo '<div class="mt-4">';
            echo '<form action="remove_hospital_process.php" method="POST">';
            echo '<input type="hidden" name="tableName" value="' . $tableName . '">'; // Add hidden input for table name
            echo '<label for="hospital">Select Hospital:</label>';
            echo '<select id="hospital" name="hospital" class="form-control">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Hospital_Name'] . "'>" . $row['Hospital_Name'] . "</option>";
            }
            echo '</select>';
            echo '<button type="submit" class="btn btn-danger mt-3">Remove Hospital</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
