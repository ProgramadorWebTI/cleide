<?php

// INICIAR A SESSÃO PARA QUE POSSAMOS FAZE AS RESTRIÇÕES;
session_start();

// INCLUIR O ARQUIVO GESTÃO COM AS FUNÇÕES DO SISTEMA;
include_once "gestao.php";

// NA LINHA 9, FAZ A VERIFICAÇÃO SE O USUÁRIO ESTÁ LOGADO;
if(isset( $_SESSION['autenticado']) == FALSE)
{
	// REDIRECIONA O USUARIO PARA A PAGINA DE LOGIN;
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar usuário</title>
	<?php include_once "include.php"; ?>
</head>
<body>
	<?php include_once "navegacao.php"; ?>	

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Editar de Usuário</h1>	

			<div class="panel">
				<div class="panel-body">
					<form action="acoes/inserir_usuario.php" method="post">
						<input type="hidden" name="obs_cng" value="----">
						<input type="hidden" name="obs_bloqueio" value="----">
						<input type="hidden" name="obs_detran" value="----">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="nome">Nome:</label>
										<input type="text" name="nome" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="numero_habilitacao">Nº Habilitação:</label>
										<input type="text" name="numero_habilitacao" class="form-control">
									</div>
								</div>
							</div>	

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label for="identidade">RG:</label>
										<input type="text" name="identidade" class="form-control">
									</div>	
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="cpf">CPF:</label>
										<input type="text" name="cpf" class="form-control">
									</div>	
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="data_nasc">Data Nasc:</label>
										<input type="date" name="data_nasc" class="form-control">
									</div>
								</div>
								<div class="col-md-2">
									<label for="nacionalidade">Nascionalidade:</label>
									<input type="text" name="nacionalidade" class="form-control">
								</div>
								<div class="col-md-2">
									<label for="naturalidade">Naturalidade:</label>
									<input type="text" name="naturalidade" class="form-control">
								</div>
								<div class="col-md-2">
									<label for="uf">UF:</label>
									<input type="text" name="uf" class="form-control">
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<label for="exame_sanidade">Exame de saniedade:</label>
									<input type="text" name="exame_sanidade" class="form-control">
								</div>
								<div class="col-md-3">
									<label for="habilitacao_para_categoria">Habilitação para categoria:</label>
									<input type="text" name="habilitacao_para_categoria" class="form-control">
								</div>
								<div class="col-md-3">
									<label for="data_solicitacao_da_emissao">Data solicitação:</label>
									<input type="date" name="data_solicitacao_da_emissao" class="form-control">
								</div>
								<div class="col-md-3">
									<label for="data_de_habilitacao">Data da Habilitação:</label>
									<input type="date" name="data_de_habilitacao" class="form-control">
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label for="email">E-mail:</label>
									<input type="text" name="email" class="form-control">
								</div>
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary">cadastrar</button>
								</div>
							</div>
					</form>

				</div>
			</div>	
		</div>
	</div>
</body>
</html>