

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Additional CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }
        .container {
            max-width: 800px;
        }
        .cube-box {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .cube-box:hover {
            transform: scale(1.05);
        }
        .cube-box h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .cube-box p {
            font-size: 18px;
            margin-bottom: 0;
            color: #555;
        }
       
    </style>
</head>
<body>
<div style="padding-top:15px;">
    <h4 class="text-center">Dashboard</h4>
</div>
<hr>
    <div class="container">
        
        <div class="row">
            <?php
            // Connect to your database and fetch the numbers
            require_once "../db/configdb.php";

            $sql = "SELECT COUNT(*) as count FROM country";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $countries_count = $row['count'];

            $sql = "SELECT COUNT(*) as count FROM state";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $states_count = $row['count'];

            $sql = "SELECT COUNT(*) as count FROM city";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $cities_count = $row['count'];

            $sql = "SELECT COUNT(*) as count FROM hospital";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $hospitals_count = $row['count'];

            $sql = "SELECT COUNT(*) as count FROM doctor";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $doctors_count = $row['count'];

            $sql = "SELECT COUNT(*) as count FROM patient";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $patients_count = $row['count'];

            $conn->close();
            ?>
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-globe ico"></i>
                        <h2>Countries</h2>
                        <p><?php echo $countries_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt ico"></i>
                        <h2>States</h2>
                        <p><?php echo $states_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-city ico"></i>
                        <h2>Cities</h2>
                        <p><?php echo $cities_count; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-hospital ico"></i>
                        <h2>Hospitals</h2>
                        <p><?php echo $hospitals_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-user-md ico"></i>
                        <h2>Doctors</h2>
                        <p><?php echo $doctors_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cube-box">
                    <div class="text-center">
                        <i class="fas fa-user ico"></i>
                        <h2>Patients</h2>
                        <p><?php echo $patients_count; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
