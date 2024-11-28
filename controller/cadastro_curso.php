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
        
if(isset($_REQUEST["nome"])){
    $nome= $_REQUEST["nome"];
    echo "<script>alert('Curso $nome cadastrado com sucesso!');window.location.replace('cadastro_curso.php');</script>"; 
             
}

if(isset($_REQUEST["cursoExcluido"])){
    echo "<script>alert('Curso excluído com sucesso!');window.location.replace('cadastro_curso.php');</script>"; 
}

if(isset($_REQUEST["cursoEditado"])){
    echo "<script>alert('Curso editado com sucesso!');window.location.replace('cadastro_curso.php');</script>"; 
}

    

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cursos 2025</title>
</head>
<body>
    <br>
       
      <h1>Centro Musical - Cadastrar Cursos:</h1>
      Obs.: os cursos de instrumento devem ser cadastrados com o prefixo INST antes do nome.<br><br>

      <form method="POST" action="salvarCurso.php?inserir">

            <label>Nome Curso:</label>
            <input type="text" placeholder="Insira o nome..." name="txtNome" required/>
            <br><br>
            <label>Dia:</label>
            <input type="text" placeholder="Insira o dia..." name="txtDia" required/>
            <br><br>
            <label>Horário:</label>
            <input type="text" placeholder="Insira o horário..." name="txtHorario" required/>
            <br><br>
            <label>Professor responsável:</label>
            <input type="text" placeholder="Insira o nome do professor..." name="txtProfResp" required/>
            <br><br>
            <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />
                 
        </form><br><hr><br>

        <table border="2">
        <caption>Cursos cadastrados</caption>
            <tr>
                <th>Nome</th>
                <th>Dia</th>
                <th>Horário</th>
                <th>Responsável</th>
                <th>Editar</th>
                <th>Excluir</th>    
            </tr>
            
        <?php
           $cursos = CursoDAO::getCursos();
           
           if(count($cursos) == 0){
               echo "<h1>Nenhum Curso cadastrado!</h1>";
           }else{
            foreach($cursos as $cur){
                $id = $cur->id_curso;
                $nome = $cur->nome_curso;
                $dia = $cur->dia;
                $horario = $cur->horario;
                $resp = $cur->prof_resp;
                echo "  <tr>
                            <td>$nome</td>
                            <td>$dia</td>
                            <td>$horario</td>
                            <td>$resp</td>
                            <td><a href='editarCursos.php?id=$id'><button>Editar</button></a></td>
                        
                        <td><a onclick='return confirm(\"Você tem certeza que deseja apagar?\")'
                        href='salvarCurso.php?excluir&id=$id'>
                                <button>Excluir</button></a></td>
                    </tr>";


            }
        }
    }
        ?>
        </table><br><hr><tr><br>
        
      
    <a href="../index.php" ><button>Início</button></a>
    
    </body>
    </html>
