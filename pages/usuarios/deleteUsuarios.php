<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET['id'];

$query = $mysql_conn->prepare("DELETE FROM usuarios WHERE idusuario = ?");
$query->bind_param("i", $id);
$query->execute();
$query->close();

header ('location: usuarios.php');

?>