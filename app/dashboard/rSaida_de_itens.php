<?php 
include 'config/conexao.php';

$sql = "SELECT 
            i.nome,
            SUM(quantidade) AS quantidade_total 
        FROM consumo_frigobar cf 
            INNER JOIN itens_frigobar i ON cf.item_id = i.id 
        GROUP BY item_id, i.nome
        ORDER BY quantidade_total DESC;";
$resultado = mysqli_query($con, $sql);

$sql_menor = "SELECT 
                i.nome,
                SUM(quantidade) AS quantidade_total 
            FROM consumo_frigobar cf 
                INNER JOIN itens_frigobar i ON cf.item_id = i.id 
            GROUP BY item_id, i.nome
            ORDER BY quantidade_total ASC
            LIMIT 1;";
$resultado_menor = mysqli_query($con, $sql_menor);

$sql_maior = "SELECT 
                i.nome,
                SUM(quantidade) AS quantidade_total 
            FROM consumo_frigobar cf 
                INNER JOIN itens_frigobar i ON cf.item_id = i.id 
            GROUP BY item_id, i.nome
            ORDER BY quantidade_total DESC
            LIMIT 1;";
$resultado_maior = mysqli_query($con, $sql_menor);

$nomes_itens = [];
$quantidades_totais = [];
$todos_os_dados = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $nomes_itens[] = $row['nome'];
    $quantidades_totais[] = $row['quantidade_total'];
    $todos_os_dados[] = $row;
}

$nomes_json = json_encode($nomes_itens);
$quantidades_json = json_encode($quantidades_totais);

?>