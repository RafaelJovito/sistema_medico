<?php

session_start();
include '../opendb.php';
include_once('../func.php');


$conn = $mysql_conn;

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome', 
	1 => 'telefone',
	2 => 'email',
	3 => 'funcao'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = $mysql_conn->prepare("SELECT a.idusuario, a.nome, a.telefone, a.email, a.senha, a.idfuncao, b.funcao FROM usuarios AS a INNER JOIN funcoes AS b ON a.idfuncao = b.idfuncao");
$result_user ->execute();
$result_user->store_result();
$qnt_linhas = $result_user->num_rows();
// print_r($qnt_linhas);
$result_user ->close();

//Obter os dados a serem apresentados
$result_usuarios = "SELECT a.idusuario, a.nome, a.telefone, a.email, a.senha, a.idfuncao, b.funcao FROM usuarios AS a INNER JOIN funcoes AS b ON a.idfuncao = b.idfuncao";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR telefone LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR funcao LIKE '".$requestData['search']['value']."%' )";
}
 

$resultado_usuarios = $mysql_conn->prepare($result_usuarios);
$resultado_usuarios->execute(); 
$resultado_usuarios->store_result();

$totalFiltered = $resultado_usuarios->num_rows();
$resultado_usuarios->close(); 
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$resultado_usuarios = $mysql_conn->prepare($result_usuarios);
$resultado_usuarios->execute();
$result = $resultado_usuarios->get_result();
// Ler e criar o array de dados
$dados = array();
while( $row = $result->fetch_assoc() ) {  
	 
	$dado = array(); 
	$dado[] =  $row["nome"];

	//Máscara telefone
	// if(empty($row["telefone"])){
	// 	$phone = ["Sem telefone"];
	// }if(!empty($number = $row["telefone"])){
	// 	$phone = sprintf("(%s) %s-%s",
	// 	  substr($number, 0, 2),
	// 	  substr($number, 2, 5),
	// 	  substr($number, 7));
	// }
	
	$dado[] =  $row["telefone"];
	$dado[] =  $row["email"];
	$dado[] =  $row["funcao"];
	$dado [] = '<button type="button" id="btnEditar" class="btn btn btn-primary" data-id="'.$row["idusuario"].'"><i class="fa fa-pen">&nbsp;</i> Editar</button>';
	$dado [] = '<button type="button" id="btnExcluir" class="btn btn btn-danger" data-id="'.$row["idusuario"].'"><i class="fa fa-trash ">&nbsp;</i> Excluir </button>';
	$dados[] = $dado;

}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);
$resultado_usuarios->close(); 
echo json_encode($json_data);  //enviar dados como formato json



?>








           