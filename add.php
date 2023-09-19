<?php
$item_ck = $_POST["desc_item"];
$data_ck = $_POST["data_item"];
$id_disciplina = $_POST["disciplina"];
$status = 0;

include("conexao.php");

$cookie_idaluno = $_COOKIE["id_aluno"];
$sql = "INSERT INTO ckdados (id_aluno, id_disciplinas, nome_check, data_ck, status_ck) VALUES ($cookie_idaluno, $id_disciplina, '$item_ck', '$data_ck', $status)";

if ($con->query($sql) === TRUE) {

    echo "Item adicionado com sucesso.";
    header("Location: teste.php");


} else {

    header("Location: erro.html");
    echo "Erro na inserção no banco de dados.";
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$con->close();
?>
