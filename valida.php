<?php
$cookie_usuario = $_COOKIE["usuario"];
$cookie_senha = $_COOKIE["senha"];

include_once("conexao.php");

$sql = mysqli_query($con, "SELECT * FROM alunos WHERE nome_aluno = '$cookie_usuario'  AND  senha_aluno = '$cookie_senha'");

if ($sql->num_rows != 1) {

    header("Location: erro.html");
    exit();

}