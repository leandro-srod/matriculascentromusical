<?php

include_once("../model/clsUsuario.php");
include_once("../dao/clsUsuarioDAO.php");
include_once("../dao/clsConexao.php");

$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];
$senha = md5( $senha );
$user = UsuarioDAO::getUsuarioByLoginSenha( $login , $senha );

if(isset($user)) {
	session_start();
	$_SESSION["logado"] = true;
	header("Location: matricula_aluno1.php");
}else{
	header("Location: ../index.php?usuarioInvalido");
}