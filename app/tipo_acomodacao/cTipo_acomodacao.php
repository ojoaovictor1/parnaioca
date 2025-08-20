<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_tipo_acomodacao = 
    "CREATE TABLE IF NOT EXISTS tipo_da_acomodacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(32)
    )";

mysqli_query($con, $sql_criar_tabela_tipo_acomodacao);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$tipo = $_POST['tipo_da_acomodacao'];

$sql_cadastrar_tipo_da_acomodacao = 
    "INSERT INTO tipo_da_acomodacao 
    (tipo)
     VALUES ('$tipo')";

mysqli_query($con, $sql_cadastrar_tipo_da_acomodacao);
echo 'Dados inseridos com Sucesso!';
header('location: index.php');
}else{
    echo 'Erro ao receber os dados!';
}
?>