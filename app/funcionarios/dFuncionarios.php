<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_delete = "DELETE FROM funcionarios WHERE id = $id";

if(mysqli_query($con,$sql_delete)){
    header('location: cadastro_funcionarios.php');
}else{
    echo "Erro ao deletar" . mysqli_error($con);
}

?>