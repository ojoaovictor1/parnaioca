<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_acomodacoes = 
    "CREATE TABLE IF NOT  EXISTS acomodacoes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(32) NOT NULL,
    numero VARCHAR(32) NOT NULL,
    valor INT(254) NOT NULL,
    capacidade INT(50) NOT NULL,
    tipo INT NOT NULL,
    tipo_nome VARCHAR(32) NOT NULL,
    situacao VARCHAR(32) DEFAULT 'Ativo',
    FOREIGN KEY (tipo) REFERENCES tipo_da_acomodacao(id)
    )";

mysqli_query($con, $sql_criar_tabela_acomodacoes);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['nome'])){
        $_SESSION['erroa'] = "O campo nome é obrigatório";
        header('Location: index.php');
        exit;
    }

    if(empty($_POST['numero'])){
        $_SESSION['erroa'] = "O campo numero é obrigatório";
        header('Location: index.php');
        exit;
    }

    if(empty($_POST['valor'])){
        $_SESSION['erroa'] = "O campo valor é obrigatório";
        header('Location: index.php');
        exit;
    }

    if(empty($_POST['capacidade'])){
        $_SESSION['erroa'] = "O campo capacidade é obrigatório";
        header('Location: index.php');
        exit;
    }

    if(empty($_POST['tipo'])){
        $_SESSION['erroa'] = "O campo nome é obrigatório";
        header('Location: index.php');
        exit;
    }


$nome = $_POST['nome'];
$numero = $_POST['numero'];
$valor = $_POST['valor'];
$capacidade = $_POST['capacidade'];
$tipo = $_POST['tipo'];

$valor = $_POST['valor'];
$valor = str_replace('.', '', $valor);       // Remove pontos de milhar
$valor = str_replace(',', '.', $valor);      // Converte decimal vírgula para ponto
$valor = floatval($valor); 

$sql_tipo_nome = "SELECT * FROM tipo_da_acomodacao WHERE id = $tipo";
$resultado_tipo_nome = mysqli_query($con,$sql_tipo_nome);
$tipo_nome = mysqli_fetch_array($resultado_tipo_nome)['tipo'];

$sql_cadastrar_acomodacoes = 
    "INSERT INTO acomodacoes 
    (nome, numero, valor, capacidade, tipo, tipo_nome)
     VALUES ('$nome', '$numero', '$valor', '$capacidade', '$tipo', '$tipo_nome')";

mysqli_query($con, $sql_cadastrar_acomodacoes);
header('location: index.php');

}else{
    echo 'Erro ao receber os dados!';
}