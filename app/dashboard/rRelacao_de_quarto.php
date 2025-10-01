<?php
/* quarto mais rentavel */

include 'config/conexao.php';

$sql = "SELECT a.nome AS acomodacao,
        a.valor AS valor_diaria,
        SUM(DATEDIFF(h.data_checkout, h.data_checkin)) AS total_dias,
        (SUM(DATEDIFF(h.data_checkout, h.data_checkin)) * a.valor) AS valor_final
        FROM hospedagem h
        INNER JOIN acomodacoes a ON h.acomodacao = a.nome
        GROUP BY a.nome, a.valor;";

        $resultado = mysqli_query($con, $sql);
        

$sql_maior = "SELECT a.nome AS acomodacao,
        a.valor AS valor_diaria,
        SUM(DATEDIFF(h.data_checkout, h.data_checkin)) AS total_dias,
        (SUM(DATEDIFF(h.data_checkout, h.data_checkin)) * a.valor) AS valor_final
        FROM hospedagem h
        INNER JOIN acomodacoes a ON h.acomodacao = a.nome
        GROUP BY a.nome, a.valor
        ORDER BY valor_final DESC
        LIMIT 1;";

        $acomodacao_maior = mysqli_query($con, $sql_maior);
        $acomodacao_maior = mysqli_fetch_assoc($acomodacao_maior);

$sql_menor = "SELECT a.nome AS acomodacao,
        a.valor AS valor_diaria,
        SUM(DATEDIFF(h.data_checkout, h.data_checkin)) AS total_dias,
        (SUM(DATEDIFF(h.data_checkout, h.data_checkin)) * a.valor) AS valor_final
        FROM hospedagem h
        INNER JOIN acomodacoes a ON h.acomodacao = a.nome
        GROUP BY a.nome, a.valor
        ORDER BY valor_final ASC
        LIMIT 1;";

        $acomodacao_menor = mysqli_query($con, $sql_menor);
        $acomodacao_menor = mysqli_fetch_assoc($acomodacao_menor);

        $nomes_acomodacoes = [];
        $valores_finais = [];

        while ($row = mysqli_fetch_assoc($resultado)) {
            $nomes_acomodacoes[] = $row['acomodacao'];
            $valores_finais[] = ($row['valor_final'] - $row['valor_diaria']) / $row['valor_diaria'] * 100;
        }

        $acomodacoes_json = json_encode($nomes_acomodacoes);
        $valores_json = json_encode($valores_finais);
?>