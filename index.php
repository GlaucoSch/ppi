<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['senha']))  {
    if ($_POST['usuario'] == 'admin' && $_POST['senha']=='1234')
    $_SESSION['id'] = 1;
    $_SESSION['nivel'] = 1;
    $_SESSION['nome'] = 'Glauco';
}
    if ( isset($_SESSION['id']) ) {
        header("Location: main.php");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Imagens/Favicon/favicon-32x32.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
     integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384- 
     q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384- 
     ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384- 
     ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="style.css">
    <title>Sys ONG</title>
</head>
<body>
    <div class="login-form">
        <form action="index.php" method="post">
            <div class="logo">
                <img src="imagens/transferir.jpg" alt="SAEBA">
            </div>
            <h2 class="text-center">FAÇA O LOGIN</h2>
            <div class="form-group">
                <input class="form-control" type="text" name="usuario" placeholder="Insira seu nome!" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="senha" placeholder="Insira sua senha!" required>
            </div>
            <div class="form-group">
                <a href="tela2.html"><button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button></a>
            </div>
            <div class="clearfix">
				<label class="float-left checkbox-inline">
					<input type="checkbox">
					Lembrar-me
				</label>
				<a data-toggle="modal" data-target="#modal-senha" class="float-right">Recuperar Senha</a>
			</div>
        </form>
    </div>

  
</body>
</html>
    