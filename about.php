<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa; /* Set your desired background color */
      font-family: Arial, sans-serif; /* Set your desired font */
      color: #333; /* Set your desired text color */
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


    .imgabout {
      width: 100%;
      height: 250px;
    }

    /* Style for the columns in the second row */
    .aboutinfo {
      text-align: center;
      padding: 20px;
    }

    /* Style for the card columns in the third row */
    .card {
      padding-top: 20px;
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .card-title {
      font-size: 1.2rem;
      margin-bottom: 5px;
    }

    .card-text {
      font-size: 1rem;
      margin-bottom: 10px;
    }

    .btn {
      margin-top: 10px;
    }

    .btn i {
      margin: 0 auto;
      display: block;
    }

    /* Rounded image */
    .card-img-top {
      border-radius: 50%;
      width: 150px; /* Adjust size as needed */
      height: 150px; /* Adjust size as needed */
      margin: 0 auto; /* Center image */
    }

    /* Center the "Meet Our Team" heading */
    .meet-team-heading {
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    /* Horizontal rule style */
    hr {
      border-top: 2px solid #ccc;
      width: 100%;
      margin: 20px auto;
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
<body>

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
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Get In Touch</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>



  <div style="margin-top:90px;" class="container">
    <!-- First Row with Image -->
    <div class="row">
      <div class="col">
        <img src="img/babout.png" alt="About Us Image" class="img-fluid imgabout">
      </div>
    </div>
    <hr>

    <div class="row mt-5">
      <div class="col aboutinfo">
        <h1>Welcome to the National Electronic Medical Health Record</h1>
        <p>At NEMHR, our mission is to provide a secure, comprehensive, and efficient platform for healthcare professionals and patients to access and manage medical records seamlessly.</p>
        <p>With the ever-evolving landscape of healthcare, the need for a centralized repository of medical information has never been more critical. Our platform serves as a single source of truth, allowing authorized healthcare providers instant access to crucial patient data, leading to better-informed decision-making and improved patient outcomes.</p>
        <p>Security is at the core of everything we do. We understand the sensitivity of medical records and prioritize data protection through state-of-the-art encryption and stringent access controls, ensuring that patient information remains confidential and secure at all times.</p>
        <p>For patients, NEMHR offers unparalleled convenience and empowerment. With access to their medical records anytime, anywhere, patients can actively participate in their healthcare journey, making informed decisions and fostering collaboration with their healthcare providers.</p>
        <p>Our commitment to innovation drives us to continually enhance our platform, leveraging cutting-edge technologies such as artificial intelligence and machine learning to unlock new insights and improve the efficiency of healthcare delivery.</p>
        <p>Join us in shaping the future of healthcare with NEMHR, where every medical record matters, and every patient's journey is prioritized.</p>
      </div>
    </div>
    <hr>
    <!-- Second Row with Three Columns -->
    <div class="row mt-5">
      <div class="col aboutinfo">
        <h2>NEMHR</h2>
        <p>Provides best services to strength the health infrastructure and improving patient care.</p>
      </div>
      <div class="col aboutinfo">
        <h4>Unveiling Our Visionaries</h4>
        <p>NEMHR empowers healthcare professionals with user-friendly technology.</p>
      </div>
      <div class="col aboutinfo">
        <h4>Leveraging Innovation and Collaboration</h4>
        <p>NEMHR bridges the gap between patients and providers.</p>
      </div>
    </div>
    <hr>
    <div class="text-center">
      <h4>Meet Our Team</h4>
    </div>
    <hr>
    <!-- Third Row with Four Card Columns -->
    <div class="row mt-5">
      <!-- First card -->
      <div class="col-md-3">
        <div class="card">
          <img src="img/conlogo.jpeg" class="card-img-top" alt="pic">
          <div class="card-body">
            <h6 class="card-title text-center">Anurag</h6>
            <p class="card-text text-center">B.Tech (CSE)</p>
            <p class="card-text text-center">Lovely Professional University</p>
            <ul class="list-inline text-center">
              <li class="list-inline-item"><a href="#"><i class="fab fa-twitter mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-instagram mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in mr-3"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Repeat the above code for the remaining three columns -->
      <div class="col-md-3">
        <div class="card">
          <img src="img/conlogo.jpeg" class="card-img-top" alt="pic">
          <div class="card-body">
            <h6 class="card-title text-center">Sumit</h6>
            <p class="card-text text-center">B.Tech (CSE)</p>
            <p class="card-text text-center">Lovely Professional University</p>
            <ul class="list-inline text-center">
              <li class="list-inline-item"><a href="#"><i class="fab fa-twitter mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-instagram mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in mr-3"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Repeat the above code for the remaining three columns -->
      <div class="col-md-3">
        <div class="card">
          <img src="img/conlogo.jpeg" class="card-img-top" alt="pic">
          <div class="card-body">
            <h6 class="card-title text-center">Prakash</h6>
            <p class="card-text text-center">B.Tech (CSE)</p>
            <p class="card-text text-center">Lovely Professional University</p>
            <ul class="list-inline text-center">
              <li class="list-inline-item"><a href="#"><i class="fab fa-twitter mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-instagram mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in mr-3"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Repeat the above code for the remaining three columns -->
      <div class="col-md-3">
        <div class="card">
          <img src="img/conlogo.jpeg" class="card-img-top" alt="pic">
          <div class="card-body">
            <h6 class="card-title text-center">Tanishka</h6>
            <p class="card-text text-center">B.Tech (CSE)</p>
            <p class="card-text text-center">Lovely Professional University</p>
            <ul class="list-inline text-center">
              <li class="list-inline-item"><a href="#"><i class="fab fa-twitter mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-instagram mr-3"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in mr-3"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Repeat the above code for the remaining three columns -->

    </div>
  </div>

  <!-- Bootstrap JS -->
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
