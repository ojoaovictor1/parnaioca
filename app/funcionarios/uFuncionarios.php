<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $poderes = $_POST['poderes'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];  

    $id = $_POST['id'];
    echo $id;
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_funcionarios = 
    "UPDATE funcionarios SET 
    nome = $nome,
    cargo = $cargo,
    poderes = $poderes,
    login = $login,
    senha = $senha
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_funcionarios);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>