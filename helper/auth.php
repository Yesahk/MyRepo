<?php 


require __DIR__.'/../config/Dbconfig.php';

/**
 * 
 */
class SouthEthipianTourismAuthMethod extends Database{

	  public function fpMethod(){

	  	  if (isset($_POST['step2'])) {
	  	  	// code...
	  	  	 $email = $_POST['email'];
	  	  	 $password = $_POST['password'];
	  	  	 $cpassword = $_POST['cpassword'];

	  	  	 if ($password != $cpassword) {
	  	  	 	// code...
	  	  	 	 return "Error : New and confirm password not matched.";
	  	  	 }else{
	  	  	 	 // return "success : matched ";
	  	  	 		$password = sha1($password);
	  	  	 	  $sqlQuery = $this->conn->prepare("UPDATE `user_account` SET `password` = '$password' WHERE `email` = '$email'");
	  	  	 	  if ($sqlQuery->execute()) {
	  	  	 	  	// code...
	  	  	 	  	 return "success : password changed successfully.";
	  	  	 	  }else{
	  	  	 	  	 return "Error : try again.";
	  	  	 	  }
	  	  	 }
	  	  }

	  	 if (isset($_POST['step1'])) {
	  	 	// code...
	  	 	 $email = $_POST['email'];
	  	 	 $otp = $_POST['otp'];

	  	 	 $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$email' AND `otp` = '$otp'");
	  	 	 $sqlQuery->execute();
		  	 	 if ($rowQ = $sqlQuery->rowCount() > 0) {
						// code...
						echo "<script>window.location='./fp.php?step2&email={$email}';</script>";
					}else{
						return "Error : This email doesn't exits or otp not found.";
					}
	  	 }
	  }

	  public function signUp(){

	  	 if (isset($_POST['register'])) {
	  	 	// code... 
	  	 	  $email = $_POST['email'];
	  	 	  $password = sha1($_POST['password']);
	  	 	  $name = $_POST['name'];
	  	 	  $phone = $_POST['phone'];

	  	 	  $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$email' OR `phone` = '$phone' ");
	  	 	  $sqlQuery->execute();

	  	 	  if ($rowQ = $sqlQuery->rowCount() > 0) {
	  	 	  	// code...
	  	 	  	 return "return : Phone or email is used by other person.";
	  	 	  }else{

	  	 	  	$date = date('Y-m-d');
	  	 	  	$status = 1;
            $otp = mt_rand(10000,99999);

             $sqlQuery = $this->conn->prepare("INSERT INTO `user_account`(`user_id`, `fullname`, `password`, `email`, `status`, `role`, `created_at`, `otp`, `phone`) 
              VALUES (NULL,'$name','$password','$email','$status','Vistors','$date','$otp','$phone')");

             if ($sqlQuery->execute()) {
             	// code...
             	 return "success : Vistor registred successfully.";
             }else{
             	 return "return : try again.";
             }
	  	 	  }
	  	 }
	  }

	  public function getHeritageList(){

       $sqlQuery = $this->conn->prepare("SELECT * FROM  `cultural_heritage`");
       $sqlQuery->execute();

       $rowQ = $sqlQuery->rowCount();
       if ($rowQ > 0) {
         // code...
         $resultQ = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
         foreach ($resultQ as $key => $value) {
           // code...
           $dataQ[] = $value;
         }
         return $dataQ;
         return $rowQ;
       }
       // return $rowQ;
    }

	public function Login(){
		// code...

		if (isset($_POST['loginbtn'])) {
			// code..

		$email = $_POST['email'];
		$password = sha1($_POST['password']);

		$sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$email' AND `password` = '$password' ");
		$sqlQuery->execute();
		$rowQ = $sqlQuery->rowCount();

		if ($rowQ > 0) {
			// code...
			$resultQ = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultQ as $key => $value) {
				// code...
				$status = $value['status'];
				$role = $value['role'];
			}

			if ($role == 'Administrator') {
				if ($status == 1) {
						$_SESSION['sessionemail'] = $value['email'];
                        echo "<script>window.location='./admin/index.php?success= Sign in successfully';</script>";
					}else{
						return "Your Account Locked contact the Administartor.";
					}
			}
			elseif ($role == 'Clerk') {
					if ($status == 1) {
						$_SESSION['sessionemail'] = $value['email'];
                        echo "<script>window.location='./clerk/index.php?success= Sign in successfully';</script>";
					}else{
						return "Your Account Locked contact the Administartor.";
					}
			}

			elseif ($role == 'Hotel Reception') {
					if ($status == 1) {
						$_SESSION['sessionemail'] = $value['email'];
                        echo "<script>window.location='./hr/index.php?success= Sign in successfully';</script>";
					}else{
						return "Your Account Locked contact the Administartor.";
					}
			}



elseif ($role == 'Vistors') {
					if ($status == 1) {
						$_SESSION['sessionemail'] = $value['email'];
                        echo "<script>window.location='./vistors/index.php?success= Sign in successfully';</script>";
					}else{
						return "Your Account Locked contact the Administartor.";
					}
			}
			elseif ($role == 'Conservation Officer') {
					if ($status == 1) {
						$_SESSION['sessionemail'] = $value['email'];
                        echo "<script>window.location='./co/index.php?success= Sign in successfully';</script>";
					}else{
						return "Your Account Locked contact the Administartor.";
					}
			}else{
				return "Email or password is invalid.";
			}



			


		}else{
			return "Account not found.";
		}

	   }
	}
}

?>