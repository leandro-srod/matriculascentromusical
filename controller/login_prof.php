<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMET Professores</title>
</head>
<body>
<h1>Login Professores</h1>
<form action="logar_prof.php" method="POST">
<input type="text" name="txtLogin" placeholder="Login: " required />
<input type="password" name="txtSenha" placeholder="Senha: " required/>
<input type="submit" value="Entrar" />
</form>
</body>
</html>


<?php

if ( isset($_REQUEST["usuarioInvalido"]) ){
    echo "<script>alert('Login ou senha incorretos!');window.location.replace('login_prof.php');</script>";
}

?>
