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
    FOREIGN KEY (hospedagem_id) REFERENCES hospedagem(id),
    FOREIGN KEY (item_id) REFERENCES itens_frigobar(id)
    )";


mysqli_query($con, $sql_criar_tabela_consumo_frigobar);

?>