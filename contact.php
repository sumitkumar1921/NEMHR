<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Custom styles */
    .sidebar .sidebar-info {
      background-color: #f8f9fa; /* Light gray background for sidebar */
      margin-top: 40px;
      border: 2px;
      border-radius: 10px;
      padding-top: 40px;
      text-align: center;
    }

    .form-area {

      padding: 30px;
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
    footer a {
        color: inherit; /* Inherit color from parent element */
        text-decoration: none; /* Remove default underline */
    }

    footer a:hover {
        text-decoration: none; /* Add underline on hover */
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Get In Touch</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>



<body>
  <div style="margin-top:100px;" class="container">
    <div class="row">
      <div class="col-md-3">
      
        <!-- Sidebar with logo -->
        <div class="sidebar">
        
        <div class="sidebar-info">
        <img src="img/conlogo.jpeg" width="100%" height="200px" alt="Logo" >
          <h4 style="margin-top:25px;">Contact NEMHR</h4>
          <div style="margin-top:25px">
            <h5>By Email</h5>
            nemhr@gmail.com
          </div>
          <div style="margin-top:25px; padding:10px;">
            <h5>By Contact Form</h5>
            <p>Use this form to drop a message to us. We will back to you within 24 business hours.</p>
          </div>
        </div>
        </div>
      </div>
      <div class="col-md-9">
      
        <!-- Form area with image -->
        <div class="form-area">
        <img src="img/Aboutus.jpeg" width="100%" height="200px" alt="Image" >
          <h4>Get In Touch</h4>
          <form action="contact_p.php" method="POST">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional, if you need Bootstrap JavaScript features) -->
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
