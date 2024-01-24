<?php 
  session_start();
  if (isset($_SESSION['sessionemail'])) {
  // code...
  }else{
  echo "<script>window.location='../login.php?error=Session timeout try again.';</script>";
  }

 require __DIR__.'/admin_class.php';
 $aObject = new adminClass();

 $dataQ = $aObject->getDetail($_SESSION['sessionemail']);
 $rowQ = $aObject->getDetail($_SESSION['sessionemail']);

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
                <p class="section-title px-5"><span class="px-2">Add User</span></p>
                <h5 class="mb-4">Please provide important fields.</h5>

            </div>
             
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form id="forms" action="" method="post">
                            <!-- <p class="section-title px-5"><span class="px-2"></span></p> -->
                            <p class="text-primary text-center" style="font-size:14px;"><?=$aObject->RegisterMethod(); ?></p>
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder=" Name" name="name" />
                                <p class="text-danger mt-1" id="error-1" style="font-size:12px;"></p>
                            </div>

                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder=" Email" name="email" />
                                <p class="text-danger mt-1" id="error-2" style="font-size:12px;"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
                                <p class="text-danger mt-1" id="error-3" style="font-size:12px;"></p>
                            </div>

                            <div class="control-group">
                                <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" />
                                <p class="text-danger mt-1" id="error-4" style="font-size:12px;"></p>
                            </div>

                            <div class="control-group">
                                <select name="type" id="type" class="form-control">
                                    <option value="Choose">Choose User Type</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Clerk">Clerk</option>
                                    <option value="Conservation Officer">Conservation Officer</option>
                                    <option value="Hotel Reception">Hotel Reception</option>
                                    
                                </select>
                                <p class="text-danger mt-1" id="error-5" style="font-size:12px;"></p>
                            </div>

                            <!-- <div class="control-group">
                                <select id="clg" class="form-control" name="clg">
                                <option value="Choose">Choose</option>
                                <option value="SOI">School of Informatics</option>
                                <option value="COE">College of Enginnering</option>
                                <option value="SOL">School of Law</option>
                                <option value="SOVS">School of Veternay Science</option>
                                <option value="COA">College of Agriculture</option>
                                <option value="COBE">College of Bussines and Economics</option>
                                <option value="COHSM">College of Health Science and Medicine</option>
                                <option value="CONCS">College of Natural and Computitional Science</option>
                                <option value="CSSH">College of Social Science and Humanities</option>
                                <option value="CEBS">College of Education and Begavioral Science</option>
                                <option value="Staff">Staff</option>
                              </select>
                                <p class="text-danger mt-1" id="error-6" style="font-size:12px;"></p>
                            </div> -->
                            <!-- <div class="control-group">
                                <textarea class="form-control" rows="6" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div> -->
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="registerBtn" style="border-radius: 0;" name="registerBtn">Submit</button>
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
     <script type="text/javascript">
        $(document).ready(function() {
            // body...
            $("#registerBtn").on('click',function(event) {
                
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var phone = $("#phone").val();
                var type = $("#type").val();

                const regexname = /[a-zA-Z]$/;
                function isValidEmail(email){
                 // const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                 const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                  return re.test(String(email).toLowerCase());
                }
                

                if (name == '') {
                    event.preventDefault();
                    $("#name").css("border-color","red");
                    $("#name").addClass("bg-danger");
                    $("#name").removeClass("bg-light");
                    $("#error-1").html('This field is required.');
                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }else if(!regexname.test(name)){
                     event.preventDefault();
                    event.preventDefault();
                    $("#name").css("border-color","red");
                    $("#name").addClass("bg-danger");
                    $("#name").removeClass("bg-light");
                    $("#error-1").html('* Fullname must be character.');
                    
                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 

                
                }else if(email == ''){
                    event.preventDefault();
                    $("#email").css("border-color","red");
                    $("#email").addClass("bg-danger");
                    $("#email").removeClass("bg-light");
                    $("#error-2").html('This field is required.');
                    $("#TranslateBtn").html('processing....');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }else if(!isValidEmail(email)){
                     event.preventDefault();
                    $("#email").css("border-color","red");
                    $("#email").addClass("bg-danger");
                    $("#email").removeClass("bg-light");
                    $("#error-2").html('* please provide valid email.');
                    // $("#TranslateBtn").html('processing....');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }else if(password == ''){
                    event.preventDefault();
                    $("#password").css("border-color","red");
                    $("#password").addClass("bg-danger");
                    $("#password").removeClass("bg-light");
                    $("#error-3").html('This field is required.');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#email").css("border-color","green");
                    $("#email").removeClass("bg-danger");
                    $("#error-2").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000);  
                }else if(password.length < 6){
                    event.preventDefault();
                    $("#password").css("border-color","red");
                    $("#password").addClass("bg-danger");
                    $("#password").removeClass("bg-light");
                    $("#error-3").html('* Password must be strong.');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#email").css("border-color","green");
                    $("#email").removeClass("bg-danger");
                    $("#error-2").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }else if(phone == ''){
                    event.preventDefault();
                    $("#phone").css("border-color","red");
                    $("#phone").addClass("bg-danger");
                    $("#phone").removeClass("bg-light");
                    $("#error-4").html('This field is required.');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#email").css("border-color","green");
                    $("#email").removeClass("bg-danger");
                    $("#error-2").html('');

                    $("#password").css("border-color","green");
                    $("#password").removeClass("bg-danger");
                    $("#error-3").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000);  
                }else if(phone.length != 10){
                    event.preventDefault();
                    $("#phone").css("border-color","red");
                    $("#phone").addClass("bg-danger");
                    $("#phone").removeClass("bg-light");
                    $("#error-4").html('* Phone must be 10 digit.');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#email").css("border-color","green");
                    $("#email").removeClass("bg-danger");
                    $("#error-2").html('');

                    $("#password").css("border-color","green");
                    $("#password").removeClass("bg-danger");
                    $("#error-3").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }else if(type == 'Choose'){
                    event.preventDefault();
                    $("#type").css("border-color","red");
                    $("#type").addClass("bg-danger");
                    $("#type").removeClass("bg-light");
                    $("#error-5").html('This field is required.');

                    $("#name").css("border-color","green");
                    $("#name").removeClass("bg-danger");
                    $("#error-1").html('');

                    $("#email").css("border-color","green");
                    $("#email").removeClass("bg-danger");
                    $("#error-2").html('');

                    $("#password").css("border-color","green");
                    $("#password").removeClass("bg-danger");
                    $("#error-3").html('');

                    $("#phone").css("border-color","green");
                    $("#phone").removeClass("bg-danger");
                    $("#error-4").html('');

                    $("#registerBtn").html('submit...');
                    setTimeout(()=>{
                        $("#registerBtn").html('Submit');
                    },1000); 
                }
              
            });
        });
    </script>
</body>

</html>