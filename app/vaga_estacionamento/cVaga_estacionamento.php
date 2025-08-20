<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_estacionamento = 
    "CREATE TABLE IF NOT EXISTS estacionamento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    ativo BOOLEAN,
    acomodacao_id INT,
    FOREIGN KEY (acomodacao_id) REFERENCES acomodacoes(id)
    )";

if(mysqli_query($con, $sql_criar_tabela_estacionamento)){
    echo 'table criada com sucesso';
}else{
    echo 'erro ao criar a tabela' . mysqli_error($con);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$numero = $_POST['numero'];
$ativo = $_POST['ativo'] === 'true' ? 1 : 0;

$sql_cadastrar_vaga_estacionamento = 
    "INSERT INTO estacionamento 
    (numero, ativo)
     VALUES ('$numero', '$ativo')";

mysqli_query($con, $sql_cadastrar_vaga_estacionamento);
echo 'Dados inseridos com Sucesso!';
header('location: index.php');

}else{
    echo 'Erro ao receber os dados!';
}
?>