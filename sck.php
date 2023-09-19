<?php
$item_ck = $_POST["nome_item"];
$data_ck = $_POST["data_item"];
$status = 0;

include("conexao.php");
include("pegaid.php");

$cookie_idaluno = $_COOKIE["id_aluno"];
$sql = "INSERT INTO ckdados (id_aluno, id_disciplinas, nome_check, data_ck, status_ck) VALUES ($id_usuario, 1, '$item_ck', '$data_ck', $status)";

if ($con->query($sql) === TRUE) {

    echo "Item adicionado com sucesso.";


} else {

    header("Location: erro.html");
    echo "Erro na inserção no banco de dados.";
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$con->close();
?>
