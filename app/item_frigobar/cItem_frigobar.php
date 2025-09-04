<?php
session_start();

include '../config/conexao.php';

$sql_cadastrar_item = "CREATE TABLE IF NOT EXISTS itens_frigobar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    ativo VARCHAR(32) DEFAULT 'Ativo'
)";
mysqli_query($con, $sql_cadastrar_item);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(empty($_POST['nome'])){
        $_SESSION['erroItem'] = "O campo nome é obrigatório";
        header('Location: index.php');
        exit;
    }
    if(empty($_POST['preco'])){
        $_SESSION['erroItem'] = "O campo preco é obrigatório";
        header('Location: index.php');
        exit;
    }
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    

    $sql_cadastrar_item = "INSERT INTO itens_frigobar (nome, preco) VALUES ('$nome', '$preco')";
    mysqli_query($con, $sql_cadastrar_item);
    header('location: index.php');
} else {
    echo 'Erro ao receber os dados!';
}
?>