<?php
session_start();
include '../config/conexao.php';

$sql = "SELECT * FROM clientes WHERE situacao = 1 ";
$resultado_sql = mysqli_query($con,$sql);

$sqlno = "SELECT * FROM clientes WHERE situacao != 1 ";
$resultado_sqlno = mysqli_query($con,$sqlno);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- Estilos do DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">




    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables + Botões -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>

    

    <!-- Dependências para PDF e Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Idioma PT-BR -->
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"></script>
</head>
<body>
    <a href="../inicio.php">Voltar</a>
    <h1>Clientes Ativos</h1>
    <table id="tabelaExemplo" class="table table-striped">
        <thead><tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Situação</th>
        </tr></thead>

        <?php while($row = mysqli_fetch_array($resultado_sql)){
            echo "<tr>"; 
            echo "<td>" .$row['id'] . "</td>";
            echo "<td>" .$row['nome'] . "</td>";
            echo "<td>" .$row['data_nasc'] . "</td>";
            echo "<td>" .$row['cpf'] . "</td>";
            echo "<td>" .$row['email'] . "</td>";
            echo "<td>" .$row['telefone'] . "</td>";
            echo "<td>" .$row['estado'] . "</td>";
            echo "<td>" .$row['cidade'] . "</td>";
            echo "<td>" .$row['situacao'] . "</td>";
            echo "</tr>";

        }
        ?> <br> <br>
    </table>
        <h1>Clientes Inativos</h1>
    <table border='1' id="inativos">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Situação</th>
        </tr>

        <?php while($row = mysqli_fetch_array($resultado_sqlno)){
            echo "<tr>"; 
            echo "<td>" .$row['id'] . "</td>";
            echo "<td>" .$row['nome'] . "</td>";
            echo "<td>" .$row['data_nasc'] . "</td>";
            echo "<td>" .$row['cpf'] . "</td>";
            echo "<td>" .$row['email'] . "</td>";
            echo "<td>" .$row['telefone'] . "</td>";
            echo "<td>" .$row['estado'] . "</td>";
            echo "<td>" .$row['cidade'] . "</td>";
            echo "<td>" .$row['situacao'] . "</td>";
            echo "</tr>";

        }
        ?> <br> <br>
<script>
        $(document).ready(function() {
            $('#tabelaExemplo').DataTable({
                dom: 'Bfrtip',
                buttons: [
    {
        extend: 'copy',
        text: '<i class="bi bi-clipboard"></i> Copiar',
        className: 'btn btn-outline-dark bg-secondary'
    },
    {
        extend: 'excel',
        text: '<i class="bi bi-file-earmark-excel"></i> Excel',
        className: 'btn btn-outline-dark bg-secondary'
    },
    {
        extend: 'pdf',
        text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
        className: 'btn btn-outline-dark bg-secondary'
    },
    {
        extend: 'print',
        text: '<i class="bi bi-printer"></i> Imprimir',
        className: 'btn btn-outline-dark bg-secondary'
    },
    {
        extend: 'colvis',
        text: '<i class="bi bi-eye"></i> Colunas',
        className: 'btn btn-outline-dark bg-secondary'
    }
]
,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                }
            });
        });
</script>

</body>
</html>