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
 class vistorsClass extends Database{

    public function replaceRoom(){

       if (isset($_POST['Replace'])) {
         // code...
         $ruid = $_POST['ruid'];
         $roomnumber = $_POST['roomnumber'];
         $email = $_POST['email'];

           $sqlQuery = $this->conn->prepare("DELETE FROM `reserverooms` WHERE `roomid` = '$ruid' AND `remail` = '$email' ");
           if ($sqlQuery->execute()) {
             // code...
             

              $sqlQuery = $this->conn->prepare("UPDATE `rooms` SET `status` = 0 WHERE `roomid` = '$ruid'");
              if ($sqlQuery->execute()) {
                // code...
                return "Success : Room replaced successfully.";
              }else{
                return "Error : try again.";
              }
           }else{
             return "Error : try again.";
           }
       }
    } 

    public function getReservedRooms($param1){

       $sqlQuery = $this->conn->prepare("SELECT * FROM `reserverooms` WHERE `remail` = '$param1'");
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

    public function Reservation(){

        if (isset($_POST['Reserved'])) {
          // code...
           $email = $_POST['email'];
           $roomnumber = $_POST['roomnumber'];
           $ruid = $_POST['ruid'];
           $name = $_POST['name'];
           $duedate = $_POST['duedate'];
           $startdate = date('Y-m-d');

           $sqlQuery = $this->conn->prepare("INSERT INTO `reserverooms`(`rid`, `roomid`, `roomnumber`, `hotelname`, `remail`, `sdate`, `ddate`) 

            VALUES (NULL,'$ruid','$roomnumber','$name','$email','$startdate','$duedate')");

           if ($sqlQuery->execute()) {
             // code...
             
             $sqlQuery = $this->conn->prepare("UPDATE `rooms` SET `status` = 1 WHERE `roomid` = '$ruid'");
              if ($sqlQuery->execute()) {
                // code...
                return "Success : Room reserved successfully.";
              }else{
                return "Error : try again.";
              }
           }else{
             return "Error : try again.";
           }
        }
    }

    public function getMyRooms(){

       $sqlQuery = $this->conn->prepare("SELECT * FROM `rooms`");
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