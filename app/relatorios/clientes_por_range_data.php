<?php
session_start();
include '../config/conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php include '../include/menu.php'; ?>

    <main>
    <div id="container_clientes">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#relatorios">
                    <i class="fa-solid fa-chart-bar"></i>    
                    Relatórios</a>
                </li>
                <li>
                    Clientes por Range de Datas
                </li>
            </ol>
        </div>
        <div id="formulario_clientes">

            <h1>Clientes por Range de Datas</h1>
            <form action="buscar_clientes.php" method="POST">
                <label for="entrada">Data de Entrada.</label>
                <input type="date" class="form-control" name="entrada">

                <label for="saida">Data de Saída.</label>
                <input type="date" class="form-control" name="saida">
                <input type="submit" class="btn" style='background-color: #ac7835' value="Buscar">
            </form>
        </div>

        <div id="roda"> <?php include 'buscar_clientes.php'; ?>
            
        </div>
    </div>
    </main>
</body>
</html>