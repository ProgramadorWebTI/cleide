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
		<h1 class="page-header">Editar de processo</h1>		
		<form action="acoes/editar_processo.php" method="post">
			<?php foreach(listarProcessoParaEditar($id) as $p): ?>
				<input type="hidden" name="id_processo" value="<?php echo $p->id_processo;?>">
				<h4 class="text-uppercase">usuario: <?php echo $p->nome; ?></h4>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exame_medico">Exame médico</label>
							<select name="exame_medico" class="form-control">
								<option value="0" <?=($p->exame_medico == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->exame_medico == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="teste_psicotecnico">Teste psicotécnico</label>
							<select name="teste_psicotecnico" class="form-control">
								<option value="0" <?=($p->teste_psicotecnico == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->teste_psicotecnico == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="provas_teoricas">Provas teóricas</label>
							<select name="provas_teoricas" class="form-control">
								<option value="0" <?=($p->provas_teoricas == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->provas_teoricas == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="aulas_praticas">Aulas praticas</label>
							<select name="aulas_praticas" class="form-control">
								<option value="0" <?=($p->aulas_praticas == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->aulas_praticas == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="prova_multipla_escolha">Prova multipla escolha</label>
							<select name="prova_multipla_escolha" class="form-control">
								<option value="0" <?=($p->prova_multipla_escolha == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->prova_multipla_escolha == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exame_pratico">Exame pratico</label>
							<select name="exame_pratico" class="form-control">
								<option value="0" <?=($p->exame_pratico == '0')?'selected':''?>>Em processo</option>
								<option value="1" <?=($p->exame_pratico == '1')?'selected':''?>>Aprovado</option>
							</select>
						</div>
					</div>				
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-primary" type="submit">editar</button>
					</div>
				</div>
			<?php endforeach; ?>
		</form>
	</div>
</div>

</body>
</html>

