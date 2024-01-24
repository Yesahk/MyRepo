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
 class coClass extends Database{

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