<?php
session_start();
include 'config/conexao.php';

$login = $_POST['login'];
$senha = $_POST['password'];

$sql_query_login = "SELECT * FROM funcionarios WHERE login ='$login' AND senha = '$senha'";

$resultado = mysqli_query($con, $sql_query_login);

if(mysqli_num_rows($resultado) >= 1){
    $row = mysqli_fetch_array($resultado);

    $_SESSION['login'] = $row['login'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['cargo'] = $row['cargo'];
    $_SESSION['poderes'] = $row['poderes'];
    header('location: inicio.php');
}else{
    echo 'Dados incorretos';
}
?>