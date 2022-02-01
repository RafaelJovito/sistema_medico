<?php
include 'opendb.php';
// session_start inicia a sessão
session_start();

print_r($_POST);

$user 		= $_POST["email"];	
$password 	= $_POST["password"];

// goes back to login page if no data were found
if (($user=='') || ($password=='')) 
{
 	header('location: login.php');
}
else if ($user && $password)
{
	// verify if the user and password are corrects
	//$queryUser = mysql_query("SELECT * FROM operators WHERE name='$user' AND password='".md5($password)."'");
	$queryUser = mysqli_query($mysql_conn,"SELECT * FROM usuarios WHERE email='$user' AND senha='$password' ");
	
	// if the data is correct, proceed	
	if (mysqli_num_rows($queryUser) > 0) 

	{
		$auth = mysqli_fetch_array($queryUser);
		
		$_SESSION['idusuario'] = $auth['idusuario'];
		
		$_SESSION['user'] = $auth['nome'];
		$_SESSION['idfuncao'] = $auth['idfuncao'];
		
		mysqli_free_result($queryUser);
	 	 header('location: ./gerencial/pacientes.php' );
	}
	else
		{
		unset ($_SESSION['user']);
		unset ($_SESSION['password']);
	 	 header('location: login.php');	
	
	}	
}
 
?>