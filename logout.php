<?php
session_start();
if ( isset($_SESSION['id']) ) {
  session_destroy();
  echo "Sessão encerrada";
}

  echo "<br><br>";
  echo "<a href='index.php'><button>Faça o Login Novamente</button></a>";
?>  