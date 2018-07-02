<?php

// INICIAR A SESSÃO PARA QUE POSSAMOS FAZE AS RESTRIÇÕES;
session_start();

// INCLUIR O ARQUIVO GESTÃO COM AS FUNÇÕES DO SISTEMA;
include_once "gestao.php";

// NA LINHA 9, FAZ A VERIFICAÇÃO SE O USUÁRIO ESTÁ LOGADO;
if (isset($_SESSION['autenticado']) == FALSE) {
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
    <h1 class="page-header">Adicionar novo processo</h1>

    <form action="acoes/inserir_processo.php" method="post">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="">Usuário</label>
                    <select name="usuario_id" class="form-control user">
                        <option value="">Selecione um usuário</option>
                        <?php foreach (listarUsuarioParaAdicionarProcesso() as $p): ?>
                            <option value="<?php echo $p->id; ?> "> <?php echo $p->nome; ?> </option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exame_medico">Exame médico</label>
                    <select name="exame_medico" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="teste_psicotecnico">Teste psicotécnico</label>
                    <select name="teste_psicotecnico" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="provas_teoricas">Provas teóricas</label>
                    <select name="provas_teoricas" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="aulas_praticas">Aulas praticas</label>
                    <select name="aulas_praticas" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prova_multipla_escolha">Prova multipla escolha</label>
                    <select name="prova_multipla_escolha" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exame_pratico">Exame pratico</label>
                    <select name="exame_pratico" class="form-control">
                        <option value="0">Em processo</option>
                        <option value="1">Aprovado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">editar</button>
            </div>
        </div>
    </form>
</div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $(".users").select2({});
    });
</script>
</body>
</html>

