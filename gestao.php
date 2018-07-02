<?php

// INCLUIR A CONEXAO COM BANCO DE DADOS;
include_once "conexao.php";

function listaUsuarios()
{
	$conn = conexao();
	$stmt = $conn->prepare("SELECT * FROM usuarios");
	$stmt->execute();
	return $linha = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function logar($login, $senha)
{
	$conn = conexao();
	$stmt = $conn->prepare("SELECT * FROM login WHERE usuario_login = :login AND senha_login = :senha");
	$stmt->bindValue(":login", $login);
	$stmt->bindValue(":senha", $senha);
	$stmt->execute();
	return $linha = $stmt->fetch(\PDO::FETCH_ASSOC);
}

function listarUsuarioParaEditar($id)
{
	$conn = conexao();
	$sql = "SELECT * FROM usuarios
	WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":id", $id);
	$stmt->execute();
	return $linha = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function listarConsulta($numero_habilitacao, $data_nasc, $data_de_habilitacao)
{
	$conn = conexao();
	$sql = "SELECT * FROM usuarios
	LEFT JOIN processos
	ON processos.usuario_id = usuarios.id
	WHERE usuarios.numero_habilitacao = :numero_habilitacao
	AND data_nasc = :data_nasc 
	AND data_de_habilitacao = :data_de_habilitacao";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":numero_habilitacao", $numero_habilitacao);
	$stmt->bindValue(":data_nasc", $data_nasc);
	$stmt->bindValue(":data_de_habilitacao", $data_de_habilitacao);
	$stmt->execute();
	return $linha = $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function editarUsuario($nome, $numero_habilitacao, $identidade, $data_nasc, $nacionalidade, $naturalidade, $uf, $exame_sanidade, $habilitacao_para_categoria, $data_solicitacao_da_emissao, $data_de_habilitacao, $obs_cng, $obs_bloqueio, $obs_detran, $cpf, $email, $id)
{
	$conn = conexao();
	$sql = "UPDATE usuarios SET
	nome=:nome,
	numero_habilitacao = :numero_habilitacao,
	identidade = :identidade,
	data_nasc = :data_nasc,
	nacionalidade = :nacionalidade,
	naturalidade = :naturalidade,
	uf = :uf,
	exame_sanidade = :exame_sanidade,
	habilitacao_para_categoria = :habilitacao_para_categoria,
	data_solicitacao_da_emissao = :data_solicitacao_da_emissao,
	data_de_habilitacao = :data_de_habilitacao,
	obs_cng = :obs_cng,
	obs_bloqueio = :obs_bloqueio,
	obs_detran = :obs_detran,
	cpf = :cpf,
	email = :email
	WHERE  id= :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":nome", $nome);
	$stmt->bindValue(":numero_habilitacao", $numero_habilitacao);
	$stmt->bindValue(":identidade", $identidade);
	$stmt->bindValue(":data_nasc", $data_nasc);
	$stmt->bindValue(":nacionalidade", $nacionalidade);
	$stmt->bindValue(":naturalidade", $naturalidade);
	$stmt->bindValue(":uf", $uf);
	$stmt->bindValue(":exame_sanidade", $exame_sanidade);
	$stmt->bindValue(":habilitacao_para_categoria", $habilitacao_para_categoria);
	$stmt->bindValue(":data_solicitacao_da_emissao", $data_solicitacao_da_emissao);
	$stmt->bindValue(":data_de_habilitacao", $data_de_habilitacao);
	$stmt->bindValue(":obs_cng", $obs_cng);
	$stmt->bindValue(":obs_bloqueio", $obs_bloqueio);
	$stmt->bindValue(":obs_detran", $obs_detran);
	$stmt->bindValue(":cpf", $cpf);
	$stmt->bindValue(":email", $email);
	$stmt->bindValue(":id", $id);
	$linha = $stmt->execute();
	if ($linha) {
		return true;
	} else {
		return false;
	}

}


function deletarUsuario($id)
{
	$conn = conexao();
	$sql = "DELETE FROM usuarios WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":id", $id);
	$linha = $stmt->execute();
	if ($linha) {
		return true;
	} else {
		return false;
	}
}

function adicionarUsuario($nome, $numero_habilitacao, $identidade, $data_nasc, $nacionalidade, $naturalidade, $uf, $exame_sanidade, $habilitacao_para_categoria, $data_solicitacao_da_emissao, $data_de_habilitacao, $obs_cng, $obs_bloqueio, $obs_detran, $cpf, $email)
{
	$conn = conexao();
	$sql = "INSERT INTO usuarios
	(nome,numero_habilitacao,identidade,data_nasc,nacionalidade,naturalidade,uf,exame_sanidade,habilitacao_para_categoria,data_solicitacao_da_emissao,data_de_habilitacao,obs_cng,obs_bloqueio,obs_detran,cpf,email)
	VALUES (:nome,:numero_habilitacao,:identidade,:data_nasc,:nacionalidade,:naturalidade,:uf,:exame_sanidade,:habilitacao_para_categoria,:data_solicitacao_da_emissao,:data_de_habilitacao,:obs_cng,:obs_bloqueio,:obs_detran,:cpf,:email)
	";

	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":nome", $nome);
	$stmt->bindValue(":numero_habilitacao", $numero_habilitacao);
	$stmt->bindValue(":identidade", $identidade);
	$stmt->bindValue(":data_nasc", $data_nasc);
	$stmt->bindValue(":nacionalidade", $nacionalidade);
	$stmt->bindValue(":naturalidade", $naturalidade);
	$stmt->bindValue(":uf", $uf);
	$stmt->bindValue(":exame_sanidade", $exame_sanidade);
	$stmt->bindValue(":habilitacao_para_categoria", $habilitacao_para_categoria);
	$stmt->bindValue(":data_solicitacao_da_emissao", $data_solicitacao_da_emissao);
	$stmt->bindValue(":data_de_habilitacao", $data_de_habilitacao);
	$stmt->bindValue(":obs_cng", $obs_cng);
	$stmt->bindValue(":obs_bloqueio", $obs_bloqueio);
	$stmt->bindValue(":obs_detran", $obs_detran);
	$stmt->bindValue(":cpf", $cpf);
	$stmt->bindValue(":email", $email);
	$linha = $stmt->execute();
	if ($linha) {
		return true;
	} else {
		return false;
	}
}

