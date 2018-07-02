<?php
// FUNÇÃO PARA PEGAR A URL BASE DO SITE/SISTEMA;
function base_url($p=null)
{
	$base_url = $_SERVER['REQUEST_SCHEME']."://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME'])."".$p;
    return $base_url;
}
