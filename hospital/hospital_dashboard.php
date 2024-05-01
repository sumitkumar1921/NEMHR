<?php
// Start the session
session_start();

// Check if hospital is not logged in
if (!isset($_SESSION["hospitalID"])) {
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
    <title>Hospital Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #a3c2c2;
        }
        
  .navbar-nav {
    display: flex;
    align-items: center;
}

.nav-item {
    margin: 0 10px;
    position: relative;
    font-weight: bold;
}

.nav-link {
    font-size: 16px;
    color: black;
    text-decoration: none;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: palevioletredgreen;
}

/* Optional: Add an underline effect on hover */
.nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 100%;
    height: 2px;
    background-color: plum;
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.nav-link:hover::after {
    transform: scaleX(1);
}
        /* Sidebar Styles */
 .sidebar {
    background-color:  white;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    height: 100%;
}

.profile-info {
    margin-bottom: 30px;
}

.profile-image img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.profile-details h6 {
    
    margin: 10px 0;
}

.menu h6 {
    font-weight: bold;
    margin-bottom: 10px;
}

.menu ul {
    list-style-type: none;
    padding: 0;
}

.menu ul li {
    margin-bottom: 5px;
}

.menu ul li a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
    font-weight: bold;
}

.menu ul li a:hover {
    color: green;
}

.main-content {
    min-height: calc(100vh - 80px);
    background-color: white;
    border-radius: 10px;
}
.fas {
        padding: 10px;
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
        .icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #007bff;
        }

    </style>
</head>
<body>
    <nav style="background-color:white;" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" width="50px" height="50px" alt="Logo">NEMHR
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="../global/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div style="margin-top: 100px;" class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                <div class="profile-info">
                    <div class="profile-image">
                        <img src="../img/profile.png" alt="Profile Picture">
                    </div>
                    <div style="margin-top:20px" class="profile-details">
                        <h6>Welcome</h6>
                        <h6  >ID : <?php echo $_SESSION["hospitalID"] ?></h6>
                        <h6  >Hospital : <?php echo $_SESSION["name"] ?></h6>
                        
                    </div>
                </div>
                        <hr>
                    <div class="menu">
                    <h6>Main Menu</h6>
                    <hr>
                    <ul>
                     <li><a href="#" id="profile-link"><i class="fas fa-user"></i> Profile</a></li>
                     <li><a href="#dashboard" id="dashboard-link"><i class="fas fa-chart-bar"></i> Dashboard</a></li>
                     <li><a href="#" id="department-link"><i class="fas fa-building"></i> Department</a></li>
                     <li><a href="#" id="staff-link"><i class="fas fa-users"></i> Staff</a></li>
                     <li><a href="#" id="doctor-link"><i class="fas fa-user-md"></i> Doctor</a></li>
                     <li><a href="#" id="slot-link"><i class="fas fa-cube"></i> DoctorSlot</a></li>
                     <li><a href="#" id="patient-link"><i class="fas fa-user-injured"></i> Patient</a></li>
                     <li><a href="#" id="insurance-link"><i class="fas fa-shield-alt"></i> Insurance</a></li>
   
                    </ul>

                </div>
                </div>
            </div>
            <div class="col-md-9">
            <h4 class="text-center">Welcome To Dashboard</h4>
                    <hr>
                <div id="dashboard" class="main-content">
                <?php

// Include the database configuration file
require_once "../db/configdb.php";

// Fetch counts for each category using regular queries and hospitalID
$hospitalID = $_SESSION["hospitalID"];

// Fetch count of doctors
$sqlDoctor = "SELECT COUNT(*) as count FROM doctor WHERE hospitalID = '$hospitalID'";
$resultDoctor = $conn->query($sqlDoctor);
$rowDoctor = $resultDoctor->fetch_assoc();
$doctorCount = $rowDoctor['count'];

// Fetch count of patients
$sqlpatient = "SELECT COUNT(DISTINCT patientID) AS patientcount FROM appointments WHERE hospitalID = $hospitalID";
$resultpatient = $conn->query($sqlpatient);
$rowpatient = $resultpatient->fetch_assoc();
$patientCount = $rowpatient['patientcount'];

// Fetch count of staff
$sqlStaff = "SELECT COUNT(*) as count FROM staff WHERE hospitalID = '$hospitalID'";
$resultStaff = $conn->query($sqlStaff);
$rowStaff = $resultStaff->fetch_assoc();
$staffCount = $rowStaff['count'];

// Fetch count of departments
$sqlDepartment = "SELECT COUNT(*) as count FROM department WHERE hospitalID = '$hospitalID'";
$resultDepartment = $conn->query($sqlDepartment);
$rowDepartment = $resultDepartment->fetch_assoc();
$departmentCount = $rowDepartment['count'];

// Close the database connection
$conn->close();
?>



                <div style="padding:15px;">
    <h4 class="text-center">Dashboard</h4>
</div>
<hr>
<div  class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-user-md icon"></i>
                    <h2>Doctor</h2>
                    <p><?php echo $doctorCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-user-injured icon"></i>
                    <h2>Patient</h2>
                    <p><?php echo $patientCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-users icon"></i>
                    <h2>Staff</h2>
                    <p><?php echo $staffCount; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="cube-box">
                <div class="text-center">
                    <i class="fas fa-hospital icon"></i>
                    <h2>Department</h2>
                    <p><?php echo $departmentCount; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>  
                    
                </div>
            </div>
        </div>
    </div>

   
   
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <script>
    $(document).ready(function(){
        // Function to load content
        function loadContent(url) {
            $('.main-content').load(url, function() {
                // Reload Font Awesome icons after loading content
                loadFontAwesomeIcons();
            });
        }

        // Function to reload Font Awesome icons
        function loadFontAwesomeIcons() {
            var icons = $('.fa-icon');
            icons.each(function() {
                $(this).removeClass('fa-icon');
                $(this).addClass('fa');
            });
        }

        // Click event handlers for menu items
        $('#profile-link').click(function(e) {
            e.preventDefault();
            loadContent('profile.php');
        });

        $('#dashboard-link').click(function(e) {
            e.preventDefault();
            loadContent('dashboard.php');
        });

        $('#doctor-link').click(function(e) {
            e.preventDefault();
            loadContent('doctor.php');
        });

        $('#slot-link').click(function(e) {
            e.preventDefault();
            loadContent('slot.php');
        });

        $('#patient-link').click(function(e) {
            e.preventDefault();
            loadContent('patient.php');
        });
        $('#insurance-link').click(function(e) {
            e.preventDefault();
            loadContent('insurance.php');
        });
        $('#staff-link').click(function(e) {
            e.preventDefault();
            loadContent('staff.php');
        });
        $('#department-link').click(function(e) {
            e.preventDefault();
            loadContent('department.php');
        });

        // Initial load of Font Awesome icons
        loadFontAwesomeIcons();
    });
</script>

</body>



</html>
