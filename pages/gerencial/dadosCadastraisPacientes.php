<form role="form"  id="formDadosCadastraisPacientes" method="post">
		<br>
		<div class="row">
			<input type="hidden" name="idpaciente" id="idpaciente"> 
			<div class="form-group col-md-6">
				<label>Nome </label>
                <input class="form-control" name="nome" id="nome" required>
                <p class="help-block"></p>
			</div>

			<div class="form-group col-md-2">
				<label for="idade">Idade</label>
					<input class="form-control" id="idade" name="idade">
			</div>
			<div class="form-group col-md-2">
				<label for="telefone">Telefone:</label>
				 <input class="form-control" name="telefone" id="telefone">
			</div>
			<div class="form-group col-md-2">
				 <label for="matricula">Matrícula:</label>
				<input class="form-control" name="matricula" id="matricula">
			</div>		
		</div>

		<div class="row"> 
			<div class="form-group col-md-4">
				<button type="submit" name="submit" id="btnSalvarPaciente" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
				<button  type="button" class="btn btn-light" title="" onclick="location.assign('pacientes.php')"> 
					<i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 0.9rem"></i> Voltar</button>
			</div>				
		</div>
</form>
								 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<!-- <script src="../../dist/js/mascara_phone.js"></script> -->

<!-- AUTOCOMPLETE BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>



<script>
	$(document).ready(function() {
		$(function(){
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			const id=urlParams.get('id');
	
			if (id!= null) {
			$.ajax({
				type: 'GET',
				url: 'operPacientes.php',
				data: {id},
				success:function(data){
					var proc = JSON.parse(data);
					document.getElementById("idpaciente").value = id;
					document.getElementById("nome").value = proc.data[0][1];
					document.getElementById("idade").value = proc.data[0][2];
					document.getElementById("telefone").value = proc.data[0][3];
					document.getElementById("matricula").value = proc.data[0][4];

				// Exibe o nome no header da página
				document.getElementById("exibirNome").innerHTML = "Nome: "+ document.getElementById("nome").value;	
				}
			});
		}
		});
	});		 
</script>

<script>
   	    $(document).on('click','#btnSalvarPaciente',function(e){
			e.preventDefault();
				$.ajax({  
				url:"sqlPacientes.php",  
				method:"POST",  
				data: {
					idpaciente : $("#idpaciente").val(),
					nome : $("#nome").val(),
					idade : $("#idade").val(),
					telefone : $("#telefone").val(),
					matricula : $("#matricula").val(),
			
                },
				beforeSend:function(){ 
               },  
				success:function(data){
				 	alert("Registro salvo com sucesso!")
				 	$("#idpaciente").val(data);
				 	location.assign('cadastroPacientes.php?id='+data);
				}  
			   });  
			}); 
</script>
