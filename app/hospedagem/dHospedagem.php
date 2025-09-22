<?php
session_start();
include '../config/conexao.php';



if($_SESSION['poderes'] === 'admin'){
    $id = $_GET['id'];
    $sql = "UPDATE hospedagem SET ativo = 'Inativo' WHERE id = $id";

    if(mysqli_query($con,$sql)){
        header('location: index.php');
    }else{
        echo "Erro ao deletar" . mysqli_error($con);
    }
}else{
    die("Acesso negado! Apenas administradores podem executar esta ação.");
}
?>