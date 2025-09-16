<?php
session_start();
include '../config/conexao.php';

$sql_criar_tabela_checkout = 
    "CREATE TABLE IF NOT EXISTS checkout (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hospedagem_id INT,
    cliente VARCHAR(32),
    acomodacao VARCHAR(32),
    data_checkout DATE,
    hora_checkout TIME,
    consumo_frigobar DECIMAL(10,2),
    FOREIGN KEY (hospedagem_id) REFERENCES hospedagem(id)
    )";
    mysqli_query($con, $sql_criar_tabela_checkout);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $hospedagem_id = $_POST['hospedagem_id'];
        $cliente = $_POST['cliente_nome'];
        $acomodacao = $_POST['acomodacao_nome'];
        $data_checkout = $_POST['data_checkout']
        $hora_checkout = $_POST['hora_checkout'];
        $consumo_frigobar = $_POST['valor'];
?>