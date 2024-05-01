<?php
// Include the database connection file
require_once "configdb.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $stateID = mysqli_real_escape_string($conn, $_POST['state']);
    $hospitalName = mysqli_real_escape_string($conn, $_POST['hospitalName']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $UserID = mysqli_real_escape_string($conn, $_POST['userID']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to insert hospital data into the table of selected state
    $tableName = "";
    switch ($stateID) {
        case 1:
            $tableName = "andhra_pradesh";
            break;
        case 2:
            $tableName = "arunachal_pradesh";
            break;
        case 3:
            $tableName = "assam";
            break;
        case 4:
            $tableName = "bihar";
            break;
        case 5:
            $tableName = "chhattisgarh";
            break;
        case 6:
            $tableName = "goa";
            break;
        case 7:
            $tableName = "gujarat";
            break;
        case 8:
            $tableName = "haryana";
            break;
        case 9:
            $tableName = "himachal_pradesh";
            break;
        case 10:
            $tableName = "jharkhand";
            break;
        case 11:
            $tableName = "karnataka";
            break;
        case 12:
            $tableName = "kerala";
            break;
        case 13:
            $tableName = "madhya_pradesh";
            break;
        case 14:
            $tableName = "maharashtra";
            break;
        case 15:
            $tableName = "manipur";
            break;
        case 16:
            $tableName = "meghalaya";
            break;
        case 17:
            $tableName = "mizoram";
            break;
        case 18:
            $tableName = "nagaland";
            break;
        case 19:
            $tableName = "odisha";
            break;
        case 20:
            $tableName = "punjab";
            break;
        case 21:
            $tableName = "rajasthan";
            break;
        case 22:
            $tableName = "sikkim";
            break;
        case 23:
            $tableName = "tamil_nadu";
            break;
        case 24:
            $tableName = "telangana";
            break;
        case 25:
            $tableName = "tripura";
            break;
        case 26:
            $tableName = "uttar_pradesh";
            break;
        case 27:
            $tableName = "uttarakhand";
            break;
        case 28:
            $tableName = "west_bengal";
            break;
        case 29:
            $tableName = "andaman_and_nicobar_islands";
            break;
        case 30:
            $tableName = "chandigarh";
            break;
        case 31:
            $tableName = "dadra_and_nagar_haveli_and_daman_and_diu";
            break;
        case 32:
            $tableName = "delhi";
            break;
        case 33:
            $tableName = "jammu_and_kashmir";
            break;
        case 34:
            $tableName = "ladakh";
            break;
        case 35:
            $tableName = "lakshadweep";
            break;
        case 36:
            $tableName = "puducherry";
            break;
        default:
            // Invalid state ID
            echo "Invalid state ID.";
            exit();
    }

    // Construct the query
    $sql = "INSERT INTO $tableName (State_ID, Hospital_Name, Contact_Number, Pincode, District, Address, Email, Website, UserID, Password) 
            VALUES ('$stateID', '$hospitalName', '$contactNumber', '$pincode', '$district', '$address', '$email', '$website', '$UserID', '$password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to success page or show a success message
        //header("Location: add_hospital_success.php");
        echo "inserted ";
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
