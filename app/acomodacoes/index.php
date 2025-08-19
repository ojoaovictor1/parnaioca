<?php
include '../config/conexao.php';

$sql_consulta_tipo = "SELECT * FROM tipo_da_acomodacao";
$resultado = mysqli_query($con,$sql_consulta_tipo);
$total_registros = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acomodações</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Cadastro de Acomodações</h1>
            <form action="cAcomodacoes.php" method="POST">
                <input type="text" name="nome" placeholder="nome">
                <input type="text" name="numero" placeholder="numero">
                <input type="text" name="valor" placeholder="valor">
                <input type="text" name="capacidade" placeholder="capacidade">

                <select name="tipo" id="">
                    <?php 
                        if($total_registros > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option>" . $row['tipo'] ."</option>";
                            }
                        }
                    ?>   
                </select>

                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> <a href="../funcionarios/inicio.php">Voltar</a> </div>
    </div>
    
</body>
</html>