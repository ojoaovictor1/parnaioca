<?php
session_start();
include '../config/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($_POST['nome'])){
        $_SESSION['erro'] = "O campo nome é obrigatório";
        header('Location: form_editar.php');
        exit;
    }

    if(strlen($_POST['nome']) < 2){
        $_SESSION['erro'] = "O campo nome deve ter no mínimo 3 caracteres.";
        header('Location: form_editar.php');
        exit; 
        }

    if(empty($_POST['email'])){
        $_SESSION['erro'] = "O campo email é obrigatório";
        header('Location: form_editar.php');
        exit; 
    }
    if(empty($_POST['cpf'])){
        $_SESSION['erro'] = "O campo cpf é obrigatório";
        header('Location: form_editar.php');
        exit; 
    }

    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $situacao = $_POST['situacao'];
    $id = $_POST['id'];

    $data_atual = date("Y-m-d");
        $data_atual_DT = new DateTime($data_atual, new DateTimeZone('America/Sao_Paulo'));
        $data_nasc_DT = new DateTime($data_nasc, new DateTimeZone('America/Sao_Paulo'));
        
        if($data_nasc > $data_atual){
            $_SESSION['erro'] = "Data de nascimento inválida";
            header('Location: form_editar.php?id=' . $id);
            exit; 
        }
        
        $diferenca = $data_atual_DT->diff($data_nasc_DT);

        if($diferenca->y < 18){
            $_SESSION['erro'] = "É necessário ter mais de 18 anos para se cadastrar";
            header('Location: form_editar.php?id=' . $id);
            exit; 
        }

}else{
    echo 'Dados não Atualizados' . mysqli_error($con);
    
}
/* Resgatando os dados antes do UPDATE.  */
$sql_antes_update = "SELECT * FROM clientes WHERE id = $id";
$resultado_antes_update = mysqli_query($con, $sql_antes_update);
$row = mysqli_fetch_assoc($resultado_antes_update);

$registros_antigos = array("nome"=> $row['nome'],
                           "data_nasc"=> $row['data_nasc'],
                           "cpf"=> $row['cpf'],
                           "email"=> $row['email'],
                           "telefone"=>$row['telefone'],
                           "estado"=> $row['estado'],
                           "cidade"=> $row['cidade'],
                           "situacao"=> $row['situacao']);
        /* LOG de UPDATE */
        fopen('../log.txt', 'a') or die('Não foi possível abrir o arquivo de logs');
        $data_hora = date('d/m/Y H:i:s');
        $log = "[$data_hora] - Dados que serão Editados. Realizado(a) por {$_SESSION['login']}: " 
                                                                        . $registros_antigos['nome'] . "-"
                                                                        . $registros_antigos['data_nasc']. " - " 
                                                                        . $registros_antigos['cpf']
                                                                        . "\n";
        file_put_contents('../log.txt', $log, FILE_APPEND);

$sql_update_clientes = 
    "UPDATE clientes SET 
    nome = '$nome',
    data_nasc = '$data_nasc',
    cpf = '$cpf',
    email = '$email',
    telefone = '$telefone',
    estado = '$estado',
    cidade = '$cidade',
    situacao = '$situacao'
    WHERE id = $id";

$sql_verifica_cpf = "SELECT * FROM clientes WHERE cpf = '$cpf' AND id != '$id'";
$resultado_cpf = mysqli_query($con, $sql_verifica_cpf);

if (mysqli_num_rows($resultado_cpf) > 0) {
    echo 'Erro: CPF já cadastrado!';
} else {
    $resultado_update = mysqli_query($con, $sql_update_clientes);
    if ($resultado_update) {
        header('Location: index.php');
        exit;
    } else {
        echo 'deu erro:' . mysqli_error($con);
    }
}

fopen('../log.txt', 'a') or die('Não foi possível abrir o arquivo de logs');
        $data_hora = date('d/m/Y H:i:s');
        $log = "[$data_hora] - Dados Editados. Realizado(a) por {$_SESSION['login']}: " 
                                                                        . $nome . "-"
                                                                        . $data_nasc. " - " 
                                                                        . $cpf
                                                                        . "\n";
        file_put_contents('../log.txt', $log, FILE_APPEND);
?>