<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'parnaioca';


$sql_base_de_dados = "CREATE DATABASE IF NOT EXISTS parnaioca";

$con = mysqli_connect($host, $user, $password, $db);

mysqli_query($con, $sql_base_de_dados);

$sql_tabela_funcionarios = 
    "CREATE TABLE IF NOT EXISTS funcionarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    cargo VARCHAR(50),
    poderes VARCHAR(10),
    login VARCHAR(20),
    senha VARCHAR(20)
)";
    
mysqli_query($con, $sql_tabela_funcionarios)
    
    
    
    
?>