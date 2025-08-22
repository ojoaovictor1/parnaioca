<?php
session_start();

include '../config/conexao.php';

$sql_criar_hospedagem = "CREATE TABLE IF NOT EXISTS hospedagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_checkin DATE,
    data_checkout DATE,
    cliente VARCHAR(220),
    cliente_id INT,
    acomodacao VARCHAR(220),
    acomodacao_id INT,
    ativo VARCHAR(10),
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (acomodacao_id) REFERENCES acomodacoes(id)
)";
mysqli_query($con, $sql_criar_hospedagem);
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_checkin = $_POST['data_checkin'];
    $data_checkout = $_POST['data_checkout'];
    $cliente = $_POST['cliente'];
    $acomodacao = $_POST['acomodacao'];
    $ativo = $_POST['status'];

    echo $acomodacao;
    $sql_cadastrar_hospedagem = 
    "INSERT INTO hospedagem (data_checkin,
                 data_checkout, cliente,
                 acomodacao, ativo) 
                 VALUES 
                 ('$data_checkin', '$data_checkout', '$cliente', '$acomodacao', '$ativo')";
    if(mysqli_query($con, $sql_cadastrar_hospedagem)){
        echo 'dados inseridos';
    }
    
}else{
    echo 'Erro ao receber os dados!' . mysqli_error($con);
}
?>