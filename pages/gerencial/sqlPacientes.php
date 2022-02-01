<?php

include '../opendb.php';
include_once('../func.php');



$msgRetorno = null;

$idpaciente = $_POST['idpaciente'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];
$matricula = $_POST['matricula'];

if (empty ($idpaciente)){	
    	$query	= $mysql_conn->prepare("INSERT INTO pacientes (nome, idade, telefone, matricula) VALUES (?, ?, ?, ?)");
		$query->bind_param("siss", $nome, $idade, $telefone, $matricula);
		$query->execute();
		$query->close();

		$idpaciente=mysqli_insert_id($mysql_conn);
		$msgRetorno = $idpaciente;
		}
 else {			
		$query	= $mysql_conn->prepare("UPDATE pacientes SET nome = ?, idade = ?, telefone = ?, matricula = ? WHERE idpaciente = ?");
		$query->bind_param("sissi", $nome, $idade, $telefone, $matricula, $idpaciente);
		$query->execute();	
		$query->close();
		
	 	$msgRetorno = $idpaciente;
		
	 
}

echo $msgRetorno;
	
?>