<?php
include_once("valida.php");
require("conexao.php");
$consulta = "SELECT nome_disciplina FROM disciplinas";
$resultado = $con->query($consulta);
if (!$resultado) {
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

  <script>
    function adicionarItem() {
      var texto = document.getElementById("novoItem").value;
      var data = document.getElementById("novaData").value;

      if (texto && data) {

        var lista = document.getElementById("lista");
        var novoItem = document.createElement("li");

        var novoCheckbox = document.createElement("input");
        novoCheckbox.type = "checkbox";

        var novoTexto = document.createTextNode(texto + " (Data: " + data + ")");
        novoItem.appendChild(novoCheckbox);
        novoItem.appendChild(novoTexto);

        lista.appendChild(novoItem);

        novoCheckbox.addEventListener('change', function() {
          alterarStatus(this);
        });

        document.getElementById("novoItem").value = "";
        document.getElementById("novaData").value = "";

        // Agora, envie os dados para o servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "sck.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              console.log("Item adicionado no banco com sucesso!");
            } else {
              console.error("Ocorreu um erro ao adicionar o item no banco.");
            }
          }
        };
        xhr.send("nome_item=" + encodeURIComponent(texto) + "&data_item=" + encodeURIComponent(data) + "&");
      }
    }

    function alterarStatus(checkbox) {
      console.log("Função alterarStatus chamada"); // Verifica se a função está sendo chamada

      var status = checkbox.checked ? 1 : 0;
      var id_ckdados = checkbox.getAttribute("data-item-id");

      // Envie a requisição para atualizar o status
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "atualizar_status.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log("Status atualizado com sucesso!");
          } else {
            console.error("Ocorreu um erro ao atualizar o status.");
          }
        }
      };
      xhr.send("id_ckdados=" + id_ckdados + "&status=" + status);
    }
  </script>
</head>

<body>

  <header class="header-menu">

    <nav class="menu-top">

      <a href="inicial.html" id="logo"><img class="logo-top" src="images/unifcv-logo.png" alt=""></a>

      <ul class="menu-lista">

        <li class="itens-menu" id="item-login">
          <a class="link" href="suporte.html">SUPORTE</a>
        </li>

        <li class="itens-menu" id="item-login">
          <a class="link" href="sair.html">SAIR</a>
        </li>

      </ul>

    </nav>

  </header>

  <main class="conteudo-checklist">

    <h1>Checklist</h1>
    <input type="text" id="novoItem" placeholder="Nome do Item">
    <input type="date" id="novaData">

    <label for="disciplina">Selecione a Disciplina:</label>
    <select id="disciplina" name="disciplina">

      <?php
      // 3. Exibir as opções
      while ($row = $resultado->fetch_assoc()) {
        echo '<option value="' . $row["nome_disciplina"] . '">' . $row["nome_disciplina"] . '</option>';
      }
      ?>
    </select>
    <br><br>

    <button onclick="adicionarItem()">Adicionar Item</button>
    <ul id="lista">
    </ul>

  </main>

  <footer>
    Copyright 2023
    <br>
    UniCV-Checklist
  </footer>

</body>

</html>