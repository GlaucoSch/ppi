<?php
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

  // Consulta SQL para obter os dados do banco
  $sql = "SELECT nome, cpf, telefone, situacao, data_cadastro, observacoes, rua, bairro, numero, complemento, denominacao FROM beneficiario";
  $result = $conn->query($sql);

  // Verifica se há resultados e retorna-os como JSON
  if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    echo json_encode($data);
  } else {
    echo "Nenhum resultado encontrado.";
  }

  // Fecha a conexão
  $conn->close();
?>
