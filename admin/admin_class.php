<?php 

 /***
  * Developer Zelalem Abreham 
  * Contact : 920498295
  * Date written Dec 06
  * website : https://www.zolasoft.com.et/
  * 
  * **/
 require __DIR__.'/../config/Dbconfig.php';
 
 /**
  * Admin class all action written here
  */
 class adminClass extends Database{

    public function ChangePassMethod(){
      if (isset($_POST['changeBtn'])) {
        // code...
         $email = $_POST['email'];
         $opassword = sha1($_POST['opassword']);
         $npassword = $_POST['npassword'];
         $cpassword = $_POST['cpassword'];

         $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$email' AND `password` = '$opassword'");
         $sqlQuery->execute();

         // return $rowQ = $sqlQuery->rowCount() ? ? 

         if ($rowQ = $sqlQuery->rowCount() > 0) {
           // code...
           if ($npassword != $cpassword) {
             // code...
             return  "Error : new and confirm password not matched.";
           }else{
             // return ""
              $npassword = sha1($npassword);
             $sqlQuery = $this->conn->prepare("UPDATE `user_account` SET `password` = '$npassword' WHERE `email` = '$email' ");
             if ($sqlQuery->execute()) {
               // code...
               return "Success : password successfully changed.";
             }else{
               return "Error : something want wrong try again.";
             }
           }
         }else{
           return "Error : Entered old password is wrong.";
         }
      }
    }

    public function UpdateMethod(){

      if (isset($_POST['updateBtn'])) {
        // code...
         $name = $_POST['name'];
         $email = $_POST['email'];
         $type = $_POST['type'];

         $sqlQuery = $this->conn->prepare("UPDATE `user_account` SET `role` = '$type' WHERE `email` = '$email'");
         if ($sqlQuery->execute()) {
           // code...
           return "Success : Data successfully updated.";
         }else{
           return "Error : something want wrong try again.";
         }
      }
    }


   public function userMethod(){

      // Remove user
      if (isset($_POST['Remove'])) {
        // code...
         $uid = $_POST['uid'];
         // return $uid;
         $sqlQuery = $this->conn->prepare("DELETE FROM `user_account` WHERE `user_id` = '$uid'");
         if ($sqlQuery->execute()) {
           // code...
           return "Success : User successfully removed.";
         }else{
           return "Error : something want wrong try again.";
         }
      }
      // code...
      // user ziga lock off
       if (isset($_POST['Active'])) {
         // code...
         $status = 0;
         $uid = $_POST['uid'];
         $sqlQuery = $this->conn->prepare("UPDATE `user_account` SET `status` = '$status' WHERE `user_id` = '$uid' ");
         if ($sqlQuery->execute()) {
            return "Success : User Blocked.";
         }else{
           return "Error : something want wrong.";
         }
       }

       // user kifet lock on
       if (isset($_POST['DeAtive'])) {
         // code...
         $status = 1;
         $uid = $_POST['uid'];
         $sqlQuery = $this->conn->prepare("UPDATE `user_account` SET `status` = '$status' WHERE `user_id` = '$uid' ");
         if ($sqlQuery->execute()) {
            return "Success : User Unblocked.";
         }else{
           return "Error : something want wrong.";
         }
       }
    }

   public function getUserList(){
      // code...

       $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account`");
       $sqlQuery->execute();
       if ($rowQ = $sqlQuery->rowCount() > 0) {
         // code...
         $resultQ = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
         foreach ($resultQ as $key => $value) {
           // code...
           $dataQ[] = $value;
         }

         return $dataQ;
       }

       return $rowQ = $sqlQuery->rowCount();
    }

   public function RegisterMethod(){
        if (isset($_POST['registerBtn'])) {
          // code...
          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = sha1($_POST['password']);
          $phone = $_POST['phone'];
          $type = $_POST['type'];

          $status = 1;
          $otp = mt_rand(10000,99999);

          $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$email' AND `phone` = '$phone' ");
          $sqlQuery->execute();

          if ($rowQ = $sqlQuery->rowCount()) {
            // code...
             return "Error : Email or phone number is used by other user.";
          }else{
            // return "Success : ";

             $date = date('Y-m-d');

             $sqlQuery = $this->conn->prepare("INSERT INTO `user_account`(`user_id`, `fullname`, `password`, `email`, `status`, `role`, `created_at`, `otp`, `phone`) 
              VALUES (NULL,'$name','$password','$email','$status','$type','$date','$otp','$phone')");
             if ($sqlQuery->execute()) {
                
                return "Success : Data successfully registred.";
             }else{
                return "Error : something want wrong try again.";
             }
          }
        }
    }

    public function getDetail($param1){
      // code...

       $sqlQuery = $this->conn->prepare("SELECT * FROM `user_account` WHERE `email` = '$param1'");
       $sqlQuery->execute();
       if ($rowQ = $sqlQuery->rowCount() > 0) {
         // code...
         $resultQ = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
         foreach ($resultQ as $key => $value) {
           // code...
           $dataQ[] = $value;
         }

         return $dataQ;
       }

       return $rowQ = $sqlQuery->rowCount();
    }
    
 }

?>