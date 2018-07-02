<?php
include_once "./../gestao.php";

if(isset($_POST['nome']))
{		
	$obs_cng = trim($_POST['obs_cng']);
	$obs_bloqueio = trim($_POST['obs_bloqueio']);
	$obs_detran = trim($_POST['obs_detran']);
	$nome = trim($_POST['nome']);
	$numero_habilitacao = trim($_POST['numero_habilitacao']);
	$identidade = trim($_POST['identidade']);
	$cpf = trim($_POST['cpf']);
	$data_nasc = trim($_POST['data_nasc']);
	$nacionalidade = trim($_POST['nacionalidade']);
	$naturalidade = trim($_POST['naturalidade']);
	$uf = trim($_POST['uf']);
	$exame_sanidade = trim($_POST['exame_sanidade']);
	$habilitacao_para_categoria = trim($_POST['habilitacao_para_categoria']);
	$data_solicitacao_da_emissao = trim($_POST['data_solicitacao_da_emissao']);
	$data_de_habilitacao = trim($_POST['data_de_habilitacao']);
	$email = trim($_POST['email']);

	$resultado = adicionarUsuario($nome,$numero_habilitacao,$identidade,$data_nasc,$nacionalidade,$naturalidade,$uf,$exame_sanidade,$habilitacao_para_categoria,$data_solicitacao_da_emissao,$data_de_habilitacao,$obs_cng,$obs_bloqueio,$obs_detran,$cpf,$email);

	if($resultado == true)
	{
		$_SESSION['mensagem'] = '<span class="text text-success text-center">Usuário adicionado com sucesso!</span>';
		header("location:./../admin.php");
	}
	else
	{
		$_SESSION['mensagem'] = '<span class="text text-danger text-center">Error, não foi possivel adicionar usuário!</span>';
		header("location:./../admin.php");
	}
}