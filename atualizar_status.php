<?php
$id_ckdados = $_POST["id_ckdados"];
$status = $_POST["status"];

include("conexao.php");

$sql = "UPDATE ckdados SET status = $status WHERE id_ckdados = 8";

if ($con->query($sql) === TRUE) {
    echo "Status atualizado com sucesso.";
    echo json_encode(["mensagem" => "Status atualizado com sucesso"]);

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo json_encode(["erro" => "Erro ao atualizar o status: " . $con->error]);

}

$con->close();
?>