<?php

if ( session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == false){
        header("Location: ../index.php");
    }else{
        include_once ("../dao/clsMatriculaDAO.php");
        include_once ("../model/clsMatricula.php");
        include_once ("../dao/clsConexao.php"); 
    }

if(isset($_REQUEST["matriculaefetivada"])){
            $nome= $_GET["matriculaefetivada"];
           // echo "<script>alert('Matricula de $nome efetivada com sucesso!');window.location.replace('matricula_aluno1.php=$nome');</script>"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Musical - Impressão</title>
</head>
<body>
    <br>
    <center><img src="../img/CMET_logo.png" height="120px"/></center>
    <h2>Deseja imprimir o comprovante de matrícula de <?php echo ($nome); ?>? </h2>

    <input onClick="window.location.href='relatorios.php?imprimir=<?php echo($nome) ?>'" type="button" Value="Sim">
    <input onClick="window.location.href='matricula_aluno1.php'" type="button" Value="Não">
            
        <?php
        
    }
        ?>
</body>
</html>




