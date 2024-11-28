<?php

if ( session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == false){
        header("Location: ../index.php");
    }else{

        include_once ("../model/clsCurso.php");
        include_once ("../dao/clsCursoDAO.php");
        include_once ("../dao/clsConexao.php");

        $id= $_GET['id'];
        $curso_edit = CursoDAO::getCursoById($id);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CURSOS</title>
</head>
<body>

<h1>Edição de Curso Cadastrado:</h1><br>

<form method="POST" action="salvarCurso.php?editar&id=<?=$id ?>"><br>
    <label>Nome Curso:</label>
        <input type="text" name="txtNome" value="<?=$curso_edit->nome_curso ?>" required required/><br><br>
    <label>Dia:</label>
        <input type="text" name="txtDia" value="<?=$curso_edit->dia ?>"required/><br><br>
    <label>Horário:</label>
        <input type="text" name="txtHorario" value="<?=$curso_edit->horario ?>" required/><br><br>
    <label>Professor responsável:</label>
        <input type="text" name="txtProfResp" value="<?=$curso_edit->prof_resp ?>" required/><br><br>
    <input type="submit" value="Salvar" />
   
</form><br><hr><br>
<a href="cadastro_curso.php" ><button>Voltar</button></a>
    
  
</body>
</html>
<?php
    }

?>