<?php

require("db/conn.php");
require("db/includes.php");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Intervip - Cadastros</title>
	
	<!-- CSS -->
	<link href="styles/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	

</head>
<body class="geral">
	
	<top-header>
		<header>
			
			<div class="container-fluid"> 
				
				<div class="row">
					
					<div class="col-12 col-sm-2 col-md-3 logo-wrapper">
						<a href="../index.php"><img class="logo" src="assets/logo.png"></a>
					</div>
				
					<div class="col-12 col-sm-8 col-md-6" id="cabecalho">
						<h2>Cadastros</h2>
						<p>
					</div>
					<div class="col-12 col-sm-2 col-md-3">
						
					</div>
				
				</div>
			</div>

		</header>
    </top-header>
    
    <main>
		<div class="container-fluid">
			<div class="container">
				<div class="card border border-dark bg-light">
					<div class="card-body" id="centralizar">


						<br><br><br><br><br>
						<section class="row">
							<div class="col-md-12">
								<table id="tbl-CEP" class="table table-hover">
									<thead class="thead-dark">
										<tr>
											<th></th>
										</tr>
									</thead>
									
									<tbody>
										<tr class="table-primary">
											<th scope="row">
												<button type="button" class="btn btn-dark btn-link btn-lg btn-block" data-toggle="modal" data-target="#modal-cep" data-whatever="@mdo" id="btn-cep"><b>CEP</b></button>
												<div class="modal fade" id="modal-cep" tabindex="-1" role="dialog" aria-labelledby="modal-cep-label" aria-hidden="true">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																<span aria-hidden="true">&times;</span>
																</button>
																<h5 class="modal-title" id="modal-cep-label">Cadastrar CEP</h5>
															</div>
															<div class="modal-body" id="modal-cep">
																<form method="get" action=".">																
																	<table id="tbl-planos" class="table table-hover">
																		<thead class="thead-dark">
																			<tr>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<th class="table-secondary">
																					<div class="input-group">
																						<label for="input-cep" class="form-label d-block w-100"><h3 class="card-title">Informe o CEP:</h3></label>
																						
																						<input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);"class="form-control form-control-md" id="input-cep" 
																							placeholder="Insira o CEP sem pontos(.) vígulas(,) ou traços(-)" autocomplete="off"/></label><br />																				
																						<div class="input-group-append">
																						<button type="button" class="btn btn-primary cor-span">Confirmar</button>
																						</div>
																					</div>
																				</th>
																			</tr>
																			<tr>
																			<td class="table-secondary">
																					<div class="input-group mb-1">
																						<div class="input-group-prepend">
																							<span class="input-group-text cor-span"> Rua:</span>
																						</div>
																						<input name="rua" type="text" id="rua" size="120" class="form-control" aria-label="Rua" readonly/></label><br />
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="table-secondary">
																					<div class="input-group mb-1">
																						<div class="input-group-prepend">
																							<span class="input-group-text cor-span">Bairro:</span>
																						</div>
																						<input name="bairro" type="text" id="bairro" size="80" class="form-control" aria-label="Bairro"readonly/></label><br />
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="table-secondary">
																					<div class="input-group mb-1">
																						<div class="input-group-prepend">
																							<span class="input-group-text cor-span">Cidade:</span>
																						</div>
																						<input name="cidade" type="text" id="cidade" size="80" class="form-control" aria-label="Cidade"readonly/></label><br />
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="table-secondary">
																					<div class="input-group mb-1">
																						<div class="input-group-prepend">
																							<span class="input-group-text cor-span">UF:</span>
																						</div>
																						<input name="uf" type="text" id="uf" size="2" class="form-control" aria-label="UF"readonly/></label><br />
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td class="table-secondary">
																					<div class="input-group mb-1">
																						<div class="input-group-prepend">
																						</div>
																						<input name="ibge" type="hidden" id="ibge" size="8" class="form-control" aria-label="UF"readonly/></label><br />
																					</div>
																				</td>
																			</tr>
																		</tbody>
																		<thead class="thead-dark">
																			<tr>
																				<th></th>
																			</tr>
																		</thead>
																	</table>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" id="btn-cancelar-cep"><a href="index.php">Cancelar</a></button>
																<button type="button" class="btn btn-primary" id="btn-aplicar-cep"><a href="index.php">Aplicar</a></button>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr class="table-primary">
											<th scope="row">
												<button type="button" class="btn btn-dark btn-link btn-lg btn-block" data-toggle="modal" data-target="#modal-condos" data-whatever="@mdo" id="btn-condos"><b>Condomínios</b></button>
												<div class="modal fade" id="modal-condos" tabindex="-1" role="dialog" aria-labelledby="modal-condos-label" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																<span aria-hidden="true">&times;</span>
																</button>
																<label for="input-condo" class="form-label d-block w-100" style="margin-left: 35px;"><h3 class="card-title">Cadastro de blocos:</h3></label>
															</div>
															<div class="modal-body" id="modal-condos">
																<div class="row">
																	<div class="col-md-6">
																		<div class="row">
																			<div class="input-group mb-1">
																				<div class="input-group-prepend">
																					<span class="input-group-text cor-span">Nome:</span>
																				</div>
																				<input name="condos-nome" type="text" id="condos-nome" size="80" class="form-control"
																					placeholder="Insira o nome do condomínio"/></label><br />
																			</div>
																			
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="row">
																			<div class="input-group mb-1">
																				<div class="input-group-prepend">
																					<span class="input-group-text cor-span">N°:</span>
																				</div>
																				<input name="condos-numero" type="text" id="condos-numero" size="10" class="form-control"
																					placeholder="Insira o número" style="text-align: center;"/></label><br />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="row">
																			<div class="input-group mb-1">
																				<div class="input-group-prepend">
																					<span class="input-group-text cor-span">CEP:</span>
																				</div>
																				<input name="condos-cep" type="text" id="condos-cep" size="80" class="form-control"
																					placeholder="Insira o CEP" style="text-align: center;"/></label><br />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" id="btn-cancelar-cep"><a href="index.php">Cancelar</a></button>
																	<button type="button" class="btn btn-primary" id="btn-aplicar-cep"><a href="index.php">Aplicar</a></button>
																</div>
																<hr>
																<div class="row">
																	<div class="input-group">
																		<label for="input-condo" class="form-label d-block w-100"><h3 class="card-title">Cadastro de blocos:</h3></label>
																		<input type="text" class="form-control form-control-md" id="InputCondo" 
																			placeholder="Insira o nome do condomínio" autocomplete="off">
																		
																		<input type="text" name="condo" class="form-control form-control-md" id="InputIdsValue" 
																			placeholder="ID do condominio" autocomplete="off" style="max-width: 150px; text-align: center;">

																		<p id="valorDigitadoCondos"></p>
																		<p id="valorDigitadoIds"></p>

																		<div class="input-group-append">
																			<button type="submit" id="btn-submit" class="btn btn-primary" onclick="capturar(InputCondo, InputIdsValue)">Confirmar</button>
																		</div>
																	</div>
																</div>
																<script>
																	$("#BlocosClone").attr("placeholder", "Insira o bloco do condominio" + $("#valorDigitadoIds").html());
																</script>
																<div class="row" style="margin-top: 10px;">
																	<div class="input-group" id="origem" >
																		<input type="text" id="BlocosClone" class="form-control form-control-md"style="max-width: 500px;"
																			placeholder="" autocomplete="off" name="BlocosClone[]"  maxlength="40" size="100">
																			
																		<div class="input-group-append">
																			<button type="button" class="input-group-text cor-span" id="btnMais" style="cursor: pointer;" onclick="duplicarCampos();"><img src="assets/mais.png" style="max-width: 1rem;"></button>
																			<button type="button" class="input-group-text cor-span" id="btnMenos" style="cursor: pointer;" onclick="removerCampos(this);"><img src="assets/menos.png" style="max-width: 1rem;"></button>
																		</div>
																	</div>
																	<div id="destino" >
																	</div>
																</div>	
															</div>
															<hr>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" id="btn-cancelar-cep"><a href="index.php">Cancelar</a></button>
																<button type="button" class="btn btn-primary" id="btn-aplicar-cep"><a href="index.php">Aplicar</a></button>
															</div>
														</div>
													</div>
												</div>
											</th>
										</tr>
										<tr class="table-primary">
											<th scope="row">lista de condomínios RBX -> BD21</th>
										</tr>						
									</tbody>

									<thead class="thead-dark">
										<tr>
											<th></th>
										</tr>
									</thead>
								</table>
							</div>
						</section>
						<br><br><br><br><br>
					</div>
				</div>
			</div>
		</div>      
    </main>
	
	
		
	<footer class="footer navbar-fixed-bottom">
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"><a href="../index.php"><img class="logo" src="assets/logo.png"></a></div>
			</div>
			<div class="row">
				<div class="col-md-10 d-flex align-items-center">
					<p>© 2021 Gerencia Intervip | Todos os direitos reservados a Intervip.</p>
				</div>
			</div>
		</div>
	
	
		<!-- JS -->
		<script src="js/CEP.js"></script>
		<script src="js/main.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap-autocomplete.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
	</footer>
</body>
</html>