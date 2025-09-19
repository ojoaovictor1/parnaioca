<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_preencher_campos = "SELECT * FROM tipo_da_acomodacao WHERE id = $id";
$resultado = mysqli_query($con,$sql_preencher_campos);
$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Tipo da Acomodação</h1>
            <form action="uTipo_acomodacao.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="tipo" placeholder="tipo da acomodação" value="<?php echo $row['tipo']; ?>">
                <select name="situacao" id="">
                    <option value="1" >Ativo</option>
                    <option value="0" >Inativo</option>
                </select>
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
        <a href="index.php">Voltar</a> </div>
    </div>
    
</body>
</html>