<?php
$cookie_ndis = $_COOKIE["n_dis"];

include_once("conexao.php");

$sql = mysqli_query($con, "SELECT id_disciplina FROM disciplinas WHERE nome_disciplina = '$cookie_ndis'");
$row = mysqli_fetch_assoc($sql);

if ($row) {

    $id_disciplina = $row['id_disciplina'];
    setcookie("id_disciplina", $id_disciplina, time() + 3600, "/");

}else{

    echo "Disciplina não encontrada";

}


?>