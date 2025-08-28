<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $valor = $_POST['valor'];
    $capacidade = $_POST['capacidade'];
    $tipo = $_POST['tipo'];
    $id = $_POST['id'];  
    $situacao = $_POST['situacao'];
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_Acomodacoes = 
    "UPDATE acomodacoes SET 
    nome = '$nome',
    numero = '$numero',
    valor = '$valor',
    capacidade = '$capacidade',
    tipo = '$tipo',
    situacao = '$situacao'
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_Acomodacoes);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>