<?php
// Check if slotID is provided and is valid
if (isset($_GET['slotID']) && is_numeric($_GET['slotID'])) {
    $slotID = $_GET['slotID'];

    // Include database connection
    require_once "../db/configdb.php";

    // Construct SQL query to delete the slot
    $sql = "DELETE FROM doctor_slots WHERE slotID = ?";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $slotID);
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the doctor slots page
    echo "<script>alert('Slot deleted'); window.history.back();</script>";


    exit();
} else {
    // If slotID is not provided or is invalid, redirect back to doctor slots page
    header("Location: view_slot.php");
    exit();
}
?>
