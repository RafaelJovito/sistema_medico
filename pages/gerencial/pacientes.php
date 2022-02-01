
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
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	 
	</head>

        <?php include_once('../menu.php'); ?>
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4">Pacientes</h4>
                        <ol class="breadcrumb mb-4">
                        		 <button  type="button" class="btn btn-primary" title="" onclick="location.assign('cadastroPacientes.php')"> <i class="fa fa-plus" aria-hidden="true" style="font-size: 0.9rem"></i>
								Novo Paciente</button>
						</ol>
                        
               	        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Pacientes
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="listar-pacientes" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Idade</th>
											<th>Telefone</th>
											<th>Matrícula</th>
											<th> </th>
											<th> </th>
										</tr>
									</thead>
                                    </table>
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
        </div>
   
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
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
          
    <script>
    	$(document).ready(function() {
			$('#listar-pacientes').DataTable({		
				"language": {
                   "url": "../../dist/locale/datatable-pt-br.json"
                },		
				"processing": true,
				"serverSide": true,
				"dom": 'Bfrtip',
        		"buttons": [
           			'copy', 'csv', 'excel', 'pdf', 'print'
        		],
				"ajax": {
					"url": "procPacientes.php",
					"type": "POST"
				}
			});
		} );
    </script>
    
	
	<script>
		$(document).on('click','#btnVisualizar',function(e){
            e.preventDefault();
		var id = $(this).data('id');
		window.open("cadastroPacientes.php?id="+id,"visualizar");
		});
		</script>
		
		
	<script>
		$(document).on('click','#btnExcluir',function(e){
            e.preventDefault();
		var id = $(this).data('id');
		var result = confirm("Excluir o paciente ?");
        if (result) {
            location.assign("deletePacientes.php?id="+id);
        }
		
		});
	</script>		
	
</body>

</html>
