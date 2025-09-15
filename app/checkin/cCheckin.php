<?php
session_start();
include '../config/conexao.php';

$sql_criar_tabela_checkin = 
    "CREATE TABLE IF NOT EXISTS checkin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hospedagem_id INT,
    cliente VARCHAR(32),
    acomodacao VARCHAR(32),
    data_checkin DATE,
    hora_checkin TIME,
    valor DECIMAL(10,2),
    FOREIGN KEY (hospedagem_id) REFERENCES hospedagem(id)
    )";
$resultato = mysqli_query($con, $sql_criar_tabela_checkin);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $hospedagem_id = $_POST['hospedagem_id'];
    $cliente = $_POST['cliente_nome'];
    $acomodacao = $_POST['acomodacao_nome'];
    $data_checkin = date('Y-m-d');
    $hora_checkin = $_POST['hora_checkin'];
    $valor = $_POST['valor'];

    
    if(empty($hora_checkin)){
        $_SESSION['erroItem'] = "O campo hora de check-in é obrigatório";
        header('Location: index.php');
        exit;
    }
    if(empty($valor)){
        $_SESSION['erroItem'] = "O campo valor é obrigatório";
        header('Location: index.php');
        exit;
    }

    $sql_cadastrar_checkin = 
        "INSERT INTO checkin 
        (hospedagem_id, cliente, acomodacao, data_checkin, hora_checkin, valor)
        VALUES ($hospedagem_id, '$cliente', '$acomodacao', '$data_checkin', '$hora_checkin', $valor)";

    mysqli_query($con, $sql_cadastrar_checkin);

    $sql_atualizar_hospedagem = 
        "UPDATE hospedagem 
        SET ativo = 'Ativo' 
        WHERE id = $hospedagem_id";

    mysqli_query($con, $sql_atualizar_hospedagem);

    header('location: ../hospedagem/index.php');
}else{
    echo "Método inválido";
}
?>