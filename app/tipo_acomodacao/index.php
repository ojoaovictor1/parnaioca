<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            
            <h1>Cadastrar Tipo de Acomodação</h1>

            <form action="cTipo_acomodacao.php" method="POST">
                <input type="text " name="tipo_da_acomodacao" placeholder="Tipo de Acomodação"> <br>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda">
            <?php include 'rTipo_acomodacao.php'; ?>  
            <a href="../inicio.php">Voltar</a> 
            
        </div>
    </div>
    
</body>
</html>