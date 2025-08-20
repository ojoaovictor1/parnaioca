<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

    <div id="container">
        <div id="topo">
            Bem Vindo!!! <?= $_SESSION['login']; ?>
            <a href="login.php">Voltar</a>
        </div>

        <div id="cont">
            <a href="../clientes/index.php">Cadastrar clientes</a> <br>
            <a href="../tipo_acomodacao/index.php">Cadastrar o Tipo de Acomodação</a><br>
            <a href="../acomodacoes/index.php">Cadastrar Acomodações</a><br>
            <a href="../item_frigobar/index.php">Cadastrar itens para o frigobar</a>
            <a href="../vaga_estacionamento">Cadastrar Vaga no Estacionamento</a>
        </div>
           
        <div id="roda"></div>
    </div>
    
</body>
</html>