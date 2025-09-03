<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];
$sql_preencher_campos = "SELECT * FROM frigobar WHERE id = $id";
$resultado = mysqli_query($con, $sql_preencher_campos);
$row = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Frigobar</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Frigobar</h1>
            <form action="uFrigobar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="number" name="numero" value="<?php echo $row['numero']; ?>">
                <select name="acomodacoes" id="">
                    <?php 
                       $sql = "SELECT * FROM acomodacoes";
                       $resultado = mysqli_query($con,$sql);
                       
                        if(mysqli_num_rows($resultado) > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option value=" . $row['id'] .">" .$row['nome'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="index.php">Voltar</a> </div>
    </div>
    
</body>
</html>