function listar_processos()
{
	$conn = conexao();
	$sql = "SELECT id_processo,nome FROM processos
	JOIN usuarios 
	ON usuarios.id = processos.usuario_id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$linha = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	return $linha;
}

function listarProcessoParaEditar($id)
{
	$conn = conexao();
	$sql = "SELECT
	id,
	nome,
	id_processo,
	usuario_id,
	exame_medico,
	teste_psicotecnico,
	provas_teoricas,
	aulas_praticas,
	prova_multipla_escolha,
	exame_pratico
	FROM processos 
	JOIN usuarios 
	ON usuarios.id = processos.usuario_id
	WHERE id_processo = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":id", $id);
	$stmt->execute();
	$linha = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $linha;
}

function editarProcesso($exame_medico, $teste_psicotecnico, $provas_teoricas, $aulas_praticas, $prova_multipla_escolha, $exame_pratico, $id_processo)
{
	$conn = conexao();
	$sql = "UPDATE processos SET
	exame_medico= :exame_medico,
	teste_psicotecnico= :teste_psicotecnico,
	provas_teoricas= :provas_teoricas,
	aulas_praticas= :aulas_praticas,
	prova_multipla_escolha= :prova_multipla_escolha,
	exame_pratico= :exame_pratico	
	WHERE id_processo= :id_processo
	";

	$stmt = $conn->prepare($sql);
	$stmt->bindValue(":exame_medico", $exame_medico);
	$stmt->bindValue(":teste_psicotecnico", $teste_psicotecnico);
	$stmt->bindValue(":provas_teoricas", $provas_teoricas);
	$stmt->bindValue(":aulas_praticas", $aulas_praticas);
	$stmt->bindValue(":prova_multipla_escolha", $prova_multipla_escolha);
	$stmt->bindValue(":exame_pratico", $exame_pratico);
	$stmt->bindValue(":id_processo", $id_processo);
	$linha = $stmt->execute();
	if ($linha) {
		return true;
	} else {
		return false;
	}

}

function listarUsuarioParaAdicionarProcesso()
{
	$conn = conexao();
	$sql = "SELECT id,nome FROM usuarios";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$linha = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $linha;

}

function cadastrarNovoProcesso($usuario_id, $exame_medico, $teste_psicotecnico, $provas_teoricas, $aulas_praticas, $prova_multipla_escolha, $exame_pratico)
{
	try {
		$conn = conexao();
		$sql = "INSERT INTO processos (usuario_id, exame_medico, teste_psicotecnico, provas_teoricas, aulas_praticas, prova_multipla_escolha, exame_pratico) VALUES (:usuario_id, :exame_medico, :teste_psicotecnico, :provas_teoricas, :aulas_praticas, :prova_multipla_escolha, :exame_pratico)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(":usuario_id ", $usuario_id, PDO::PARAM_INT);
		$stmt->bindValue(":exame_medico", $exame_medico);
		$stmt->bindValue(":teste_psicotecnico", $teste_psicotecnico);
		$stmt->bindValue(":provas_teoricas", $provas_teoricas);
		$stmt->bindValue(":aulas_praticas", $aulas_praticas);
		$stmt->bindValue(":prova_multipla_escolha", $prova_multipla_escolha);
		$stmt->bindValue(":exame_pratico", $exame_pratico);
		$linha = $stmt->execute();
		print_r($linha);

		if ($linha) {
			return true;
		} else {
			return false;
		}
	} catch (PDOException $e) {
		echo $e->getMessage() . "<br>";
		echo $e->getCode() . "<br>";
		echo $e->getFile() . "<br>";
		echo $e->getLine() . "<br>";
		echo $e->getPrevious() . "<br>";
	}

}