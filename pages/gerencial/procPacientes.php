<?php

session_start();
include '../opendb.php';
include_once('../func.php');

$funcao = $_SESSION['idfuncao'];


$conn = $mysql_conn;

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome', 
	1 => 'idade',
	2 => 'telefone',
	3 => 'matricula',
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = $mysql_conn->prepare("SELECT * FROM pacientes WHERE 1=1");
$result_user ->execute();
$result_user->store_result();
$qnt_linhas = $result_user->num_rows();
// print_r($qnt_linhas);
$result_user ->close();

//Obter os dados a serem apresentados
$result_usuarios = "SELECT * FROM pacientes WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR idade LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR telefone LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR matricula LIKE '".$requestData['search']['value']."%' )";
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
while( $row_usuarios = $result->fetch_assoc() ) {  
	 
		$dado = array(); 
		$dado[] =  $row_usuarios["nome"] ; 
		$dado[] =  $row_usuarios["idade"] ;

		//Máscara telefone
		if(empty($row_usuarios["telefone"])){
			$phone = ["Sem telefone"];
		}if(!empty($number = $row_usuarios["telefone"])){
			$phone = sprintf("(%s) %s-%s",
		 	 substr($number, 0, 2),
		  	substr($number, 3, 5),
		 	 substr($number, 4, 4));
		}
		
		$dado[] = $phone;
		$dado[] = $row_usuarios["matricula"];	
		
		$dado[] = '<button  type="button" id="btnVisualizar" class="btn btn-secondary" data-id="'.$row_usuarios["idpaciente"].'"><i class="fa fa-search" style="font-size: 0.9rem"></i> Visualizar</button>';
		$dado [] = '<button type="button" id="btnExcluir" class="btn btn btn-danger" data-id="'.$row_usuarios["idpaciente"].'"><i class="fa fa-trash" style="font-size: 0.9rem"></i> Excluir </button>';
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








           