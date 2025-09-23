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
        $data_checkout = $_POST['data_checkout'];
        $hora_checkout = $_POST['hora_checkout'];
        $consumo_frigobar = $_POST['valor'];

        $sql_insert_checkout = "INSERT INTO checkout 
                                (hospedagem_id, 
                                cliente,
                                acomodacao,
                                data_checkout,
                                hora_checkout,
                                consumo_frigobar) 
                                VALUES
                                ($hospedagem_id,
                                '$cliente',
                                '$acomodacao',
                                '$data_checkout',
                                '$hora_checkout',
                                $consumo_frigobar)";
        mysqli_query($con, $sql_insert_checkout);

        $sql_update_hospedagem = "UPDATE hospedagem 
                                  SET ativo = 'Finalizado' 
                                  WHERE id = $hospedagem_id";
        mysqli_query($con, $sql_update_hospedagem);

        fopen('../log.txt', 'a') or die('Não foi possível abrir o arquivo de logs');
        $data_hora = date('d/m/Y H:i:s');
        $log = "[$data_hora] - CHECK-OUT REALIZADO POR {$_SESSION['login']}: $cliente - $acomodacao - R$ $consumo_frigobar\n";
        file_put_contents('../log.txt', $log, FILE_APPEND);
    }
?>