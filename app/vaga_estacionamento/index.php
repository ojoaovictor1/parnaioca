<?php
include '../config/conexao.php';
session_start();
$erroItem = isset($_SESSION['erroItem']) ? $_SESSION['erroItem'] : '';
unset($_SESSION['erroItem']);

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
            <?php if($erroItem) : ?>
                <p style="color: red;"><?= $erroItem; ?></p>
            <?php endif; ?>
            
            <form action="cVaga_estacionamento.php" method="POST">
                <input type="number" name="numero" placeholder="numero da vaga">
                <select name="ativo" id="">
                    


                    <?php 
                        $sql_acomodacao_referencia = "SELECT * FROM acomodacoes";
                        $resultado = mysqli_query($con,$sql_acomodacao_referencia);
                        
                        if(mysqli_num_rows($resultado) >= 1){
                           
                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option name='ativo' value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                                    
                        }
                           
                        }
                    ?>
                </select>
        
                <input type="submit" value="Enviar">
            </form>
            <br> <br>

            
        </div>

        <div id="roda">
            <?php include 'rVaga_estacionamento.php'; ?>
            <a href="../inicio.php">Voltar</a>
        </div>
    </div>

    
    
</body>
</html>