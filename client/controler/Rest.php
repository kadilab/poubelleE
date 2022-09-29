<?php
class Rest{
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "gestionpoubel";      
    private $empTable = 'prelevement';	
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
	function insertEmployee($empData){ 		
		$id_poubelle=$empData["id_poubelle"];
		$poids=$empData["poids"];
        INSERT INTO `prelevement` (`id_prelevement`, `Poids`, `Niveau`, `id_contrat`) VALUES (NULL, 2 , '2.2', '3');
		$empQuery="
			INSERT INTO ".$this->empTable." 
			SET Poids='".$poids."', id_poubelle='".$id_poubelle."', Niveau='".$empSkills."', address='".$empAddress."', designation='".$empDesignation."'";
		if( mysqli_query($this->dbConnect, $empQuery)) {
			$messgae = "Employee created Successfully.";
			$status = 1;			
		} else {
			$messgae = "Employee creation failed.";
			$status = 0;			
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);
	}
	function getcontrat($id_poubelle)
	{


	}
}
?>