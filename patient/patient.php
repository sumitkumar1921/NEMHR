<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Optional CSS for custom styling */
        .container {
            margin-top: 100px;
        }
        .login-container {
            margin-top: 50px;
        }
        .card-header h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-btn {
            width: 150px;
            border-radius: 20px;
            margin-top: 20px;
        }
        .signup-btn {
            width: 150px;
            border-radius: 20px;
            margin-top: 20px;
            align-items: center;
        }
        .additional-text {
            position: relative;
            text-align: center;
            color: white;
            padding: 20px;
        }
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
        }
    </style>

</head>
<body>
<div style="margin-bottom:20px" class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6 d-flex flex-column">
                <div class="card mb-0 h-100">
                    <div class="logo-container">
                        <img src="../img/logo.png" alt="NEMHR Logo" width="100px">
                        <h3>NEMHR</h3>
                    </div>
                    <div class="card-header">
                        <h2>Patient Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="patient_process.php" method="post">
                            <div class="form-group">
                                <label for="userID">UserID:</label>
                                <input type="text" name="userID" class="form-control" required>
                                <div class="invalid-feedback">Please enter a valid UserID.</div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block login-btn">Login</button>
                            </div>
                            <div class="form-group">
                                <a href="add_patient.php" class="btn btn-primary btn-block signup-btn">Sign Up</a>
                                <a class="btn btn-secondary btn-block signup-btn" href="../index.php">Cancel</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <div class="card mb-0 h-100">
                    <img src="../img/slider3.jpg" class="card-img" alt="...">
                    <div class="image-overlay"></div>
                    <div class="card-img-overlay additional-text">
                    <h3 class="card-title">National Electronic Medical Health Record</h3>
                    <p class="card-text">This is the Patient Login page for the National Electronic Medical Health Record system. Please login with your credentials to access the patient's features.</p>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>