<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



</head>
<body>
<div class="container mt-5">
        <h2>Add Hospital</h2>
        <form action="add_hospital_process.php" method="POST">
        <div class="form-group">
                <label for="state">State:</label>
                <select class="form-control" id="state" name="state" required>
                    <option value="" disabled selected>Select State</option>
                    <?php
                    // Include the database connection file
                    require_once "configdb.php";

                    // Query to fetch states
                    $result = mysqli_query($conn, "SELECT * FROM states");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['State_ID'] . "'>" . $row['State_Name'] . "</option>";
                    }
                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="hospitalName">Hospital Name:</label>
                <input type="text" class="form-control" id="hospitalName" name="hospitalName" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input type="text" class="form-control" id="pincode" name="pincode" required>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" class="form-control" id="district" name="district" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="userID">User ID:</label>
                <input type="text" class="form-control" id="userID" name="userID" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Add Hospital">
        </form>
    </div> 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>
</html>