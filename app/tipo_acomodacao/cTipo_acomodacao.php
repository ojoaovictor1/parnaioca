<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_tipo_acomodacao = 
    "CREATE TABLE IF NOT EXISTS tipo_da_acomodacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(32)
    )";

mysqli_query($con, $sql_criar_tabela_tipo_acomodacao);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['tipo_da_acomodacao'])){
        $_SESSION['errot'] = "O campo Tipo Acomodação é obrigatório";
        header('Location: index.php');
        exit;
    }
$tipo = $_POST['tipo_da_acomodacao'];


$sql_verifica_tipo = "SELECT COUNT(*) FROM tipo_da_acomodacao WHERE tipo = '$tipo'";
$resultado_verifica_tipo = mysqli_query($con, $sql_verifica_tipo);

if(mysqli_num_rows($resultado_verifica_tipo) > 0){
    $_SESSION['errot'] = "Já existe um Tipo de Acomodação com este nome" . $tipo;
    echo mysqli_num_rows($resultado_verifica_tipo);
    header('Location: index.php');
    exit;
}

$sql_cadastrar_tipo_da_acomodacao = 
    "INSERT INTO tipo_da_acomodacao 
    (tipo)
     VALUES ('$tipo')";

mysqli_query($con, $sql_cadastrar_tipo_da_acomodacao);
echo 'Dados inseridos com Sucesso!';
header('location: index.php');
}else{
    echo 'Erro ao receber os dados!';
}
?>