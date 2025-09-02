<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_todos_clientes = "SELECT * FROM clientes";
$resultado_clientes = mysqli_query($con,$sql_todos_clientes);
$sql_todas_acomodacoes = "SELECT * FROM acomodacoes";
$resultado_acomodacoes = mysqli_query($con,$sql_todas_acomodacoes);

$sql_preencher_campos = "SELECT * FROM hospedagem WHERE id = $id";
$resultado_preencher = mysqli_query($con, $sql_preencher_campos);
$row = mysqli_fetch_assoc($resultado_preencher);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Hospedagem</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Hospedagem</h1>

            <form action="uHospedagem.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="date" name="data_checkin" placeholder="" value="<?php echo $row['data_checkin']; ?>">
                <input type="date" name="data_checkout" placeholder="" value="<?php echo $row['data_checkout']; ?>">

                <select name="clientes" id="">
                    <?php 
                        while($row = mysqli_fetch_array($resultado_clientes)){
                            echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                        }

                    ?>
                </select>
                
                <select name="acomodacoes" id="">
                    <?php 
                        while($row = mysqli_fetch_array($resultado_acomodacoes)){
                            echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                        }
                    ?>
                </select>
                
                <select name="status" id="">
                    <option value="ativo">Ativo</option>
                    <option value="finalizado">Finalizado</option>
                    <option value="cancelado">Cancelado</option>
                </select>
              
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="index.php">Voltar</a> </div>
    </div>
    
</body>
</html>