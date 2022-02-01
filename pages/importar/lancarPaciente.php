
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
        <link href="../../dist/dependencias/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
         <link href="../../dist/css/dropdragfile.css" rel="stylesheet" />
      
         <script src="../../dist/dependencias/all.min.js" crossorigin="anonymous"></script>

        <style>

</style>

    </head>

        <?php include_once('../menu.php'); ?>
        <div id="layoutSidenav_content">
                <main>
				<div class="container-fluid">
                        <h1 class="mt-4">Importar Arquivo TXT</h1>
                        <form role="form" action="sqlLancartxt.php" method="POST" enctype="multipart/form-data"> 
                            <ol class="breadcrumb mb-4">
                            <div class="form-group col-md-12">
                                    <div class="form-group files color">
                                        <label>Seu arquivo para upload </label>
                                        <input type="file" class="form-control" id="arquivo" name="arquivo" >
                                    </div>
                            </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" name="submit" value="salvar" class="btn btn-success"><i class="fa fa-save" style="font-size: 0.9rem"></i> Salvar</button>
                                    <button  type="button" class="btn btn-light" title="" onclick="location.assign('../gerencial/pacientes.php')"> 
																<i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 0.9rem"></i> Voltar</button>
                                </div>	         
                            </ol>
                        </form>       
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Desenvolvido por © Rafael Jovito - 2022</div>
                            <div>
                                <a href="#">Poltícia de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
  </div>
         <script src="../../dist/dependencias/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

		<!-- AUTOCOMPLETE BOOTSTRAP -->
		<script src="../../dist/dependencias/jquery.min.js"></script>
		<link rel="stylesheet" href="../../dist/dependencias/jquery-ui.css">
		<script src="../../dist/dependencias/jquery-ui.min.js"></script>

        <script src="../../dist/dependencias/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../dist/js/scripts.js"></script>
        <script src="../../dist/dependencias/Chart.min.js" crossorigin="anonymous"></script>
         <script src="../../dist/dependencias/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="../../dist/dependencias/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
     	<!-- IMPORT BUTTONS DATATABLES EXPORT EXCEL, PDF, PRINT, COPY, CSV -->
		<script src="../../dist/dependencias/dataTables.buttons.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/buttons.flash.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/jszip.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/pdfmake.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/vfs_fonts.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/buttons.html5.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/dependencias/buttons.print.min.js" crossorigin="anonymous"></script>

		<script src="../../dist/dependencias/jquery.mask.min.js"></script>

<!-- TRABALIHAR COM MOEDAS -->
<script src="../../dist/dependencias/jquery.maskMoney.min.js"></script>
    
    </body>
</html>
