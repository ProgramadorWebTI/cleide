<?php

// INCLUIR O ARQUIVO GESTÃO COM AS FUNÇÕES DO SISTEMA
include_once "gestao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Processo - CNH</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php include_once "include.php"; ?>
</head>
<body> <br><br>
	<div class="container">
		<div class="row">
			<div class="panel">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="text-center">CONSULTA PROCESSO DA SUA CNH</h2>
					</div>
					<div class="panel-body">
						<form action="index.php" method="post">
							<div class="col-md-4">
								<div class="form-group">
									<label for="numero_habilitacao">Habilitação:</label>
									<input type="text" name="numero_habilitacao" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="data_nasc">Data de Nascimento</label>
									<input type="date" name="data_nasc" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="data_de_habilitacao">Data da 1º habilitação</label>
									<input type="date" name="data_de_habilitacao" class="form-control">
								</div>
								<div class="form-group pull-right">
										<button class="btn btn-success" type="submit" id="pesquisar">persquisar</button>
								</div>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- INICIAR A MOSTRAR OS CONTEUDOS DA PESQUISA; -->
	
	<?php if(isset($_POST['numero_habilitacao']) && !empty($_POST['numero_habilitacao'])): 

		// CAPITURAR OS CONTEUDOS DO FORMULÁRIO;
		$numero_habilitacao = trim($_POST['numero_habilitacao']);
		$data_nasc = trim($_POST['data_nasc']);
		$data_de_habilitacao = trim($_POST['data_de_habilitacao']);
		$resultado = listarConsulta($numero_habilitacao,$data_nasc,$data_de_habilitacao);


	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Resultado da pesquisa</h1>				
				<?php //print_r($resultado);  ?>
				<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<h3 style="background-color: #87A4AB; width: 100%; padding: 3px; margin-bottom: 0px; ">CONDUTOR</h3>
					<thead>
						<tr>
							<th>Nome:</th>
							<th>Habilitação:</th>
							<th>RG:</th>
							<th>Data Nasc:</th>
							<th>Nascionalidade:</th>
							<th>Naturalidade:</th>
							<th>UF:</th>
							<th>cpf:</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($resultado as $c): ?>
						<tr>
							<td><?php echo $c["nome"]; ?></td>
							<td><?php echo $c["numero_habilitacao"]; ?></td>
							<td><?php echo $c["identidade"]; ?></td>
							<td><?php echo $c["data_nasc"]; ?></td>
							<td><?php echo $c["nacionalidade"]; ?></td>
							<td><?php echo $c["naturalidade"]; ?></td>
							<td><?php echo $c["uf"]; ?></td>
							<td><?php echo $c["cpf"]; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>

				<!-- tabela da cnh -->
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped">
					<h3 style="background-color: #87A4AB; padding: 3px; margin-bottom: 0px; ">CNH</h3>
					<thead>
						<tr>
							<th>Habilitação para Categoria:</th>
							<th>Data de Habilitação:</th>
							<th>Exame de sanidade física válido até:</th>
							<th>Data da solicitação da emissão da CNH:</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($resultado as $c): ?>
						<tr>
							<td><?php echo $c["habilitacao_para_categoria"]; ?></td>
							<td><?php echo $c["data_de_habilitacao"]; ?></td>
							<td><?php echo $c["exame_sanidade"]; ?></td>
							<td><?php echo $c["data_solicitacao_da_emissao"]; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
				<!-- processo -->
				<?php if(isset($resultado[0]['usuario_id']) == null): ?>

				<?php elseif($resultado[0]['usuario_id'] == true): ?>	
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<h3 style="background-color: #87A4AB; padding: 3px; margin-bottom: 0px; ">PROCESSO EM ANDAMENTO</h3>
							<thead>
								<tr>
									<th>Exame médico</th>
									<th>Teste psicotécnico</th>
									<th>Provas teóricas</th>
									<th>Aulas práticas</th>
									<th>Prova de multipla escolha</th>
									<th>Exame prático</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								 $ok = '<span class="label label-success"> APROVADO </span>';
								 $fail = '<span class="label label-warning"> EM ANDAMENTO </span>';

								 ?>
								<?php foreach($resultado as $c): ?>
									<tr>
										<td><?php if($c['exame_medico'] == 0){echo $fail;}else{echo $ok;} ?></td>
										<td><?php if($c['teste_psicotecnico'] == 0){echo $fail;}else{echo $ok;} ?></td>
										<td><?php if($c['provas_teoricas'] == 0){echo $fail;}else{echo $ok;} ?></td>
										<td><?php if($c['aulas_praticas'] == 0){echo $fail;}else{echo $ok;} ?></td>
										<td><?php if($c['prova_multipla_escolha']== 0){echo $fail;}else{echo $ok;} ?></td>
										<td><?php if($c['exame_pratico'] == 0){echo $fail;}else{echo $ok;} ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>


			</div>
		</div>
	</div>
	<?php endif; ?>

</body>
</html>

