<?php
session_start();

include '../config/conexao.php';

if($_SESSION['poderes'] !== 'admin'){
    die("Acesso negado! Apenas administradores podem executar esta ação.");
}
$id = $_GET['id'];

$sql = "DELETE FROM itens_frigobar WHERE id = $id";
if(mysqli_query($con, $sql)){
    echo "Deletado com sucesso";
    header('location: index.php');
    
}else{
    echo 'Erro ao deletar!' . mysqli_error($con);
}
?>