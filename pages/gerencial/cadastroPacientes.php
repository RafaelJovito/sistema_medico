<?php
session_start();
if((!isset ($_SESSION['user']) == true))
{
  unset($_SESSION['user']);
  session_destroy();
  header('location:../login.php');
  }
 
include '../opendb.php';
include_once('../func.php');
error_reporting(0);

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../../dist/css/styles.css" rel="stylesheet" />
		<link href="../../dist/css/timeline.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	 </head>	
<body>

<?php include_once('../menu.php'); ?>
        <div id="layoutSidenav_content">
                <main>
				<div class="container-fluid">
                        <h4 class="mt-4">Pacientes</h4>
               			<div class="row">
                  			<div class="col-xl-12">
									<div class="card">
										<div class="card-header">
											<i class="fas fa-address-card mr-1"></i> <p id="exibirNome"> Nome :</p>
											<input type="hidden" id="idpaciente">
										</div>
										<div class="card-body">
                                      		<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" href="#dadosCadastraisPacientes" role="tab" data-toggle="tab">Dados Cadastrais</a>
												</li>
											</ul>
											
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane fadein active" id="dadosCadastraisPacientes">
													<?php include_once('dadosCadastraisPacientes.php') ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
		 	       </main>
                <footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Desenvolvido por © Rafael Jovito - 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
				

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="../../dist/js/mascara_phone.js"></script>

<!-- AUTOCOMPLETE BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<!-- IMPORT BUTTONS DATATABLES EXPORT EXCEL, PDF, PRINT, COPY, CSV -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" crossorigin="anonymous"></script>


    </body>
</html>
										