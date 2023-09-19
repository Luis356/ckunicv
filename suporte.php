<?php
include_once("valida.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/unifcv-logo.png" type="image/png">
    <link rel="stylesheet" href="css/suporte.css">
    <link rel="stylesheet" href="css/menu-top.css">
    <title>Suporte</title>
</head>

<body>

    <header class="header-menu">

        <nav class="menu-top">

            <a href="inicial.html" id="logo"><img class="logo-top" src="images/unifcv-logo.png" alt=""></a>

            <ul class="menu-lista">

                <li class="itens-menu" id="item-home">
                    <a class="link" href="checklist.html">CHECKLIST</a>
                </li>

            </ul>

        </nav>

    </header>

    <main class="conteudo-suporte">

        <fieldset>

            <legend>Suporte</legend>

            <form class="form-suporte" action="sup.php" method="post">

                <label class="label-suporte" for="data-suporte">Data:</label>
                <input type="date" name="data-suporte" id="data-suporte">

                <p>Pagina:</p>
                <input type="radio" id="pag-inicial" name="pag-suporte" value="Inicial">
                <label for="pag-inicial">Inical</label>
                <br>

                <input type="radio" id="pag-login" name="pag-suporte" value="login">
                <label for="pag-login">Login</label>
                <br>
                
                <input type="radio" id="pag-cadastro" name="pag-suporte" value="cadastro">
                <label for="pag-cadastro">Cadastro</label>
                <br>
                
                <input type="radio" id="pag-check" name="pag-suporte" value="check">
                <label for="pag-check">Checklist</label>
                <br>

                <textarea name="reporte-suporte" id="reporte-suporte" cols="30" rows="5">

                </textarea>

                <button class="btn-suporte" type="submit">Reportar</button>

            </form>

        </fieldset>

    </main>

    <footer>
        Copyright 2023
        <br>
        UniCV-Checklist
    </footer>

</body>

</html>