<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_acomodacoes = 
    "CREATE TABLE IF NOT  EXISTS acomodacoes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    numero VARCHAR(32) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    capacidade INT(50) NOT NULL,
    tipo_id INT(50) NOT NULL,
    FOREIGN KEY (tipo_id) REFERENCES tipo_da_acomodacao(id)
    )";

if(mysqli_query($con, $sql_criar_tabela_acomodacoes)){
    echo 'tabela criada com sucesso';
}else{
    echo 'erro ao criar a tabela' . mysqli_error($con);
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

$nome = $_POST['nome'];
$numero = $_POST['numero'];
$valor = $_POST['valor'];
$capacidade = $_POST['capacidade'];

$sql_cadastrar_acomodacoes = 
    "INSERT INTO acomodacoes 
    (nome, numero, valor, capacidade)
     VALUES ('$nome', '$numero', '$valor', '$capacidade')";

mysqli_query($con, $sql_cadastrar_acomodacoes);
echo 'Dados inseridos com Sucesso!';

}else{
    echo 'Erro ao receber os dados!';
}