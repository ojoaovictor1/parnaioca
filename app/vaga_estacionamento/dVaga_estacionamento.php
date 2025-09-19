<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];
$sql_delete = "UPDATE estacionamento SET situacao = 0 WHERE id = $id";

if(mysqli_query($con,$sql_delete)){
    header("location: index.php");
}else{
    echo "Erro ao deletar este registro" . mysqli_error($con);
}
?>