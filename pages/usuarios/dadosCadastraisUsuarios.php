<?php 
error_reporting(0);			
$funcoes = getItensTable($mysql_conn, "funcoes");


?>


<form role="form" action="./sqlUsuarios.php" method="post">
	<input type="hidden" name="idusuario" id="idusuario" value="<?php echo $row['idusuario']?>"> 
		<br>
							<div class="row">
								<div class="form-group col-md-5">
									<label>Nome</label>
									<input class="form-control" name="nome" id="nome" value="<?php echo $row['nome']?>" required>
								</div>
								<div class="form-group col-md-3">
									<label for="telefone">Telefone</label>
									<input class="form-control" name="telefone" id="telefone" value="<?php echo $row['telefone'] ?>" required>
								</div>
								<div class="form-group col-md-4">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>" required>
								</div>
								<div class="form-group col-md-2">
									<label for="senha">Senha</label>
									<input class="form-control" name="senha" id="senha" value="<?php echo $row['senha'] ?>" type="password" required>	
								</div>
								<div class="form-group col-md-3">
									<label for="funcao">Função</label>
									<select id="idFuncao" name="idfuncao" class="form-control" required>
										<option value=""></option>
												<?php
												for($i=0; $i<count($funcoes); $i++)
												{
												if($row["idfuncao"] == $funcoes[$i]['idfuncao'])
												{	
												?>
												<option value="<?=$funcoes[$i]['idfuncao']?>" selected><?=$funcoes[$i]['funcao']?></option>
												<?php
												}
												else
												{
												?>
												<option value="<?=$funcoes[$i]['idfuncao']?>" ><?=$funcoes[$i]['funcao']?></option>
												<?php
												}
												}
												?>
									</select>
								</div>
							</div>													
													<div class="row"> 
														<div class="form-group col-md-4">
															<button type="submit" name="submit" id="btnSalvarUsuario" value="salvar" class="btn btn-success"><i class="fa fa-save" style="font-size: 0.9rem"></i> Salvar</button>
															<button  type="button" class="btn btn-light" title="" onclick="location.assign('./usuarios.php')"> 
																<i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 0.9rem"></i> Voltar</button>
														</div>				
													</div>
												</form>

