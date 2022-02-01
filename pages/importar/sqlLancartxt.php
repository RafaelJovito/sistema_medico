<?php 
include '../opendb.php';
include_once('../func.php');

$fp = fopen($_FILES['arquivo']['tmp_name'], 'rb');
    while ( ($line = fgets($fp)) !== false) {
        $teste = explode(',', $line);
        $nome =$teste[0];
        $idade =$teste[1];
        $telefone = $teste[2];
        $matricula = $teste[3];
      
        $query = $mysql_conn->prepare("INSERT INTO pacientes(nome, idade, telefone, matricula) VALUES (?, ?, ?, ?)");
        $query->bind_param("siss", $nome, $idade, $telefone, $matricula);
        $query->execute();
        $query->close();

    }
     header('location: lancarPaciente.php' );

?>