<?php
$data_sup = $_POST["data-suporte"];
$pagina_sup = $_POST["pag-suporte"];
$reclame_sup = $_POST["reporte-suporte"];

include("conexao.php");

$sql = "INSERT INTO suporte (id_alunos, data_sup, pagina, reclame)  VALUES (1, '$data_sup', '$pagina_sup', '$reclame_sup')";

if ($con->query($sql) === TRUE) {

    echo "Item adicionado com sucesso.";
    header("Location: adicionado.php");


} else {

    header("Location: erro.html");
    echo "Erro na inserção no banco de dados.";
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$con->close();
?>