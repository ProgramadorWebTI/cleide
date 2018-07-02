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

if(isset($_GET['editar']))
{
	$id = trim($_GET['editar']);
	$resultado = listarUsuarioParaEditar($id);	
}
else
{
	header("location:admin.php");
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
		<?php if($resultado >  0): ?>	

			<div class="panel">
				<div class="panel-body">
					<form action="acoes/editar_usuario.php" method="post">
						<?php foreach($resultado as $f): ?>
						<input type="hidden" name="id" value="<?php echo $f['id'];?>">
						<input type="hidden" name="obs_cng" value="<?php echo $f['obs_cng'];?>">
						<input type="hidden" name="obs_bloqueio" value="<?php echo $f['obs_bloqueio'];?>">
						<input type="hidden" name="obs_detran" value="<?php echo $f['obs_detran'];?>">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="nome">Nome:</label>
										<input type="text" name="nome" class="form-control" value="<?php echo $f['nome'];?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="numero_habilitacao">Nº Habilitação:</label>
										<input type="text" name="numero_habilitacao" class="form-control" value="<?php echo $f['numero_habilitacao'];?>">
									</div>
								</div>
							</div>	

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label for="identidade">RG:</label>
										<input type="text" name="identidade" class="form-control" value="<?php echo $f['identidade'];?>">
									</div>	
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="cpf">CPF:</label>
										<input type="text" name="cpf" class="form-control" value="<?php echo $f['cpf'];?>">
									</div>	
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="data_nasc">Data Nasc:</label>
										<input type="date" name="data_nasc" class="form-control" value="<?php echo $f['data_nasc'];?>">
									</div>
								</div>
								<div class="col-md-2">
									<label for="nacionalidade">Nascionalidade:</label>
									<input type="text" name="nacionalidade" class="form-control" value="<?php echo $f['nacionalidade'];?>">
								</div>
								<div class="col-md-2">
									<label for="naturalidade">Naturalidade:</label>
									<input type="text" name="naturalidade" class="form-control" value="<?php echo $f['naturalidade'];?>">
								</div>
								<div class="col-md-2">
									<label for="uf">UF:</label>
									<input type="text" name="uf" class="form-control" value="<?php echo $f['uf'];?>">
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<label for="exame_sanidade">Exame de saniedade:</label>
									<input type="text" name="exame_sanidade" class="form-control" value="<?php echo $f['exame_sanidade'];?>">
								</div>
								<div class="col-md-3">
									<label for="habilitacao_para_categoria">Habilitação para categoria:</label>
									<input type="text" name="habilitacao_para_categoria" class="form-control" value="<?php echo $f['habilitacao_para_categoria'];?>">
								</div>
								<div class="col-md-3">
									<label for="data_solicitacao_da_emissao">Data solicitação:</label>
									<input type="date" name="data_solicitacao_da_emissao" class="form-control" value="<?php echo $f['data_solicitacao_da_emissao'];?>">
								</div>
								<div class="col-md-3">
									<label for="data_de_habilitacao">Data da Habilitação:</label>
									<input type="date" name="data_de_habilitacao" class="form-control" value="<?php echo $f['data_de_habilitacao'];?>">
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label for="email">E-mail:</label>
									<input type="text" name="email" class="form-control" value="<?php echo $f['email'];?>">
								</div>
								<div class="col-md-12">
									<br>
									<button type="submit" class="btn btn-primary">Editar</button>
								</div>
							</div>

						<?php endforeach; ?>
					</form>

				</div>
			</div>	

			<?php elseif($resultado < 1): ?>
				<h3 class="alert alert-danger text-center">USUÁRIO NÃO ENCONTRADO</h3>
			<?php endif; ?>
		</div>
	</div>

</body>
</html>
