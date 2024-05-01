<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEMHR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
    /* Add your custom styles here */
    body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
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
    color: palegreen;
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


    .category {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      margin-bottom: 20px;
    }
    footer a {
        color: inherit; /* Inherit color from parent element */
        text-decoration: none; /* Remove default underline */
    }

    footer a:hover {
        text-decoration: none; /* Add underline on hover */
    }
     a{
        text-decoration:none !important;
     }
  </style>
</head>

<nav style="background-color:white;" class="navbar navbar-expand-lg navbar-light fixed-top">
    <div  class="container">
        <a style="color:green;" class="navbar-brand" href="#">
            <img src="img/logo.png" width="50px" height="50px" alt="Logo">NEMHR
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Get In Touch</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>


<body>


<!-- First section -->
<!-- First section -->
<div style="margin-top: 85px; margin-bottom: 160px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col position-absloute">
                <!-- Background Image -->
                <img src="img/slider1.jpg" width="100%" height="500px" style="position: absolute; top: 0; left: 0; object-fit: cover; z-index: -1;" alt="background">
                
                <!-- Text content -->
                <div style="padding-left:20px; padding-top: 30px;color:darkred; " class="banner-text text-start">
                   <h1 class="display-4 fw-bold">National Electronic Medical<br> Health Records</h1>
                   <p>Empowering Healthcare, Connecting Lives</p>
                    <a href="#" class="btn btn-lg btn-info">Explore Features</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second section -->
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-3 mb-4">
            <!-- Clickable button -->
            <a href="admin/admin.php" class="btn btn-secondary category d-block text-center">
                <img src="img/admin.png" width="80px" height="80px" alt="Admin Icon" class="img-fluid mb-3">
                <h5 class="mb-3"><strong>Admin</strong></h5>
                <p class="mb-0"><--click to login--></p>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <!-- Clickable button -->
            <a href="hospital/hospital_login.php" class="btn btn-secondary category d-block text-center">
                <img src="img/hospital.png" width="80px" height="80px" alt="Hospital Icon" class="img-fluid mb-3">
                <h5 class="mb-3"><strong>Hospital</strong></h5>
                <p class="mb-0"><--click to login--></p>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <!-- Clickable button -->
            <a href="doctor/doctor.php" class="btn btn-secondary category d-block text-center">
                <img src="img/doctor.png" width="80px" height="80px" alt="Doctor Icon" class="img-fluid mb-3">
                <h5 class="mb-3"><strong>Doctor</strong></h5>
                <p class="mb-0"><--click to login--></p>
            </a>
        </div>
        <div class="col-md-3 mb-4">
            <!-- Clickable button -->
            <a href="patient/patient.php" class="btn btn-secondary category d-block text-center">
                <img src="img/patient.png" width="80px" height="80px" alt="Patient Icon" class="img-fluid mb-3">
                <h5 class="mb-3"><strong>Patient</strong></h5>
                <p class="mb-0"><--click to login--></p>
            </a>
        </div>
    </div>
</div>

<div class="container bg-info">
    <div class="row mb-4 ">
        <div class="col-md">
            <div class="p-4">
                <h4 class="text-white"><strong>Medical Records</strong></h4>
                <p class="text-white">Accessing 'Medical Records' yields vital health data, encompassing diagnoses, 
                    treatments, and patient history, facilitating informed decision-making and personalized healthcare management.</p>
                <a href="#" class="btn btn-success">View Records</a>
            </div>
        </div>
        
    </div>
</div>


<div style="padding-bottom:0px" class="container">
    <div class="row bg-info p-4">
        <!-- Hospital Services -->
        <div class="col-md-4 text-center">
        <h5><img src="img/hospital.png" width="50px" height="50px" alt="Hospital Icon" class="img-fluid mb-3">
        <strong>Hospitals
            100+</strong></h5>
        </div>
        <!-- Doctor Services -->
        <div class="col-md-4 text-center">
        <h5><img src="img/doctor.png" width="50px" height="50px" alt="Doctor Icon" class="img-fluid mb-3">
        <strong> Doctors
             200+</strong></h5>
        </div>
        <!-- Staff Services -->
        <div class="col-md-4 text-center">
            <h5><img src="img/patient.png" width="50px" height="50px" alt="Staff Icon" class="img-fluid mb-3">
           <strong> Staff 50+</strong></h5>
            
        </div>
    </div>
</div>


<!-- Third section -->





