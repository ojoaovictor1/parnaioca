<?php
include 'config/conexao.php';
$sql = "SELECT * FROM hospedagem WHERE ativo = 'Ativo';";
//$sql = "SELECT acomodacao, cliente, data_checkin, data_checkout FROM hospedagem WHERE ativo = 'Ativo';";
$resultado = mysqli_query($con, $sql);
?>

    <table id="atualmente_hospedado" class="table table-striped">
        <thead>
        <tr>
            <th>Acomodação</th>
            <th>Cliente</th>
            <th>data_checkin</th>
            <th>data_checkout</th>
           
        </tr>
        </thead>
        <?php while($row = mysqli_fetch_array($resultado)){
            echo "<tr>"; 
            echo "<td>" .$row['acomodacao'] . "</td>";
            echo "<td>" .$row['cliente'] . "</td>";
            echo "<td>" .$row['data_checkin'] . "</td>";
            echo "<td>" .$row['data_checkout'] . "</td>";
        }   
        ?>
    </table>
        <script>
        $(document).ready(function() {
            $('#atualmente_hospedado').DataTable({
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