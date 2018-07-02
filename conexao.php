<?php

function conexao()
{
    try {
// CONEXÃO COM BANCO DE DADOS COM PDO
        $hostname = "localhost";
        $dbname = "bateriasredent02";
        $username = "root";
        $senha = "";

        $pdo = new \PDO ("mysql:host=$hostname;dbname=$dbname", "$username", "$senha");

    } catch (PDOException $e) {
        echo $e->getMessage() . "<br>";
        echo $e->getCode() . "<br>";
        echo $e->getFile() . "<br>";
        echo $e->getLine() . "<br>";
        echo $e->getPrevious() . "<br>";
        exit;
    }
    return $pdo;
}