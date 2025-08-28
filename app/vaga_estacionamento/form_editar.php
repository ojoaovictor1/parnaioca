<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM acomodacoes";
$resultado = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vaga no Estacionamento</title>
    <link rel="stylesheet" href="../include/estilo_clientes.css">
</head>
<body>
   

    <div id="container">
        <div id="topo"></div>

        <div id="formulario_clientes">
            <h1>Editar Vaga no Estacionamento</h1>
            <form action="uVaga_estacionamento.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="number" name="numero" placeholder="número da Vaga">

                <select name="ativo" id="">
                    <?php
                        if(mysqli_num_rows($resultado) > 0)

                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option value='" .$row['nome'] ."'>" . $row['nome'] . "</option>";
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