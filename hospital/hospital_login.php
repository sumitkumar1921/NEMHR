<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Login</title>
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
                        <h2>Hospital Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="hospital_login_process.php" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block login-btn">Login</button>
                            </div>
                        </form>
                        <a href="../index.php" class="btn btn-block signup-btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <div class="card mb-0 h-100">
                    <img src="../img/slider3.jpg" class="card-img" alt="...">
                    <div class="image-overlay"></div>
                    <div class="card-img-overlay additional-text">
                    <h3 class="card-title">National Electronic Medical Health Record</h3>
                    <p class="card-text">This is the Hospital Login page for the National Electronic Medical Health Record system. Please login with your credentials to access the hospital's features.</p>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>