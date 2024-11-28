<?php

if ( session_status() != PHP_SESSION_ACTIVE){
    session_start();
    }

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == false){
        header("Location: ../index.php");
    }else{
        include_once ("../dao/clsCursoDAO.php");
        include_once ("../dao/clsConexao.php");
        include_once ("../model/clsCurso.php");

     if(isset($_REQUEST["matriculaefetivada"])){
            $nome= $_GET["matriculaefetivada"];
            echo "<script>alert('Matricula de $nome efetivada com sucesso!');window.location.replace('matricula_aluno1.php');</script>"; 
        }

        $cursos = CursoDAO::getCursos();
        $cursosArray = $cursos->getArrayCopy(); // Converte para um array comum
        $maior_id_curso = max(array_column($cursosArray, 'id_curso'));
       // echo "O maior ID de curso é: " . $maior_id_curso;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Musical - Matrículas</title>
</head>
<body>
    <br>
    <center><img src="../img/CMET_logo.png" height="120px"/></center>
    Centro Musical - Matrículas<br><br>
    Insira abaixo os dados do aluno: <br><br>
    
   
<form action="SalvarMatricula.php?inserir" method="POST">
    Nome: <input type="text" name="txtNome" placeholder="Insira o nome... " required /><br><br>
    Data de nascimento: <input type="date" name="txtDtNasc" required/><br><br>
    CPF ou RG: <input type="text" name="txtCPF" placeholder="Insira o CPF ou RG... " required/><br><br>
    Telefone: <input type="text" name="txtTel" placeholder="Insira o telefone... " required/><br><br>
    E-mail: <input type="text" name="txtEmail" placeholder="Insira o e-mail: " required/><br><br>
        
    Selecione abaixo o gênero: <br>
    <input type="radio" id="genero" name="txtGenero" value="Mulher cisgenero">
        <label for="Mulher cisgenero">Mulher cisgênero</label><br>
    <input type="radio" id="genero" name="txtGenero" value="Mulher transgenero">
        <label for="Mulher transgenero">Mulher transgênero</label><br>
    <input type="radio" id="genero" name="txtGenero" value="Homem cisgenero">
        <label for="Homem cisgenero">Homem cisgênero</label><br>
    <input type="radio" id="genero" name="txtGenero" value="Homem transgenero">
        <label for="Homem transgenero">Homem transgênero</label><br>
    <input type="radio" id="genero" name="txtGenero" value="Nao binario">
        <label for="Nao binario">Não binário</label><br><br>    
    
    Selecione abaixo a origem: <br>
    <input type="radio" id="origem" name="txtOrigem" value="Comunidade em geral">
        <label for="Comunidade">Comunidade em geral</label><br>
    <input type="radio" id="origem" name="txtOrigem" value="Rede Municipal">
        <label for="Rede Municipal">Profissionais da Rede Municipal de Ensino</label><br>
    <input type="radio" id="origem" name="txtOrigem" value="Aluno Ens. Fund.">
        <label for="Ens.Fund.">Aluno do Ensino Fundamental</label><br><br>

    Caso seja aluno do Ensino Fundamental, insira abaixo a turma:<br>
    <input type="text" name="txtTurma" placeholder="Turma do Ens. Fund.: "/><br><br>
       
     Insira abaixo os cursos pretendidos: <br><br>

    O estudante deseja participar do Grupo Freirencanto?<br>
    <input type="radio" id="1" name="txtCurso01" value="1">
        <label for="1">Sim</label><br>
    <input type="radio" id="0" name="txtCurso01" value="0">
        <label for="0">Não</label><br><br>

    O estudante deseja participar do Cantar_o_lar?<br>
        <input type="radio" id="1" name="txtCurso02" value="1">
        <label for="1">Sim</label><br>
        <input type="radio" id="0" name="txtCurso02" value="0">
        <label for="0">Não</label><br><br>
    
    O estudante deseja participar da aula de Técnica Vocal? <br>
        <select name="txtCurso03" required>
        <option value="0"> Não deseja </option>
        <?php
            $i=0;
            while($i<=$maior_id_curso){        
                $tecnica = $cursos[$i]->nome_curso;
                $id_tecnica = $cursos[$i]->id_curso;
                 if (str_contains($tecnica, 'Técnica')){ // FAZER VERIFICAÇÃO PARA PALAVRA SEM ACENTO!!!!
                    echo '<option value="'.$id_tecnica.'">'. $tecnica.'</option>';
                }
                $i++;
            } 
        ?>
        </select><br><br>

    O estudante deseja participar da turma de Canto espontâneo e percussão?<br>
        <select name="txtCurso04" required>
         <option value="0">Não deseja</option>
         <?php
            $i=0;
            while($i<=$maior_id_curso){        
                $canto = $cursos[$i]->nome_curso;
                $id_canto = $cursos[$i]->id_curso;
                if (str_contains($canto, 'Canto')){
                    echo '<option value="'.$id_canto.'">'. $canto.'</option>';
                }
                $i++;
            } 
        ?>
        </select><br><br>

    O estudante deseja participar de aulas de instrumento? <br>Selecione uma turma abaixo:<br>
        <select name="txtCurso05" required>
         <option value="0">Não deseja</option>
         <?php
             $i=0;
             while($i<=$maior_id_curso){        
                $inst= $cursos[$i]->nome_curso;
                $id_inst = $cursos[$i]->id_curso;
                if (str_contains($inst, 'INST')){
                    echo '<option value="'.$id_inst.'">'. $inst.'</option>';
                  
                }
                $i++;
            } 
        ?>
        </select><br><br>
    
    O estudante deseja participar da turma de Teoria e Percepção Musical? <br>Selecione um horário abaixo:<br>
    <select name="txtCurso06" required>
        <option value="0">Não deseja</option>
             <?php
              $i=0;
                while($i<=$maior_id_curso){        
                    $teoria = $cursos[$i]->nome_curso;
                    $id_teoria = $cursos[$i]->id_curso;
                        if (str_contains($teoria, 'Teoria')){
                        echo '<option value="'.$id_teoria.'">'. $teoria.'</option>';
                        }
                    $i++;
                } 
            ?>
    </select><br><br>
    
    ATENÇÃO!!! Revise os dados acima antes de finalizar a matrícula!<br><br>
    <input type="submit" value="Finalizar" />
    <input type="reset" value="Limpar" />
    <input onClick="window.location.href='../index.php'" type="button" Value="Sair">
    <input onClick="window.open('relatorios.php')" type="button" Value="Impressão">
    </form>
    

</body>
</html>
<?php
    }

    ?>


