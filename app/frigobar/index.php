<?php
session_start();
include '../config/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frigobar</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            
            <h1>Cadastrar Frigobar</h1>

            <form action="cFrigobar.php" method="POST">
                <select name="acomodacoes" id="">
                    <?php
                        $sql = "SELECT * FROM acomodacoes";
                        $resultado = mysqli_query($con,$sql);

                        if(mysqli_num_rows($resultado) > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option value=". $row['id'] .">" . $row['nome'] . "</option>";
                            }
                        }
                    ?>
                </select> <br>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda">
            <?php include 'rFrigobar.php'; ?>  
            <a href="../inicio.php">Voltar</a> 
            
        </div>
    </div>
    
</body>
</html>