<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens para o Frigobar</title>
    <link rel="stylesheet" href="../include/estilo.css">
</head>
<body>

    <div id="topo">
        <h1>Cadastro de Itens para o Frigobar</h1>
    </div>

    <div id="formulario_clientes">
    <form action="cItem_frigobar.php" method="POST">
        
        <input type="text" id="nome" name="nome" placeholder="nome" required><br>
        <input type="number" id="preco" name="preco" placeholder="preco" required><br>
        <select name="ativo" id="">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
        </select>
        <input type="submit" value="Cadastrar Item">
    </form>
    </div>
    <div id="roda">
        <?php include 'rItem_frigobar.php'; ?>
        <a href="../inicio.php">Voltar</a>
    </div>

</body>
</html>