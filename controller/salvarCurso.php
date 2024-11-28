<?php

include_once("../dao/clsConexao.php");
include_once("../dao/clsCursoDAO.php");
include_once("../model/clsCurso.php");

//INSERIR CURSO

if(isset($_REQUEST["inserir"])){
    
    $nome = $_POST["txtNome"];
    $dia = $_POST["txtDia"];
    $horario = $_POST["txtHorario"];
    $profresp = $_POST["txtProfResp"];
   
    $novoCurso = new Curso();
    $novoCurso->nome_curso = $nome;
    $novoCurso->dia = $dia;
    $novoCurso->horario = $horario;
    $novoCurso->prof_resp = $profresp;

    CursoDAO:: inserir($novoCurso);
    header("Location: cadastro_curso.php?nome=$nome");
    }

//EXCLUIR CURSO CADASTRADO

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    CursoDAO:: excluir($id);
    header("Location: cadastro_curso.php?cursoExcluido");
}

//EDITAR CURSO 

if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $id = $_REQUEST["id"] ;
    $nome = $_POST['txtNome'];
    $dia = $_POST['txtDia'];
    $horario = $_POST['txtHorario'];
    $prof_resp = $_POST['txtProfResp'];
    
    CursoDAO::editar($id, $nome, $dia, $horario, $prof_resp );
    header( "Location: cadastro_curso.php?cursoEditado");
}