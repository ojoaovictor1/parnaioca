<?php 
include '../config/conexao.php';

include '../config/conexao.php';

$id = isset($_GET['hospedagem_id']) ? (int) $_GET['hospedagem_id'] : 0;

$sql = "SELECT SUM(valor_total) AS consumo_total FROM consumo_frigobar WHERE hospedagem_id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

echo json_encode(['total' => number_format($row['consumo_total'] ?? 0, 2, '.', '')]);
?>