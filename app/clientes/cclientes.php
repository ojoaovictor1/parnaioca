<?php
session_start();

include '../config/conexao.php';


$sql_criar_tabela_clientes = 
    "CREATE TABLE IF NOT EXISTS clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    data_nasc DATE,
    cpf VARCHAR(14) NOT NULL,
    email VARCHAR(32) NOT NULL,
    telefone VARCHAR(32) NOT NULL,
    estado VARCHAR(32) NOT NULL,
    cidade VARCHAR(32) NOT NULL
    )";

mysqli_query($con, $sql_criar_tabela_clientes);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['nome'])){
        $_SESSION['erro'] = "O campo nome é obrigatório";
        header('Location: index.php');
        exit;
    }

    if(strlen($_POST['nome']) < 2){
        $_SESSION['erro'] = "O campo nome deve ter no mínimo 3 caracteres.";
        header('Location: index.php');
        exit; 
        }

    if(empty($_POST['email'])){
        $_SESSION['erro'] = "O campo email é obrigatório";
        header('Location: index.php');
        exit; 
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erro'] = "Formato de email inválido";
        header('Location: index.php');
        exit;
    }
    if(empty($_POST['cpf'])){
        $_SESSION['erro'] = "O campo cpf é obrigatório";
        header('Location: index.php');
        exit; 
    }
    if(empty($_POST['telefone'])){
        $_SESSION['erro'] = "O campo telefone é obrigatório";
        header('Location: index.php');
        exit; 
    }
    if(strlen($_POST['cpf']) < 14){
        $_SESSION['erro'] = "Digite corretamente o seu CPF";
        echo strlen($_POST['cpf']);
        header('Location: index.php');
        exit;
    }
    if(empty($_POST['estado'])){
        $_SESSION['erro'] = "O campo estado é obrigatório";
        header('Location: index.php');
        exit; 
    }
    if(empty($_POST['cidade'])){
        $_SESSION['erro'] = "O campo cidade é obrigatório";
        header('Location: index.php');
        exit; 
    }
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        

        $sql_cadastrar_clientes = 
            "INSERT INTO clientes 
            (nome, data_nasc, cpf, email, telefone, estado, cidade)
            VALUES ('$nome', '$data_nasc', '$cpf', '$email', '$telefone', '$estado', '$cidade')";

        $sql_verifica_cpf = "SELECT * FROM clientes WHERE cpf = '$cpf'";
        
        $resultado_cpf = mysqli_query($con,$sql_verifica_cpf);

        if($row = mysqli_num_rows($resultado_cpf) > 0){
            echo 'Erro: CPF já cadastrado!';
            
        }else{
            mysqli_query($con, $sql_cadastrar_clientes);
            header('location: index.php');
        }
        /*         NA VERSÃO 8.4 do PHP o mysqli lança uma exception em alguns problemas
        try{
            mysqli_query($con, $sql_cadastrar_clientes);
            echo $cpf;
            echo 'Dados inseridos com Sucesso!';
        // header('location: index.php');
        }catch(Exception $e){

            if($e->getCode() == 1062){
                echo 'Erro: CPF já cadastrado!';
            }
            
        }*/
    

}else{
    echo 'Erro ao receber os dados!' . mysqli_error($con);
}
?>