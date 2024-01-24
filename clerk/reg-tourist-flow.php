<?php 
  session_start();
  if (isset($_SESSION['sessionemail'])) {
  // code...
  }else{
  echo "<script>window.location='../login.php?error=Session timeout try again.';</script>";
  }

 require __DIR__.'/clerk_class.php';
 $cObject = new ClerkClass();

 $dataQ = $cObject->getDetail($_SESSION['sessionemail']);
 $rowQ = $cObject->getDetail($_SESSION['sessionemail']);

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
                <p class="section-title px-5"><span class="px-2">Register Tourist Flow</span></p>
                <h5 class="mb-4">Please provide important fields.</h5>

            </div>
             
            <div class="row">
                <!-- <div class="col-lg-3"></div> -->
                <div class="col-lg-12">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form id="forms" action="" method="post" enctype="multipart/form-data">
                            <!-- <p class="section-title px-5"><span class="px-2"></span></p> -->
                            <p class="text-primary text-center" style="font-size:14px;"><?= $cObject->regTouristFlow(); ?></p>
                           
                           <div class="row">
                           	 <div class="col-lg-4"> 
                           	 	 <div class="control-group">
	                                <input type="number" class="form-control" id="Quanitity" placeholder="Quanitity" name="Quanitity" />
	                                <p class="text-danger mt-1" id="error-1" style="font-size:12px;"></p>
	                            </div>
                           	 </div>

                             <div class="col-lg-4"> 
                                 <div class="control-group">
                                    <input type="date" class="form-control" id="arrivaldate" placeholder="arrivaldate" name="arrivaldate" />
                                    <p class="text-danger mt-1" id="error-2" style="font-size:12px;"></p>
                                </div>
                             </div>

                             <div class="col-lg-4"> 
                                 <div class="control-group">
                                    <input type="date" class="form-control" id="departuredate" placeholder="departuredate" name="departuredate" />
                                    <p class="text-danger mt-1" id="error-3" style="font-size:12px;"></p>
                                </div>
                             </div>

                              <div class="col-lg-4">
                                <div class="control-group">
                                <textarea class="form-control" rows="2" id="nationality" name="nationality" ></textarea>
                               <p class="text-danger mt-1" id="error-4" style="font-size:12px;"></p>
                            </div> 
                              </div>

                             <div class="col-lg-4">
                                <div class="control-group">
                                <select name="name" id="name" class="form-control">
                                    <option value="Choose">Choose type</option>
                                    <?php 
                                        $dataQ = $cObject->getHeritageList();
                                        $rowQ = $cObject->getHeritageList();
                                        foreach ($dataQ as $key => $value) { ?>

                                        <option value="<?=$value['name']; ?>"><?=$value['name']; ?></option>

                                        <?php } ?>
                                </select>
                                <p class="text-danger mt-1" id="error-5" style="font-size:12px;"></p>
                            </div>
                              </div>

                              <div class="col-lg-4"> 
                                 <div class="control-group">
                                    <input type="number" class="form-control" id="income" placeholder="income" name="income" />
                                    <p class="text-danger mt-1" id="error-6" style="font-size:12px;"></p>
                                </div>
                             </div>

                           </div>

               
                            
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="touristflowBtn" style="border-radius: 0;" name="touristflowBtn">Submit</button>
                            </div>
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

    <script type="text/javascript">
        
        $(document).ready(function() {
            // body...
            $("#touristflowBtn").on('click',function(event) {
                // body...
                var Quanitity = $("#Quanitity").val();
                var arrivaldate = $("#arrivaldate").val();
                var departuredate = $("#departuredate").val();
                var nationality = $("#nationality").val();
                var name = $("#name").val();
                var income = $("#income").val();

                if (Quanitity == '') {
                    event.preventDefault();
                    $("#Quanitity").css("border-color","red");
                    $("#Quanitity").addClass("bg-danger");
                    $("#error-1").html('This field is required.');
                    $("#touristflowBtn").html('Processing...');
                    setTimeout(()=>{
                        $("#touristflowBtn").html('Submit');
                    },1000); 
                }else{
                    $("#Quanitity").css("border-color","green");
                    $("#Quanitity").removeClass("bg-danger");
                    $("#error-1").html('');
                }

                if (nationality == '') {
                    event.preventDefault();
                    $("#nationality").css("border-color","red");
                    $("#nationality").addClass("bg-danger");
                    $("#error-4").html('This field is required.');
                    $("#touristflowBtn").html('Processing...');
                    setTimeout(()=>{
                        $("#touristflowBtn").html('Submit');
                    },1000); 
                }else{
                    $("#nationality").css("border-color","green");
                    $("#nationality").removeClass("bg-danger");
                    $("#error-4").html('');
                }

                if (name == 'Choose') {
                    event.preventDefault();
                    $("#name").css("border-color","red");
                    $("#name").addClass("bg-danger");
                    $("#error-5").html('This field is required.');
                    $("#touristflowBtn").html('Processing...');
                    setTimeout(()=>{
                        $("#touristflowBtn").html('Submit');
                    },1000); 
                }else{
                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-5").html('');
                }

                if (income == '') {
                    event.preventDefault();
                    $("#income").css("border-color","red");
                    $("#income").addClass("bg-danger");
                    $("#error-6").html('This field is required.');
                    $("#touristflowBtn").html('Processing...');
                    setTimeout(()=>{
                        $("#touristflowBtn").html('Submit');
                    },1000); 
                }else{
                    $("#income").css("border-color","green");
                    $("#income").removeClass("bg-danger");
                    $("#error-6").html('');
                }

            });
        });
    </script>
</body>

</html>