<?php 
  session_start();
  require __DIR__.'/helper/auth.php';
  $object = new SouthEthipianTourismAuthMethod;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SOUTH ETHIOPIA REGIONAL STATE CULTURE & TOURISM BUREAU</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- bivicon -->
    <link href="img/bivicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?bimily=Heebo:wght@400;500;600&bimily=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
   <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> -->

    <link href="js/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib\bootstrap-icons\bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .hero-header {
            background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url(img/mursi1.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
    </style>
</head>

<body>

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="bi bi-map-marker-alt me-3"></i>South Ethipian Tourism</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="bi-arrow-bar-down"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <!-- <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="package.html" class="nav-item nav-link">Packages</a> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Destination</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <a href="login.php" class="nav-item nav-link">Login</a>
                </div>
                <a href="register.php" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1> -->
                        <p class="fs-4 text-white mb-4 animated slideInDown">CULTURAL HERITAGE INFORMATION MANAGEMENT SYSTEM FOR SOUTH ETHIOPIA REGIONAL STATE CULTURE & TOURISM BUREAU</p>
                        <!-- Search button here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


      <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h6 class="section-title bg-white text-center text-primary px-3">Regsiter</h6>
                <h5 class="mb-4">Please provide important fields.</h5>
            </div>
            
             <?php if (isset($_GET['error'])) { ?>
              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-md-6 col-lg-6" id="displayblock">
                  <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="color: #fff; background:red; border-radius:0; height:50px;">
                  <?= $_GET['error'];?>
                </div>
                </div>
              </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form id="forms" action="" method="post">
                            <!-- <p class="section-title px-5 justify-content-center"><span class="px-2"><?php ?></span></p> -->
                            <p><?= $object->signUp(); ?></p>
                            <div class="control-group">
                                <input type="text" class="form-control" id="email" placeholder="Your Email" name="email" />
                                <p class="text-danger mt-1" id="error-1" style="font-size:12px;"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control" id="password" placeholder="password" name="password" />
                                <p class="text-danger mt-1" id="error-2" style="font-size:12px;"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your name" name="name" />
                                <p class="text-danger mt-1" id="error-3" style="font-size:12px;"></p>
                            </div>

                            <div class="control-group">
                                <input type="number" class="form-control" id="phone" placeholder="Your phone" name="phone" />
                                <p class="text-danger mt-1" id="error-4" style="font-size:12px;"></p>
                            </div>

                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="register" style="border-radius: 0;" name="register">Register</button>
                            </div>

                            <p class="text-primary mt-1"><a href="fp.php?step1">Lost password ?</a></p>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->
        
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow bideIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">SERCTB</h4>
                    <a class="btn btn-link" href="index.php">Home</a>
                    <a class="btn btn-link" href="index.php#about">About Us</a>
                    <a class="btn btn-link" href="login.php">Contact Us</a>
                    <a class="btn btn-link" href="vistor.php?reg=vistor">Register</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="bi bi-map-marker-alt me-3"></i>Wolaita Sodo ethipia</p>
                  
                </div>
            
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">SOUTH ETHIOPIA REGIONAL STATE CULTURE & TOURISM BUREAU</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">WSU IT 4TH Year Students 2016 EC</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="ajax/jquery.js"></script>
    <script src="ajax/jquery.min.js"></script>
    <script src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            setTimeout(()=>{
                    $("#displayblock").css("display","none");
                },2000);
        

            $("#register").on('click',function(event) {
                // body...
                // alert("s...");
                var email = $("#email").val();
                var password = $("#password").val();
                var name = $("#name").val();
                var phone = $("#phone").val();

                const regname = /[a-zA-Z]$/;

                if (email == '') {
                    event.preventDefault();
                    $("#email").css("border-color","red");
                    $("#email").addClass("bg-danger");
                    $("#error-1").html('This field is required.');
                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Regsiter');
                    },1000); 
                }else{
                    $("#email").css("border-color","green");
                    $("#email").addClass("bg-success");
                    $("#error-1").html('');
                } 

                if (password == '' || password.length < 6) {
                    event.preventDefault();
                    $("#password").css("border-color","red");
                    $("#password").addClass("bg-danger");
                    $("#error-2").html('This field is required.');

                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Register');
                    },1000); 
                }else{
                    $("#password").css("border-color","green");
                    $("#password").addClass("bg-success");
                    $("#error-2").html('');
                }

                if (name == '' || !regname.test(name)) {
                    event.preventDefault();
                    $("#name").css("border-color","red");
                    $("#name").addClass("bg-danger");
                    $("#error-3").html('This field is required.');

                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Register');
                    },1000); 
                }else{
                    $("#name").css("border-color","green");
                    $("#name").addClass("bg-success");
                    $("#error-3").html('');
                }

                if (phone == '') {
                    event.preventDefault();
                    $("#phone").css("border-color","red");
                    $("#phone").addClass("bg-danger");
                    $("#error-4").html('This field is required.');

                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Register');
                    },1000); 
                }else{
                    $("#phone").css("border-color","green");
                    $("#phone").addClass("bg-success");
                    $("#error-4").html('');
                }

                if (phone.charAt(0) != 0) {
                    event.preventDefault();
                    $("#phone").css("border-color","red");
                    $("#phone").addClass("bg-danger");
                    $("#error-4").html('Phone number must be start with 0.');

                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Register');
                    },1000); 
                }else{
                    $("#phone").css("border-color","green");
                    $("#phone").addClass("bg-success");
                    $("#error-4").html('');
                }

                if (phone.charAt(1) != 9) {
                    event.preventDefault();
                    $("#phone").css("border-color","red");
                    $("#phone").addClass("bg-danger");
                    $("#error-4").html('Phone number must be start with 09.');

                    $("#register").html('Processing...');
                    setTimeout(()=>{
                        $("#register").html('Register');
                    },1000); 
                }else{
                    $("#phone").css("border-color","green");
                    $("#phone").addClass("bg-success");
                    $("#error-4").html('');
                }
            });
        });
    </script>
</body>

</html>