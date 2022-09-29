<?php
 class Test{
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "api";      
    private $empTable = 'emp';	
	private $dbConnect = false;

    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
    private function getdt($sqlQuery){
        
    }

 }

?>