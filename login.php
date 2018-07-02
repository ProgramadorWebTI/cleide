<?php 
session_start();
include_once "gestao.php";
// VAMOS FAZER O LOGIN NO SISTEMA ADMINISTRATIVO/ADMIN

if(isset($_SESSION['autenticado']) == true)
{
	header("location:admin.php");
}

if(isset($_POST['usuario']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
{
	$usuario = trim($_POST['usuario']);
	$senha = trim($_POST['senha']);

	if(logar($usuario,$senha) > 0)
	{
		$_SESSION['autenticado'] = 1;
		$_SESSION['user'] = logar($usuario,$senha);
		header("location:admin.php");
	}
	else
	{
		header("location:login.php");
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/js/bootstrap.min.js"></script>
	<title>Login</title>
</head>
<body>
	<br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-offset-4">
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="">Usuário</label>
						<input type="text" name="usuario" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Senha</label>
						<input type="text" name="senha" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Logar-se</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>