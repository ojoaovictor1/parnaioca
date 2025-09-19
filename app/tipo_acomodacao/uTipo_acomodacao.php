<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $tipo = $_POST['tipo'];
    $id = $_POST['id'];
    $situacao = $_POST['situacao'];  
 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_tipo_acomodacao = 
    "UPDATE tipo_da_acomodacao SET 
    tipo = '$tipo',
    situacao = $situacao
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_tipo_acomodacao);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>