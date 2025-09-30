<?php
session_start();
include '../config/conexao.php';

$id = $_GET['id'];

$sql_preencher_campos = "SELECT * FROM estacionamento WHERE id = $id";
$resultado_preencher = mysqli_query($con,$sql_preencher_campos);
$row = mysqli_fetch_assoc($resultado_preencher);

$sql = "SELECT * FROM acomodacoes";
$resultado = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vaga no Estacionamento</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../estilo_inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
   
    <?php include '../include/menu.php'; ?>
    <div id="container_vaga">
        <div id="topo">
            <ol id="breadcrumb">
                <li>
                    <a href="../inicio.php#cadastros">
                    <i class="fa-solid fa-user"></i>    
                    Cadastros</a>
                </li>
                <li>
                    <a href="../vaga_estacionamento/index.php">Cadastrar Vaga no Estacionamento</a>
                </li>
                <li>
                    Editar Vaga no Estacionamento
                </li>
            </ol>
        </div>

        <div id="formulario_clientes">
            <h1>Editar Vaga no Estacionamento</h1>
            <form action="uVaga_estacionamento.php" method="POST">
                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                <input type="number" name="numero" class="form-control" placeholder="número da Vaga" value="<?php echo $row['numero'];?>">

                <select name="ativo" id="" class="form-control">
                    <?php
                        if(mysqli_num_rows($resultado) > 0)

                            while($row = mysqli_fetch_array($resultado)){
                                echo "<option value='" .$row['nome'] ."'>" . $row['nome'] . "</option>";
                            }
                    ?>
                </select>

                <select name="situacao" id="" class="form-control">
                    <option value="1" >Ativo</option>
                    <option value="0" >Inativo</option>
                </select>
                <input type="submit" class="btn form-control" style='background-color: #ac7835' value="Enviar">
            </form>
        </div>

        <div id="roda"> 
        
        </div>
    </div>
    
</body>
</html>