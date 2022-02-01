<?php 
session_start();
if((!isset ($_SESSION['user']) == true) )
{
  unset($_SESSION['user']);

  session_destroy();
  header('location:../login.php');
  }
 

include '../opendb.php';
include_once('../func.php');

$idusuario = $_POST['idusuario'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idfuncao = $_POST['idfuncao']; 
	
if (empty ($idusuario)){	
	$query	= $mysql_conn->prepare("INSERT INTO usuarios (nome, telefone, email, senha, idfuncao) VALUES (?, ?, ?, ?, ?)");
	$query->bind_param("sissi", $nome, $telefone, $email, $senha, $idfuncao);
	$query->execute();
	$query->close();

	$lastid=mysqli_insert_id($mysql_conn);
	header ('location: cadastroUsuarios.php?id='.$lastid);
}

else {
	if(!empty($idusuario)) {
		$query	= $mysql_conn->prepare("UPDATE usuarios SET nome = ?, telefone = ?, email = ?, senha = ?, idfuncao = ? WHERE idusuario = ?");
		$query->bind_param("sissii", $nome, $telefone, $email, $senha, $idfuncao, $idusuario);
		$query->execute();	
		$query->close();

	
	header('location: cadastroUsuarios.php?id='.$idusuario);
	}
}	
	
?>


