<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    $recupera_id = "SELECT * FROM clientes WHERE cpf = $cpf";
    $resultado = mysqli_query($con, $recupera_id);
    $row = mysqli_fetch_array($resultado);
    $id = $row['id'];
    header('location: index.php');
 
}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}

$sql_update_clientes = 
    "UPDATE clientes SET 
    nome = '$nome',
    data_nasc = '$data_nasc',
    cpf = '$cpf',
    email = '$email',
    telefone = '$telefone',
    estado = '$estado',
    cidade = '$cidade' 
    WHERE id = $id";

$resultado_update = mysqli_query($con,$sql_update_clientes);
if($resultado_update){
    echo 'deu tudo certo';
}else{
    echo 'deu erro:' . mysqli_error($con);
}
?>