<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamento</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            
            <h1>Cadastrar Vaga no estacionamento</h1>
            
            <form action="cVaga_estacionamento.php" method="POST">
                <input type="number" name="numero">
                <select name="ativo" id="">
                    <option name="ativo" value="true">Sim</option>
                    <option name="ativo" value="false">Não</option>
                </select>
                <input type="submit" value="Enviar">
            </form>
            <br> <br>

            
        </div>

        <div id="roda"> <a href="../funcionarios/inicio.php">Voltar</a> </div>
    </div>

    
    
</body>
</html>