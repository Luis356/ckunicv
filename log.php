<?php
//  FORMULARIO LOGIN - PAGINA ENTRAR.HTML
@$nome_login = trim($_POST["nome_login"]);
@$senha_login = trim($_POST["senha_login"]);

//   CONECTA COM O BD
include("conexao.php");

//  VERIFICA SE HÁ VARIAVEIS VAZIAS
if (strlen($nome_login) == 0 || strlen($senha_login) == 0) {

    header("Location: login.html");
    exit(0);
} else {

    $sql = mysqli_query($con, "SELECT id_aluno, nome_aluno, senha_aluno FROM alunos WHERE nome_aluno ='$nome_login' AND senha_aluno ='$senha_login'");

    if (mysqli_num_rows($sql) == 1) {

        $row = mysqli_fetch_assoc($sql);
        $id_aluno = $row['id_aluno'];

        setcookie("usuario", "$nome_login", time() + 3600, "/");
        setcookie("senha", "$senha_login", time() + 3600, "/");
        header("Location: teste.php?id_aluno=$id_aluno");
        exit(0);
    } else {

        header("Location: erro.html");
        exit(0);
    }
}
