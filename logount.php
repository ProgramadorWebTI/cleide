<?php
// INICIA A SESSAO;
session_start();

// DESTROI A SESSAO;
unset($_SESSION['autenticado']);
session_destroy();

// REDIRECIONA PARA A PAGINA DE LOGIN NOVAMENTE;
header("location:login.php");
