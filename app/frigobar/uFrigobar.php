<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $acomodacao_id = $_POST['acomodacoes'];
    $id = $_POST['id'];
    $numero = $_POST['numero'];  
 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_clientes = 
    "UPDATE frigobar SET 
    acomodacao_id = $acomodacao_id,
    numero = '$numero'
    WHERE id = $id";

if(mysqli_query($con, $sql_update_clientes)){
    header('location: index.php');
}else{
    echo 'Erro ao atualizar frigobar' . mysqli_error($con);
}

?>