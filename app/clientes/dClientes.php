<?php
session_start();
include '../config/conexao.php';

if($_SESSION['poderes'] !== 'admin'){
    die("Acesso negado! Apenas administradores podem executar esta ação.");
}

$id = $_GET['id'];

$sql_delete_cliente = "DELETE FROM clientes WHERE id = $id";

if(mysqli_query($con,$sql_delete_cliente)){
    echo 'Deletado com Sucesso';
    header('location: index.php');
}else{
    echo 'Erro ao deletar';
}
?>