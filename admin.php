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
	<title>administrador</title>
	<?php include_once "include.php"; ?>
</head>
<body>
	<?php include_once "navegacao.php"; ?>	

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Lista de Usuários</h1>		
		<table class="table table-condensed table-bordered">
			<a href="formulario_adicionar_usuario.php" class="btn btn-primary">+ usuário </a>
			<br><br>
			<thead>
				<tr>
					<?php if(isset($_SESSION['mensagem']))echo $_SESSION['mensagem'];unset($_SESSION['mensagem']);?>
				</tr>
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach(listaUsuarios() as $u): ?>
					<tr>
						<td> <?php echo $u['nome']; ?> </td>
						<td> <?php echo $u['cpf']; ?> </td>
						<td>
							<a href="<?php echo base_url('formulario_editar_usuario.php')."?editar=".$u['id'];?>" class="btn btn-warning btn-xs">Editar</a>
							<a href="<?php echo base_url('formulario_deletar_usuario.php')."?deletar=".$u['id'];?>" class="btn btn-danger btn-xs">Apagar</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>