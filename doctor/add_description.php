<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Description</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .btn-submit, .btn-back {
            width: 100%;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-submit {
            background-color: #007bff;
            border: none;
            color: #fff;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-back {
            background-color: #6c757d;
            border: none;
            color: #fff;
            margin-top: 10px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4 class="mb-0">Add Prescription</h4>
        </div>
        <div class="card-body">
            <form action="add_description_backend.php" method="post">
                <div class="mb-3">
                    <label for="description" class="form-label">Prescription:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>
                <?php
                // Check if appointmentID, patientID, and doctorID are passed from the previous page
                if(isset($_POST['appointmentID'], $_POST['patientID'], $_POST['doctorID'])) {
                    // Store appointmentID, patientID, and doctorID in hidden input fields
                    $appointmentID = htmlspecialchars($_POST['appointmentID']);
                    $patientID = htmlspecialchars($_POST['patientID']);
                    $doctorID = htmlspecialchars($_POST['doctorID']);
                    echo "<input type='hidden' name='appointmentID' value='$appointmentID'>";
                    echo "<input type='hidden' name='patientID' value='$patientID'>";
                    echo "<input type='hidden' name='doctorID' value='$doctorID'>";
                } else {
                    // If variables are not passed, display an error message
                    echo "<div class='alert alert-danger' role='alert'>Error: Appointment details not found.</div>";
                }
                ?>
                <button type="submit" class="btn btn-primary btn-submit mt-3">Submit</button>
                <a href="javascript:history.back()" class="btn btn-secondary btn-back mt-2">Back</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
