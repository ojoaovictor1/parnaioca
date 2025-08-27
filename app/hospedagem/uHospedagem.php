<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $checkin = $_POST['data_checkin'];
    $checkout = $_POST['data_checkout'];
    $cliente = $_POST['clientes'];
    $acomodacao = $_POST['acomodacoes'];
    $ativo = $_POST['status'];
    $id = $_POST['id'];  


 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_tipo_acomodacao = 
    "UPDATE hospedagem SET 
    data_checkin = '$checkin',
    data_checkout = '$checkout',
    cliente = '$cliente',
    acomodacao = '$acomodacao',
    ativo = '$ativo'
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_tipo_acomodacao);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>