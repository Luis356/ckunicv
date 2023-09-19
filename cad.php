<?php

//  FORMULARIO CADASTRO - PAGINA ENTRAR.HTML   
$nome_cad = $_POST["nome_cadastro"];
$email_cad = $_POST["email_cadastro"];
$senha_cad = $_POST["senha_cadastro"];

//  VERIFICA SE OS VALORES DAS VARIAVEIS: NOME, EMAIL E SENHA SÃO DIFERENTE DE 0
if (strlen($nome_cad) != 0 && strlen($email_cad) != 0 && strlen($senha_cad) != 0) {

    //  CASO SIM, CONECTA COM O BD
    include("conexao.php");

    //  CONSULTA NO BD SE HÁ OUTRO USUARIO COM O MESMO NOME
    $sql = mysqli_query($con, "SELECT * FROM alunos WHERE nome_aluno = '{$nome_cad}'");

    //  TEM OUTRO USUARIO COM O MESMO NOME?
    if(mysqli_num_rows($sql) > 0){
        
        //Usuario (Nome cadastrado) repetido no sistema, repetir cadastro
        header("Location: erro.html");
        exit();
    
    }else{

        //Usuario(Nome cadastrado) livre no sistema, cadastro normal
        mysqli_query($con, "INSERT INTO alunos VALUES (null, '$nome_cad', '$email_cad', '$senha_cad')");
        setcookie("usuario", "$nome_cad", time() + 3600, "/");
        setcookie("senha", "$senha_cad", time() + 3600, "/");
        header("Location: teste.php?id_aluno=$id_aluno");
        exit();

    }

}else{

    header("Location: erro.html");
    exit();

}