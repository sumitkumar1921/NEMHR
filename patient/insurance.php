
<?php
// Start the session
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["patientID"])) {
    // If not logged in, redirect to login page
    header("Location: hospital_login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insurance Information</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Additional CSS -->
  <style>
   /* Custom CSS for patient addition form */
.body{
  font-family: Arial, sans-serif;
  background-color: #a3c2c2;
}
form{
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color:white;
}

h5 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.form-group {
    margin-bottom: 5px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],



input[type="submit"] {
    display: block;
    width: 100%;
    padding: 5px;
    margin-top: 5px;
    background-color:white;
    border:1px solid;
    border-radius: 5px;
    color: grey;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}



  </style>
</head>
<body>
  <div class="container">
    <h5 class="mt-5">Insurance Information</h5>
    <form action="insurance_process.php" method="POST">
      <input type="hidden" name="patientID" value="<?php echo $_SESSION['patientID']; ?>">
      <div class="form-group">
        <label for="policyType">Policy Type</label>
        <input type="text" class="form-control" id="policyType" name="policyType" required>
      </div>
      <div class="form-group">
        <label for="policyNumber">Policy Number</label>
        <input type="text" class="form-control" id="policyNumber" name="policyNumber" required>
      </div>
      <div class="form-group">
      <label for="provider">Company</label>
    <select class="form-control" id="provider" name="provider" required>
        <option value="">Select Company</option>
        <option value="LIC">LIC (Life Insurance Corporation of India)</option>
                <option value="ICICI Prudential Life Insurance">ICICI Prudential Life Insurance</option>
                <option value="HDFC Life Insurance">HDFC Life Insurance</option>
                <option value="SBI Life Insurance">SBI Life Insurance</option>
                <option value="Max Life Insurance">Max Life Insurance</option>
                <option value="Bajaj Allianz Life Insurance">Bajaj Allianz Life Insurance</option>
                <option value="Tata AIA Life Insurance">Tata AIA Life Insurance</option>
                <option value="Reliance Nippon Life Insurance">Reliance Nippon Life Insurance</option>
                <option value="Kotak Mahindra Life Insurance">Kotak Mahindra Life Insurance</option>
                <option value="Aditya Birla Sun Life Insurance">Aditya Birla Sun Life Insurance</option>
                <option value="Bharti AXA Life Insurance">Bharti AXA Life Insurance</option>
                <option value="PNB MetLife India Insurance">PNB MetLife India Insurance</option>
                <option value="Exide Life Insurance">Exide Life Insurance</option>
                <option value="Canara HSBC Oriental Bank of Commerce Life Insurance">Canara HSBC Oriental Bank of Commerce Life Insurance</option>
                <option value="IDBI Federal Life Insurance">IDBI Federal Life Insurance</option>
                <option value="IndiaFirst Life Insurance">IndiaFirst Life Insurance</option>
                <option value="DHFL Pramerica Life Insurance">DHFL Pramerica Life Insurance</option>
                <option value="Star Union Dai-ichi Life Insurance">Star Union Dai-ichi Life Insurance</option>
                <option value="Aegon Life Insurance">Aegon Life Insurance</option>
                <option value="Future Generali India Life Insurance">Future Generali India Life Insurance</option>
    </select>
      </div>
      <div class="form-group">
        <label for="validFrom">Valid From</label>
        <input type="date" class="form-control" id="validFrom" name="validFrom" required>
      </div>
      <div class="form-group">
        <label for="validTo">Valid To</label>
        <input type="date" class="form-control" id="validTo" name="validTo" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button onclick="window.location.href='patient_dashboard.php'" class="btn btn-primary">Back</button>

    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
