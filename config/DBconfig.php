<?php 

 /**
  * Developer Zelalem Abreham 
  * Date  November 13
  * website https://www.zolasoft.com.et/
  */

 /**
  * Database configuration code ..
  * This coding style or pattern written in OO-Programming model using PDO
  */
 class Database{
 	
 	// code...
 		private $db_host = "localhost";
 		private $db_user = "root";
 		private $db_pass = "";
 		private $db_name = "southethipian_ctb"; // database name for culture and turism burue app

 		public $conn;


 	public function __construct(){
 		
 		try {
 			
 			$this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass);
 			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 			if ($this->conn) {
				// echo "Connection Established";
			}else{
				echo "Connection not established";
			}
 		} catch (PDOException $e) {
 			echo "Error :" ."Connection not established.". $e->getMessage();
 		}
 	}
 }

 // create object for the class to alocate memory

 // $objForDb = new Database();
?>