<div style="margin-top:20px" class="container">
<h5 class="text-center"><strong>Department & Sepcialist</strong></h5>
    <div class="row mb-4">
        <!-- Left Column -->
        <div class="col-md-6">
            <!-- Row 1 -->
            <div style="margin-top:40px" class="row mb-3">
                <div class="col-md-6">
                <h5> <img src="img/cancer.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">CancerCare</a></h5>
                </div>
                <div class="col-md-6">
                <h5> <img src="img/deplogo1.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">OrthoPaedics</a></h5>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                <h5>  <img src="img/deplogo2.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">Pulmonology</a></h5>
                </div>
                <div class="col-md-6">
                <h5> <img src="img/nephrology.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">Nephrology</a></h5>
                </div>
            </div>
            <!-- Row 3 -->
            <div class="row mb-3">
                <div class="col-md-6">
                <h5>  <img src="img/deplogo3.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">CardiacSciences</a></h5>
                </div>
                <div style="" class="col-md-6">
                <h5><img src="img/deplogo4.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">NeuroSciences</a></h5>
                </div>
            </div>
            <!-- Row 4 -->
            <div class="row">
                <div class="col-md-6">
                <h5><img src="img/Gastreo.png"width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">Gastroenterlogy</a></h5>
                </div>
                <div class="col-md-6">
                <h5><img src="img/Obestetrics.png" width="50px" height="50px" alt="Logo 1" class="img-fluid">
                    <a href="#">Obstetrics</a></h5>
                </div>
            </div>
        </div>
        <!-- Right Column -->
        <div class="col-md-6">
            <img src="img/banner.png" height="200px" width="400PX" alt="Main Image" class="img-fluid">
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   

</body>

<footer style="background-color:#ccccb3; color: #333; font-family: Arial, sans-serif;" class="mt-4">
    <div class="container py-4">
        <!-- Row 1: Logo, Slogan -->
        <div class="row mb-4">
            <div  class="col-md-3">
                <!-- Anand Academy Logo -->
               <h3> <img src="img/logo.png" width="100px" height="100px" alt="NEMHR" class="img-fluid mb-3"></h3>
                <!-- Slogan -->
                
                <!-- Follow Us -->
                <h5><strong>Follow Us</strong></h5>
                <!-- Social Media Icons -->
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube  mr-3"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter  mr-3"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram  mr-3"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in  mr-3"></i></a></li>
                </ul>
            </div>
            <div  class="col-md-3">
                <!-- Company -->
                <h5><strong>Company</strong></h5>
                <ul class="list-unstyled">
                    <li><a href="#" >About Us</a></li>
                    <li><a href="#" >Team</a></li>
                    <li><a href="#" >Blog</a></li>
                    <li><a href="#" >Partnerships</a></li>
                </ul>
            </div>
           <!-- #Facility -->
           <div  class="col-md-3">
            <!-- Courses -->
            <h5><strong>Facilites</strong></h5>
            <ul class="list-unstyled">
                <li >Hospital</li>
                <li >Doctor</li>
                <li >Medical</li>
                <li >Staff</li>
                <li >Reports</li>
                
            </ul>
        </div>
        

            <div  class="col-md-3">
              <!-- Contact -->
              <h5><strong>
                   Contact
               </strong> </h5>
              <ul class="list-unstyled">
                  <li><i class="fas fa-envelope "></i> nemhr.co@gmail.com</li>
                  <li><i class="fas fa-phone "></i> 7352954855</li>
                  <li><i class="fas fa-map-marker-alt "></i> Phagwara Punjab<br>144411</li>
                  <li><i class="fas fa-globe "></i> India</li>
              </ul>
          </div>
          
         
            
        </div>
        <!-- Row 2: Mission -->
        <div  class="row mb-4">
            <div class="col-md-12">
                <!-- Mission of Anand Academy -->
            <h5> <strong>Mission</strong></h5>
                  <p>Our mission is to revolutionize healthcare delivery through the implementation of a comprehensive National Electronic Medical Health Records system.
                     We are committed to seamlessly integrating technology into healthcare processes, ensuring efficient, secure, and patient-centered services for all. 
                     By providing a unified platform for healthcare providers, our mission is to enhance coordination, reduce errors, and improve the overall quality of care.
                     We strive to empower patients with greater access to their medical information, promoting informed decision-making and proactive health management. 
                     Through innovation and collaboration, we aim to optimize healthcare outcomes, driving towards a healthier and more connected society. 
                     Join us in our mission to transform healthcare delivery and make a lasting impact on the well-being of individuals and communities nationwide.</p>
            </div>
        </div>
        <!-- Row 3: Privacy Policy and Terms of Use -->
        <hr>
        <div  class="container">
    <div   class="row mb-4">
        <div class="col-md-6 left">
            <!-- Privacy Policy and Terms of Use -->
            <h6 class="m-0">
               <strong> <a class="text-decoration-none " href="#">Privacy Policy</a>
                <span>|</span>
                <a class="text-decoration-none " href="#">Terms of Use</a></strong>
            </h6>
        </div>
        
        <div  class="col-md-6 right">
            <!-- Copyright -->
          <strong>  <p class="m-0 ">&copy; <?php echo date("Y"); ?> NEMHR | All rights reserved.</p></strong>
        </div>
    </div>
</div>

</div>



    </div>
</footer>

</html>