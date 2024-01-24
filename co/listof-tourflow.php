<?php 
  session_start();
  if (isset($_SESSION['sessionemail'])) {
  // code...
  }else{
  echo "<script>window.location='../login.php?error=Session timeout try again.';</script>";
  }

 require __DIR__.'/co_class.php';
 $coObject = new coClass();

 $dataQ = $coObject->getDetail($_SESSION['sessionemail']);
 $rowQ = $coObject->getDetail($_SESSION['sessionemail']);

   foreach ($dataQ as $key => $value) {
       // code...
      $fullname = $value['fullname'];
      $email = $value['email'];
      $role = $value['role'];
      $otp = $value['otp'];
      $phone = $value['phone'];
   }
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

    <link href="../js/all.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../lib\bootstrap-icons\bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
     <style type="text/css">
        .hero-header {
            background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url(../img/mursi1.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
    </style>
</head>

<body>

    <!-- Navbar & Hero Start -->
    <?php require __DIR__.'/navbar.php'; ?>
    <!-- Navbar & Hero End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Tourist Flow List</span></p>
                <h1 class="mb-4">Tourist Flow List</h1>
                <p class="text-primary text-center" style="font-size:13px;"><?php ?></p>
            </div>
             
            <div class="row">
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-borederd">
                            <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name.</th>
                                    <th>Arrival Date.</th>
                                    <th>Departure Date.</th>
                                    <th>Nationalities.</th>
                                    <th>Quantity.</th>
                                    <th>Income.</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php
                                $dataQ = $coObject->getTouristFlow();
                                $rowQ= $coObject->getTouristFlow();
                                if ($rowQ > 0) {

                                    // global $qty;
                                    $x = 0;
                                    $qty = 0;
                                    foreach ($dataQ as $key => $value) { $x++;
                                        $qty = $value['qty'];

                                        for ($i=0; $i < $x; $i++) { 
                                           $qty = $qty + $value['qty']; 
                                        }
                                     ?>
                            
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['arrival_date']; ?></td>
                                        <td><?= $value['departure_date']; ?></td>
                                        <td><?= $value['nationality']; ?></td>
                                        <td><?= $value['qty']; ?></td>
                                        <td><?= $value['income']; ?></td>
                                    </tr>

                                    
                                    
                               <?php } ?> 
                                <tr>
                                        <th>Quantity </th><td><?=$value['qty'] + $value['qty']; ?></td>
                                        <th>Income </th><td><?=$value['income'] + $value['income']; ?></td>
                                    </tr>
                           <?php  }else{ ?>
                                    <tr>
                                        <td colspan="5">No data found.</td>
                                    </tr>
                             <?php } ?>
                            
                            </tbody>
                        </table>
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
                    <a class="btn btn-link" href="#">Home</a>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
                    <!-- <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">biQs & Help</a> -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="bi bi-map-marker-alt me-3"></i>Wolaita Sodo ethipia</p>
                    <!-- <p class="mb-2"><i class="bi bi-phone-alt me-3"></i>+012 345 67890</p> -->
                    <p class="mb-2"><i class="bi bi-envelope me-3"></i>info@sertb.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="bib bi-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="bib bi-bicebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="bib bi-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="bib bi-linkedin-in"></i></a>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">SOUTH ETHIOPIA REGIONAL STATE CULTURE & TOURISM BUREAU</a>, All Right Reserved.

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
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script src="../ajax/jquery.js"></script>
    <script src="../ajax/jquery.min.js"></script>
    <script src="../jquery/jquery-3.4.1.min.js"></script>
</body>

</html>