<?php
session_start();
include '../config/conexao.php';

if($_SESSION['poderes'] !== 'admin'){
    die("Acesso negado! Apenas administradores podem executar esta ação.");
}

$id = $_GET['id'];

//$sql_delete_acomodacao = "DELETE FROM acomodacoes WHERE id = $id";
$sql_delete_acomodacao = "UPDATE acomodacoes SET situacao = 'Inativo' WHERE id = $id";

if(mysqli_query($con, $sql_delete_acomodacao)){
    echo 'Deletado com sucesso';
    header('location: index.php');
}else{
    echo 'Erro ao deletar';
}
?>