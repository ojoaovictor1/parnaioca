<?php
session_start();

include '../config/conexao.php';

$sql_criar_tabela_consumo_frigobar = 
    "CREATE TABLE IF NOT EXISTS consumo_frigobar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hospedagem_id INT,
    item_id INT,
    quantidade INT,
    valor_total DECIMAL(10,2),
    momento DATE,
    FOREIGN KEY (hospedagem_id) REFERENCES hospedagem(id),
    FOREIGN KEY (item_id) REFERENCES itens_frigobar(id)
    )";


mysqli_query($con, $sql_criar_tabela_consumo_frigobar);


$hospedagem_id = $_POST['id_hospedagem'];
$itens = $_POST['itens'];

foreach($itens as $item_id => $qtd){
    if($qtd > 0){
        
        $sql_preco = "SELECT preco FROM itens_frigobar WHERE id = $item_id";
        $res = mysqli_query($con, $sql_preco);
        $row = mysqli_fetch_assoc($res);
        $preco = $row['preco'];
        $valor_total = $preco * $qtd;
        $data = date("Y-m-d");

        $sql_insert = "INSERT INTO consumo_frigobar (hospedagem_id, item_id, quantidade, valor_total, momento) 
                       VALUES ($hospedagem_id, $item_id, $qtd, $valor_total, '$data')";
        mysqli_query($con, $sql_insert);
    }
}


$sql_update = "UPDATE hospedagem SET ativo = 'Finalizado' WHERE id = $hospedagem_id";
mysqli_query($con, $sql_update);

echo "Check-out finalizado com sucesso!";

?>