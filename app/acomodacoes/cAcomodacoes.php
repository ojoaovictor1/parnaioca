<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_acomodacoes = 
    "CREATE TABLE IF NOT  EXISTS acomodacoes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    numero VARCHAR(32) NOT NULL,
    valor INT(254) NOT NULL,
    capacidade INT(50) NOT NULL,
    tipo INT NOT NULL,
    FOREIGN KEY (tipo) REFERENCES tipo_da_acomodacao(id)
    )";

mysqli_query($con, $sql_criar_tabela_acomodacoes);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$nome = $_POST['nome'];
$numero = $_POST['numero'];
$valor = $_POST['valor'];
$capacidade = $_POST['capacidade'];
$tipo = $_POST['tipo'];

$sql_cadastrar_acomodacoes = 
    "INSERT INTO acomodacoes 
    (nome, numero, valor, capacidade, tipo)
     VALUES ('$nome', '$numero', '$valor', '$capacidade', '$tipo')";

mysqli_query($con, $sql_cadastrar_acomodacoes);
header('location: index.php');

}else{
    echo 'Erro ao receber os dados!';
}