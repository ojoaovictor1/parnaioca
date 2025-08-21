<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];


$sql_delete_Tipo_acomodacao = "DELETE FROM tipo_da_acomodacao WHERE id = $id";

if(mysqli_query($con,$sql_delete_Tipo_acomodacao)){
    header('location: index.php');
}else{
    echo 'Erro ao deletar' . mysqli_error($con);
}
?>