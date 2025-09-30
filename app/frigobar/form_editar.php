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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
   <?php include '../include/menu.php'; ?>
    <main>
    <div id="container_frigobar">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    <a href="../frigobar/index.php">Cadastrar Frigobar</a>
                </li>
                <li>
                    Editar Frigobar
                </li>
            </ol>
        </div>

        <div id="formulario_clientes">
            <h1>Editar Frigobar</h1>
            <form action="uFrigobar.php" method="POST">
                <input type="hidden" name="id" class='form-control' value="<?php echo $id; ?>">
                <input type="number" name="numero" class='form-control' value="<?php echo $row['numero']; ?>">
                <select name="acomodacoes" id="" class='form-control'>
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

                <select name="situacao" id="" class='form-control'>
                    <option value="1" >Ativo</option>
                    <option value="0" >Inativo</option>
                </select>
                <input type="submit" class='form-control' style='background-color: #ac7835' value="Enviar">
            </form>
        </div>

        <div id="roda"> 
             
    </div>
    </div>
    </main>
    
</body>
</html>