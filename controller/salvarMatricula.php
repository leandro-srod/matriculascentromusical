<?php

include_once("../dao/clsConexao.php");
include_once("../dao/clsAlunoDAO.php");
include_once("../dao/clsMatriculaDAO.php");
include_once("../model/clsAluno.php");
include_once("../model/clsMatricula.php");
include_once ("../dao/clsCursoDAO.php");
include_once ("../model/clsCurso.php");

$cursos = CursoDAO::getCursos();
$cursosArray = $cursos->getArrayCopy(); // Converte para um array comum
$maior_id_curso = max(array_column($cursosArray, 'id_curso')); // Retorna o maior valor de ID dos cursos cadastrados

date_default_timezone_set('America/Sao_Paulo');

//INSERIR DADOS DO ALUNO

if(isset($_REQUEST["inserir"])){
    $nome = $_POST["txtNome"];
    $dt_nasc = $_POST["txtDtNasc"];
    $dt_nasc_format = DateTime::createFromFormat('Y-m-d', $dt_nasc);
    $dt_nasc_format = $dt_nasc_format->format('d/m/Y');
    $cpf = $_POST["txtCPF"];
    $tel = $_POST["txtTel"];
    $email = $_POST["txtEmail"];
    $genero = $_POST["txtGenero"];
    $origem = $_POST["txtOrigem"];
    $turma = $_POST["txtTurma"];

    $novo_aluno = new Aluno();
        $novo_aluno->nome_aluno = $nome;
        $novo_aluno->dt_nasc = $dt_nasc_format;
        $novo_aluno->cpf = $cpf;
        $novo_aluno->telefone = $tel;
        $novo_aluno->email = $email;
        $novo_aluno->genero = $genero;
        $novo_aluno->origem = $origem;
        $novo_aluno->turma = $turma;

        ALunoDAO:: inserir($novo_aluno);
                
//INSERIR CURSOS ESCOLHIDOS ALUNO

    $curso01_id = $_POST["txtCurso01"];
    if ($curso01_id == "1"){
        $i=0;
            while($i<= $maior_id_curso){        
            $cursos_nome = $cursos[$i]->nome_curso;
            $i++;
                if (str_contains($cursos_nome, 'Freirencanto')){
                $curso01_id = $i;
                }
            } 
    }else{
        $curso01_id == NULL;
    }
    

    $curso02_id = $_POST["txtCurso02"];
    if ($curso02_id == "1"){
        $i=0;
            while($i<= $maior_id_curso){        
            $cursos_nome = $cursos[$i]->nome_curso;
            $i++;
                if (str_contains($cursos_nome, 'Cantar')){
                $curso02_id = $i;
                }
            } 
    }else{
        $curso02_id == NULL;
    }
   
    $curso03_id = $_POST["txtCurso03"];
    
    $curso04_id = $_POST["txtCurso04"];
  
    $curso05_id = $_POST["txtCurso05"];
   
    $curso06_id = $_POST["txtCurso06"];
   
    $datahorario = Date('Y-m-d H:i:s');
        
    $nova_matricula = new Matricula();
        $nova_matricula->data_horario = $datahorario;
        $nova_matricula->curso01_id = $curso01_id;
        $nova_matricula->curso02_id = $curso02_id;
        $nova_matricula->curso03_id = $curso03_id;
        $nova_matricula->curso04_id = $curso04_id;
        $nova_matricula->curso05_id = $curso05_id;
        $nova_matricula->curso06_id = $curso06_id;
        $nova_matricula->nome_aluno = $nome;
        
       MatriculaDAO:: inserir($nova_matricula);        
       header("Location: impressao.php?matriculaefetivada=$nome");
    
}