<?php
$cookie_usuario = $_COOKIE["usuario"];
$cookie_senha = $_COOKIE["senha"];

include_once("conexao.php");

$sql = mysqli_query($con, "SELECT id_aluno FROM alunos WHERE nome_aluno = '$cookie_usuario'  AND  senha_aluno = '$cookie_senha'");
$row = mysqli_fetch_assoc($sql);

if ($row) {

    $id_aluno = $row['id_aluno'];
    setcookie("id_aluno", $id_aluno, time() + 3600, "/");

}else{

    echo "aluno não encontrado";

}

?>