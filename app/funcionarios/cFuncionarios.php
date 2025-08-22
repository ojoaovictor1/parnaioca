<?php
include '../config/conexao.php';
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$poderes = $_POST['poderes'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql_cadastro_funcionarios = "INSERT INTO funcionarios (nome, cargo, poderes, login, senha) VALUES ('$nome', '$cargo', '$poderes', '$login', '$senha')";

if(mysqli_query($con, $sql_cadastro_funcionarios)){
    echo 'Funcionário Cadastrado com sucesso!';
    header('location: ../login.php');
}else{
    echo 'Erro ao cadastrar funcionário';
}
?>