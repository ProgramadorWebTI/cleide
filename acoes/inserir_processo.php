<?php
session_start();
include_once "./../gestao.php";

echo "<pre>";
	var_dump($_POST);
echo "</pre>";



$usuario_id = trim($_POST['usuario_id']);
$exame_medico = trim($_POST['exame_medico']);
$teste_psicotecnico = trim($_POST['teste_psicotecnico']);
$provas_teoricas = trim($_POST['provas_teoricas']);
$aulas_praticas = trim($_POST['aulas_praticas']);
$prova_multipla_escolha = trim($_POST['prova_multipla_escolha']);
$exame_pratico = trim($_POST['exame_pratico']);

$resultado = cadastrarNovoProcesso($usuario_id, $exame_medico, $teste_psicotecnico, $provas_teoricas, $aulas_praticas, $prova_multipla_escolha, $exame_pratico);


// if($resultado == true)
// {
// 	$_SESSION['mensagem'] = '<span class="text text-success text-center">Processo adicionado com sucesso!</span>';
// 	header("location:./../processo.php");
// }
// else
// {
// 	$_SESSION['mensagem'] = '<span class="text text-danger text-center">Error, não foi possivel adicionar processo!</span>';
// 	header("location:./../processo.php");
// }