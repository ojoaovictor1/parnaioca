<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];
$sql_delete = "DELETE FROM estacionamento WHERE id = $id";

if(mysqli_query($con,$sql_delete)){
    header("location: index.php");
}else{
    echo "Erro ao deletar este registro" . mysqli_error($con);
}
?>