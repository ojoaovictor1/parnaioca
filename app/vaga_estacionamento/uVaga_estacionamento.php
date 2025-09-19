<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $numero = $_POST['numero'];
    $ativo = $_POST['ativo'];
    $id = $_POST['id'];
    $situacao = $_POST['situacao'];  
 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}
$sql_recupera_id_acomodacao = "SELECT * FROM acomodacoes WHERE nome = '$ativo'";
$resultado_id_acomodacao = mysqli_query($con,$sql_recupera_id_acomodacao);
$acomodacao_id = mysqli_fetch_array($resultado_id_acomodacao)['id'];

$sql_update_tipo_acomodacao = 
    "UPDATE estacionamento SET 
    numero = $numero,
    ativo = '$ativo',
    acomodacao_id = $acomodacao_id,
    situacao = $situacao
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_tipo_acomodacao);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>