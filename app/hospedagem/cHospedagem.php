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
    

    /* há sobreposição? */
    $sql_existe_sobreposicao = 
    "SELECT * FROM hospedagem WHERE acomodacao = '$acomodacao' 
     AND (data_checkin < '$data_checkout' AND data_checkout > '$data_checkin')";
    $resultado_sobreposicao = mysqli_query($con, $sql_existe_sobreposicao);

    if (mysqli_num_rows($resultado_sobreposicao) > 0) {
        echo 'Erro: Acomodação já está reservada para as datas selecionadas!';
    } else {

    $sql_cadastrar_hospedagem = 
    "INSERT INTO hospedagem (data_checkin,
                 data_checkout, cliente,
                 acomodacao) 
                 VALUES 
                 ('$data_checkin', '$data_checkout', '$cliente', '$acomodacao')";
    if(mysqli_query($con, $sql_cadastrar_hospedagem)){
        header('location: index.php');
    }
    
    }
}
?>