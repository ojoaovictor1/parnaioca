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

    $id = $_POST['id'];  
 
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

$sql_verifica_cpf = "SELECT * FROM clientes WHERE cpf = '$cpf'";
$resultado_cpf = mysqli_query($con,$sql_verifica_cpf);

if($row = mysqli_num_rows($resultado_cpf) > 0){
    echo 'Erro: CPF já cadastrado!';
} else {

    $resultado_update = mysqli_query($con,$sql_update_clientes);
    if($resultado_update){
        header('location: index.php');
    }else{
        echo 'deu erro:' . mysqli_error($con);
    }
}
?>