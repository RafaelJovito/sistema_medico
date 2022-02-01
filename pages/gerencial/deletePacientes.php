<?php

include '../opendb.php';
include_once('../func.php');


$id = $_GET["id"];
    $query = $mysql_conn->prepare("DELETE FROM pacientes WHERE idpaciente = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $query->close();
    
	header('location: pacientes.php' );

	
?>