<?php
include_once("valida.php");
require("conexao.php");
$id_alunoo = $_GET["id_aluno"];

//$consulta = "SELECT id_disciplina, nome_disciplina FROM disciplinas";
$sql_dados = "SELECT * FROM ckdados WHERE id_aluno = '{$id_alunoo}'";
$sql_disciplinas = mysqli_query($con, "SELECT id_disciplina, nome_disciplina FROM disciplinas");

if (!$sql_disciplinas) {
  die("Erro na consulta: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/unifcv-logo.png" type="image/png">
  <link rel="stylesheet" href="css/checklist.css">
  <link rel="stylesheet" href="css/menu-top.css">
  <title>UniCV Checklist</title>

</head>

<body>

  <header class="header-menu">

    <nav class="menu-top">

      <a href="inicial.html" id="logo"><img class="logo-top" src="images/unifcv-logo.png" alt=""></a>

      <ul class="menu-lista">

        <li class="itens-menu" id="item-login">
          <a class="link" href="suporte.php">SUPORTE</a>
        </li>

        <li class="itens-menu" id="item-login">
          <a class="link" href="sair.php">SAIR</a>
        </li>

      </ul>

    </nav>

  </header>

  <main class="conteudo-checklist">

    <h1>Checklist</h1>

    <form action="add.php" method="post">

      <label for="nomeItem">Descrição:</label>
      <input type="text" id="nomeItem" name="desc_item">

      <label for="novaData">Data:</label>
      <input type="date" id="novaData" name="data_item">

      <label for="disciplina">Selecione a Disciplina:</label>
      <select id="disciplina" name="disciplina">

        <?php
        // 3. Exibir as opções
        while ($row = $sql_disciplinas->fetch_assoc()) {
          echo '<option value="' . $row["id_disciplina"] . '">' . $row["nome_disciplina"] . '</option>';
        }
        ?>
      </select>
      <br><br>

      <button class="btn-add" type="submit">Adicionar item</button>

    </form>

    <div class="mostra-itens">

      <table border="1">
        <tr>
          <th>Descrição</th>
          <th>Data</th>
          <th>Status</th>

        </tr>

        <?php
        $result = $con->query($sql_dados);

        while ($linha = $result->fetch_assoc()) {

        ?>
          <tr>
            <td><?= $linha["nome_check"] ?></td>

            <td><?= $linha["data_ck"] ?></td>

            <form action="atualizar_status.php" method="post">

              <td>
                <option value="' . $row[" id_disciplina"] . '">' . $row["nome_disciplina"] . '</option>' ; 
              </td>


            </form>

          </tr>
        <?php
        }
        ?>
      </table>
    </div>


  </main>

  <footer>
    Copyright 2023
    <br>
    UniCV-Checklist
  </footer>

</body>

</html>