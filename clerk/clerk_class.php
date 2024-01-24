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
 class ClerkClass extends Database{

    public function getTouristFlow(){

       $sqlQuery = $this->conn->prepare("SELECT * FROM `tur_flow` ");
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
       }

       return $rowQ;
    }

    public function regTouristFlow(){

       if (isset($_POST['touristflowBtn'])) {
         // code...
         $Quanitity = $_POST['Quanitity'];
         $arrivaldate = $_POST['arrivaldate'];
         $departuredate = $_POST['departuredate'];
         $nationality = $_POST['nationality'];
         $name = $_POST['name'];
         $income = $_POST['income'];


         $sqlQuery = $this->conn->prepare("SELECT * FROM  `tur_flow` WHERE `name` = '$name' ");
         $sqlQuery->execute();
         // $rowQ = $sqlQuery->rowCount();

         $sqlQuery = $this->conn->prepare("INSERT INTO `tur_flow`(`tfid`, `qty`, `nationality`, `arrival_date`, `departure_date`, `name`, `income`) 
          VALUES (NULL,'$Quanitity','$nationality','$arrivaldate','$departuredate','$name','$income')");

         if ($sqlQuery->execute()) {
           // code...
           return "Success : Tourist Flow successfully register.";
         }else{
           return "Error : try agian.";
         }
       }
    }

    public function HeritageMethod(){

       if (isset($_POST['Active'])) {
         // code...
         $hid = $_POST['hid'];
         $st = 0;

         $sqlQuery = $this->conn->prepare("UPDATE `cultural_heritage` SET `status` = '$st' WHERE `id` = '$hid'");
         if ($sqlQuery->execute()) {
           // code...
           return "Success : Heriatge open ed for turist from this time.";
         }else{
           return "Error : try agian.";
         }
       }


       if (isset($_POST['DeAtive'])) {
         // code...
         $hid = $_POST['hid'];
         $st = 1;
         $sqlQuery = $this->conn->prepare("UPDATE `cultural_heritage` SET `status` = '$st' WHERE `id` = '$hid'");
         if ($sqlQuery->execute()) {
           // code...
           return "Success : Heriatge closed for turist from this time.";
         }else{
           return "Error : try agian.";
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
       }
       return $rowQ;
    }

    public function regHeritageMethod(){
      if (isset($_POST['reg_HeritageBtn'])) {
        // code...
         $name = $_POST['name'];
         $type = $_POST['type'];
         $subtype = $_POST['subtype'];
         $datecreated = $_POST['datecreated'];
         $location = $_POST['location'];
         $conditions = $_POST['conditions'];
         $Importance = $_POST['Importance'];
         $history = $_POST['history'];
         $file = $_FILES['file'];

         $filename = $file['name'];
          $fileerror = $file['error'];
          $filetmp = $file['tmp_name'];

          $fileext = explode('.', $filename);

          $filechecker = strtolower(end($fileext));

          $filestoretype =  array('jpeg','jpg','png','gif','docx','pdf','txt');
          $destination = 'heritages/'.$filename;
          move_uploaded_file($filetmp, $destination);

          $sqlQuery = $this->conn->prepare("SELECT * FROM `cultural_heritage` WHERE `name` = '$name'");
          $sqlQuery->execute();
          $rowQ = $sqlQuery->rowCount();
          if ($rowQ > 0) {
            // code...
             return "{$name} heritage is recently registered.";
          }else{

             $sqlQuery = $this->conn->prepare("INSERT INTO `cultural_heritage`(`id`, `name`, `description`, `type`, `sub_type`, `date_created`, `locations`, `conditions`, `importance`, `history`, `photo_url`) 
              VALUES (NULL,'$name','$history','$type','$subtype','$datecreated','$location','$conditions','$Importance','$history','$destination')");

             if ($sqlQuery->execute()) {
               // code...
               return "Success : Heritage register successfully.";
             }else{
               return "Error : try agian.";
             }
          }
      }
    }

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