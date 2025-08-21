<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_delete_acomodacao = "DELETE FROM acomodacoes WHERE id = $id";

if(mysqli_query($con, $sql_delete_acomodacao)){
    echo 'Deletado com sucesso';
    header('location: index.php');
}else{
    echo 'Erro ao deletar';
}
?>