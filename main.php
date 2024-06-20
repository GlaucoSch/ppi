<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="main.css">
  <link rel="shortcut icon" href="" type="image/x-icon">
  <title>Sistema SAEBA</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>

  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="imagens/transferir.jpg" alt="Logo">
    <div class="username">Administrador - Glauco</div>
    <a class="a-sair" href="logout.php"><button class="username-button">Sair</button></a>
  </div>
  <!-- <a class="a-sair" href="logout.php"><button class="username-button">Sair</button></a> -->


  <!-- Menu lateral -->
  <div class="menu">
    <div class="menu-header">
      <i class="fas fa-home"></i>
      <img class="imagem-menu" src="imagens/home2.png" alt="">
      <a href="tela2.html" style="text-decoration: none; color:white; font-size: 25px">Home</a>
    </div>

    <div class="menu-item">
      <i class="fas fa-users"></i>
      <img class="imagem-menu" src="imagens/182636.png" alt="">
      <a href="#"><button> Cadastrar Beneficiário</button></a>
    </div>

    <div class="menu-item">
      <i class="fas fa-hand-holding-heart"></i>
      <img class="imagem-menu" src="imagens/doador.png" alt="">
      <a href="#"><button>Cadastrar Doador</button></a>
    </div>

    <div class="menu-item">
      <i class="fas fa-hand-holding-heart"></i>
      <img class="imagem-menu" src="imagens/doador.png" alt="">
      <a href="#"><button>Cadastrar Produtos</button></a>
    </div>

    <div class="menu-item">
      <i class="fas fa-donate"></i>
      <img class="imagem-menu" src="imagens/doação.png" alt="">
      <a href="#"><button>Cadastrar Doação</button></a>
    </div>

    <div class="menu-item">
      <i class="fas fa-donate"></i>
      <img class="imagem-menu" src="imagens/pesquisar.png" alt="">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Consultar
        </button>
        <ul class="dropdown-menu border-0" style=" background-color: #fff0">
          <li><button class="dropdown-item" type="button">Benefiário</button></li>
          <li><button class="dropdown-item" type="button">Doador</button></li>
          <li><button class="dropdown-item" type="button">Doação</button></li>
        </ul>
      </div>
    </div>
  </div>


  <!-- Formulário cadastro de beneficiários -->

  <div id="modal-form" class="modal">
    <div class="modal-content">
      <span class="modal-close">&times;</span>
        <div class="formulario">
        <form method="POST" action="main.php">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome">

          <label for="cpf">CPF:</label>
          <input type="text" name="cpf" id="cpf">

          <label for="telefone">Telefone:</label>
          <input type="text" name="telefone" id="telefone">

          <label for="bairro">Bairro:</label>
          <input type="text" name="bairro" id="bairro">

          <label for="rua">Rua:</label>
          <input type="text" name="rua" id="rua">

          <label for="numero">Número:</label>
          <input type="number" name="numero" id="numero">

          <label for="complemento">Complemento:</label>
          <input type="text" name="complemento" id="complemento">

          <label for="denominacao">Denominação Religiosa:</label>
          <input type="text" name="denominacao" id="denominacao">

          <label for="situacao">Situação:</label>
          <select name="situacao" id="situacao">
            <option value="aprovado">Aprovado</option>
            <option value="cancelado">Cancelado</option>
            <option value="emergencial">Emergencial</option>
            <option value="negado">Negado</option>
          </select>

          <label for="data">Data:</label>
          <input type="date" name="data_cadastro" id="data">

          <label for="observacoes">Observações:</label>
          <textarea name="observacoes" id="observacoes" cols="20" rows="5"></textarea>

          <input type="submit" name="enviar" value="Salvar">

        </form>
      </div>
    </div>
  </div>

  <!-- script para formulário cadastro beneficiário -->

  <script>
    // Abrir modal ao clicar no link "Cadastrar Beneficiário"
    var modal = document.getElementById("modal-form");
    var linkCadastrarBeneficiario = document.querySelector(".menu-item:nth-child(2) a");

    linkCadastrarBeneficiario.addEventListener("click", function(event) {
      event.preventDefault();
      modal.style.display = "block";
    });

    // Fechar modal ao clicar no botão de fechar
    var modalClose = document.querySelector(".modal-close");
    modalClose.addEventListener("click", function() {
      modal.style.display = "none";
    });


    // Fechar modal ao clicar fora do modal
    window.addEventListener("click", function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
  </script>

  <!-- Código php para fazer a inserção de dados no banco -->

  <?php

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $situacao = $_POST['situacao'];
    $data_cadastro = $_POST['data_cadastro'];
    $observacoes = $_POST['observacoes'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $denominacao = $_POST['denominacao'];

    // Conexão com o banco de dados (substitua pelos dados corretos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_saeba";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se ocorreu algum erro na conexão
    if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepara a consulta SQL
    $sql = "INSERT INTO beneficiario (nome, cpf, telefone, situacao, data_cadastro, observacoes, rua, bairro, numero, complemento, denominacao)
        VALUES ('$nome', '$cpf', '$telefone','$situacao', '$data_cadastro', '$observacoes', '$rua', '$bairro', '$numero', '$complemento', '$denominacao')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Dados inseridos com sucesso');</script>";
    } else {
      echo "<script>alert('Erro ao inserir os dados: " . $conn->error . "');</script>";
    }


    // Fecha a conexão
    $conn->close();

    //header("Location: main.php");
    //exit();

  }
  ?>

  <!-- #######################################################################-->

  <!-- scrip JS para consulta de dados do banco -->

  <script>
    // Abrir modal ao clicar no link "Consultar"
    var linkConsultar = document.querySelector('body > div.menu > div:nth-child(5) > div > ul > li:nth-child(1) > button');
    linkConsultar.addEventListener("click", function(event) {
      event.preventDefault();
     
      // Fazer uma requisição AJAX para obter os dados do banco de dados
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Callback de sucesso da requisição AJAX
          var response = JSON.parse(this.responseText);
          exibirPopUp(response);
        }
      };
      xhttp.open("GET", "consultar.php", true); // Arquivo PHP responsável por obter os dados do banco de dados
      xhttp.send();
    });

    // Função para exibir o pop-up com os dados do banco de dados
    function exibirPopUp(data) {
      var html = "<table>";
      html += "<tr><th>Nome</th><th>CPF</th><th>Telefone</th><th>Bairro</th><th>Rua</th><th>Numero</th><th>Situação</th><th>Data</th><th>Denominção</th><th>Complemento</th><th>Observações</th></tr>";
      data.forEach(function(row) {
        html += "<tr>";
        html += "<td>" + row.nome + "</td>";
        html += "<td>" + row.cpf + "</td>";
        html += "<td>" + row.telefone + "</td>";
        html += "<td>" + row.bairro + "</td>";
        html += "<td>" + row.rua + "</td>";
        html += "<td>" + row.numero + "</td>";
        html += "<td>" + row.situacao + "</td>";
        html += "<td>" + row.data_cadastro + "</td>";
        html += "<td>" + row.denominacao + "</td>";
        html += "<td>" + row.complemento + "</td>";
        html += "<td>" + row.observacoes + "</td>";
        html += "</tr>";
      });
      html += "</table>";

      Swal.fire({
        title: "Beneficiários Cadastrados",
        html: html,
        showCloseButton: true,
        showConfirmButton: false
      });
    }
  </script>

  <!-- **********Formulario cadastro de doadores********** -->

  <div id="modalDoador-form" class="modal">
    <div class="modal-content">
      <span class="modal2-close">&times;</span>
      <div class="formulario">
        <form method="POST" action="main.php">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome">

          <label for="razao_social">Razão Social:</label>
          <input type="text" name="razao_social" id="razao_social">

          <label for="cpf_cnpj">CPF/CNPJ:</label>
          <input type="text" name="cpf_cnpj" id="cpf_cnpj">

          <label for="bairro">Bairro:</label>
          <input type="text" name="bairro" id="bairro">

          <label for="rua">Rua:</label>
          <input type="text" name="rua" id="rua">

          <label for="numero">Número:</label>
          <input type="number" name="numero" id="numero">

          <label for="complemento">Complemento:</label>
          <input type="text" name="complemento" id="complemento">

          <input type="submit" name="enviarDoar" value="Salvar">

        </form>
      </div>
    </div>
  </div>

  <!--------------------------------------- script para formulario cadastro doador---------------------------------------- -->

  <script>
    // Abrir modal ao clicar no link "Cadastrar Doador"
    var modalDoar = document.getElementById("modalDoador-form");
    var linkCadastrarDoador = document.querySelector(".menu-item:nth-child(3) a");
    linkCadastrarDoador.addEventListener("click", function(event) {
      event.preventDefault();
      modalDoar.style.display = "block";
    });

    // Fechar modal ao clicar no botao de fechar
    var modalCloseDoar = document.querySelector(".modal2-close");
    modalCloseDoar.addEventListener("click", function(vent) {
      modalDoar.style.display = "none";
    });


    // Fechar modal ao clicar fora do modal
    window.addEventListener("click", function(event) {
      if (event.target == modalDoar) {
        modalDoar.style.display = "none";
      }
    });
  </script>
  <!-- Código php para fazer a inserção de dados no banco -->

  <?php

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviarDoar'])) {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $razao_social = $_POST['razao_social'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];


    // Conexão com o banco de dados (substitua pelos dados corretos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_saeba";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se ocorreu algum erro na conexão
    if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepara a consulta SQL
    $sql = "INSERT INTO origem_doador(nome, razao_social, cpf_cnpj, bairro, rua, numero, complemento)
          VALUES ('$nome', '$razao_social', '$cpf_cnpj', '$bairro','$rua', '$numero', '$complemento')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Dados inseridos com sucesso');</script>";
    } else {
      echo "<script>alert('Erro ao inserir os dados: " . $conn->error . "');</script>";
    }


    // Fecha a conexão
    $conn->close();

    //header("Location: main.php");
    //exit();

  }
  ?>

  <!-- #######################################################################-->

  <!-- scrip JS para consulta de dados do banco -->

  <script>
    // Abrir modal ao clicar no link "Consultar Doador"
    var linkConsultarDoar = document.querySelector("body > div.menu > div:nth-child(5) > div > ul > li:nth-child(2) > button");
    linkConsultarDoar.addEventListener("click", function(event) {
      event.preventDefault();

      // Fazer uma requisição AJAX para obter os dados do banco de dados
      var xhttpDoar = new XMLHttpRequest();
      xhttpDoar.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Callback de sucesso da requisição AJAX
          var responseDoar = JSON.parse(this.responseText);
          exibirPopUpDoar(responseDoar);
        }
      };
      xhttpDoar.open("GET", "ConsultaDoador.php", true); // Arquivo PHP responsável por obter os dados do banco de dados
      xhttpDoar.send();
    });

    // Função para exibir o pop-up com os dados do banco de dados
    function exibirPopUpDoar(data) {
      var html = "<table>";
      html += "<tr><th>Nome</th><th>Razão Social</th><th>CPF/CNPJ</th><th>Bairro</th><th>Rua</th><th>Numero</th><th>Complemento</th></tr>";
      data.forEach(function(row) {
        html += "<tr>";
        html += "<td>" + row.nome + "</td>";
        html += "<td>" + row.razao_social + "</td>";
        html += "<td>" + row.cpf_cnpj + "</td>";
        html += "<td>" + row.bairro + "</td>";
        html += "<td>" + row.rua + "</td>";
        html+= "<td>" + row.numero + "</td>";
        html += "<td>" + row.complemento + "</td>";
        html += "</tr>";
      });
      html += "</table>";

      Swal.fire({
        title: "Doadores Cadastrados",
        html: html,
        showCloseButton: true,
        showConfirmButton: false
      });
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>

</body>

</html>