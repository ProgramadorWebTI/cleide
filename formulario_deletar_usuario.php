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

if(isset($_GET['deletar']))
{
	$id = trim($_GET['deletar']);	
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
	<title>Deletar usuário</title>
	<?php include_once "include.php"; ?>
</head>
<body>
	<?php include_once "navegacao.php"; ?>	

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Realmente deseja deletar esse usuário?</h1>
		<form method="post" action="formulario_deletar_usuario.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<button type="submit" class="btn btn-danger">Excluir</button>
			<a href="<?php echo base_url('admin.php');?>" class="btn btn-info">voltar</a>
		</form>
	</div>

	<?php 

	if(isset($_POST['id']))
	{
		$id = trim($_POST['id']);
		$resultado = deletarUsuario($id);
		if($resultado == true)
		{
			$_SESSION['mensagem'] = '<span class="text text-success text-center">Usuário deletado com sucesso!</span>';
			header("location:admin.php");
		}
		else
		{
			$_SESSION['mensagem'] = '<span class="text text-danger text-center">Error, não foi possivel deletar usuário!</span>';
			header("location:admin.php");
		}
	}	

	 ?>

	</div>
</body>
</html>