<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['nome'])){
        $_SESSION['erro'] = "O campo nome é obrigatório";
        header('Location: form_editar.php');
        exit;
    }

    if(strlen($_POST['nome']) < 2){
        $_SESSION['erro'] = "O campo nome deve ter no mínimo 3 caracteres.";
        header('Location: form_editar.php');
        exit; 
        }

    if(empty($_POST['email'])){
        $_SESSION['erro'] = "O campo email é obrigatório";
        header('Location: form_editar.php');
        exit; 
    }
    if(empty($_POST['cpf'])){
        $_SESSION['erro'] = "O campo cpf é obrigatório";
        header('Location: form_editar.php');
        exit; 
    }

    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $situacao = $_POST['situacao'];
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
    cidade = '$cidade',
    situacao = '$situacao'
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