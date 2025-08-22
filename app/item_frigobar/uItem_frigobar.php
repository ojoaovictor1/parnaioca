<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $ativo = $_POST['ativo'];
    $id = $_POST['id'];  

    echo $nome;
    echo $preco;
 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_tipo_acomodacao = 
    "UPDATE itens_frigobar SET 
    nome = '$nome',
    ativo = $ativo,
    preco = $preco
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_tipo_acomodacao);
if($resultado_update){
    header('location: index.php');
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>