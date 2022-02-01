<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];
$dados = array();

$query = $mysql_conn->prepare("SELECT * FROM pacientes  WHERE idpaciente = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
 
$form = $result->fetch_assoc();
	$dado[]=$form["idpaciente"];
	$dado[]=$form["nome"];
	$dado[]=$form["idade"];
	$dado[]=$form["telefone"];
	$dado[]=$form["matricula"];
	
	$dados[] = $dado;
		
$json_data = array(
	"draw" => intval(1),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval(count($dados)),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval(count($dados)), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data); 

$query->close();
?>	

