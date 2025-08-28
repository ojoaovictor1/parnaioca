<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_consulta_tipo = "SELECT * FROM tipo_da_acomodacao";
$resultado = mysqli_query($con,$sql_consulta_tipo);
$total_registros = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Acomodações</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Acomodação</h1>
            <form action="uAcomodacoes.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" placeholder="nome">
                <input type="text" name="numero" placeholder="numero">
                <input type="text" name="valor" placeholder="valor">
                <input type="text" name="capacidade" placeholder="capacidade">

                <select name="tipo" id="">
                    <?php 
                        if($total_registros > 0){
                            while($row = mysqli_fetch_array($resultado)){
                                echo '<option value="' . $row['id'] . '">' . $row['tipo'] . '</option>';

                            }
                        }
                    ?>   
                </select>

                <select name="situacao" id="">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
                <input type="submit" value="Enviar">

            </form>
        </div>

        <div id="roda"> 
             
        <a href="index.php">Voltar</a> </div>
    </div>
    
</body>
</html>