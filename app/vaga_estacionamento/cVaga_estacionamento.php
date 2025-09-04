<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_estacionamento = 
    "CREATE TABLE IF NOT EXISTS estacionamento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    ativo VARCHAR(32),
    acomodacao_id INT,
    FOREIGN KEY (acomodacao_id) REFERENCES acomodacoes(id)
    )";

if(mysqli_query($con, $sql_criar_tabela_estacionamento)){
    echo 'table criada com sucesso';
}else{
    echo 'erro ao criar a tabela' . mysqli_error($con);
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){


    if(empty($_POST['numero'])){
        $_SESSION['erroItem'] = "O campo numero é obrigatório";
        header('Location: index.php');
        exit;
    }
    if(empty($_POST['ativo'])){
        $_SESSION['erroItem'] = "O campo ativo é obrigatório";
        header('Location: index.php');
        exit;
    }

    $numero = $_POST['numero'];
    $ativo = $_POST['ativo'];

    $sql_recupera_id = "SELECT id FROM acomodacoes WHERE nome = '" . $ativo . "'";
    $resultado_id = mysqli_query($con, $sql_recupera_id);
    $acomodacao_id = mysqli_fetch_array($resultado_id)['id'];

    $sql_cadastrar_vaga_estacionamento = 
        "INSERT INTO estacionamento 
        (numero, ativo, acomodacao_id)
        VALUES ('$numero', '$ativo', '$acomodacao_id')";

    mysqli_query($con, $sql_cadastrar_vaga_estacionamento);
    echo 'Dados inseridos com Sucesso!';
    header('location: index.php');

}else{
    echo 'Erro ao receber os dados!';
}
?>