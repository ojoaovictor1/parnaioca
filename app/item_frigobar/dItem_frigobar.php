<?php
session_start();

include '../config/conexao.php';
$id = $_GET['id'];

$sql = "DELETE FROM itens_frigobar WHERE id = $id";
if(mysqli_query($con, $sql)){
    echo "Deletado com sucesso";
    header('location: index.php');
    
}else{
    echo 'Erro ao deletar!' . mysqli_error($con);
}
?>