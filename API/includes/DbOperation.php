<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createUsuario($nome, $senha){
		$stmt = $this->con->prepare("INSERT INTO Usuario (nome, senha) VALUES (?, ?)");
		$stmt->bind_param("ss", $nome, $senha);
		if($stmt->execute())
			return true; 
		return false; 
	}
		
	function getUsuario(){
		$stmt = $this->con->prepare("SELECT idUsu, nome, senha FROM Usuario");
		$stmt->execute();
		$stmt->bind_result($idUsu, $nome, $senha);
		
		$usuario = array(); 
		
		while($stmt->fetch()){
			$user  = array();
			$user['idUsu'] = $idUsu; 
			$user['nome'] = $nome; 
			$user['senha'] = $senha;			
			
			array_push($usuario, $user); 
		}
		
		return $usuario; 
	}
	
	
}