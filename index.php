<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Musical - Matrículas</title>
</head>
<body>
    <br><center><img src="img/CMET_logo.png" height="180px"/></center>
    <h1 align="center"> CMET Paulo Freire - Centro Musical</h1>
    <h1 align="center"> Sistema - Gestão de Matrículas (v.1.0)</h1>

    <center>
    Login Secretaria:<br><br>

    <?php

    session_start();
    session_destroy();
   
    if ( isset($_REQUEST["usuarioInvalido"]) ){
        echo "<script> alert('Login ou senha incorretos!'); </script>";
    }
    

    ?>

     <form action="controller/logar_secretaria.php" method="POST">
        <input type="text" name="txtLogin" placeholder="Login: " required /><br><br>
        <input type="password" name="txtSenha" placeholder="Senha: " required/><br><br>
        <input type="submit" value="Entrar" />

    </form><br><br>

    Login Professores:
    <a href="controller/login_prof.php" >
    <button>Entrar</button></a><br><br>
    </center>
</body>
</html>


