<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_frigobar = 
    "CREATE TABLE IF NOT EXISTS frigobar (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero VARCHAR(32),
    acomodacao_nome VARCHAR(32),
    acomodacao_id INT,
    FOREIGN KEY (acomodacao_id) REFERENCES acomodacoes(id)
    )";
$acomodacao_id = $_POST['acomodacoes'];
$numero = $_POST['numero']; 



if(mysqli_query($con, $sql_criar_tabela_frigobar)){
    echo "Table acriada com sucesso";
}else{
    echo "Erro ao criar tabela" .mysqli_error($con);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['numero'])){
        $_SESSION['erroItem'] = "O campo numero é obrigatório";
        header('Location: index.php');
        exit;
    }
    if(empty($_POST['acomodacoes'])){
        $_SESSION['erroItem'] = "O campo acomodacoes é obrigatório";
        header('Location: index.php');
        exit;
    }
    $sql_cadastrar_frigobar = 
        "INSERT INTO frigobar 
        (acomodacao_id, numero)
        VALUES ($acomodacao_id, '$numero')";

    mysqli_query($con, $sql_cadastrar_frigobar);
    header('location: index.php');

}else{
    echo 'Erro ao receber os dados!' . mysqli_error($con);
}
?>