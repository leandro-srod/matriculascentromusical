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
        include_once ("../model/clsCurso.php"); 
        include_once ("../dao/clsCursoDAO.php"); 
		date_default_timezone_set('America/Sao_Paulo');
    }

if(isset($_REQUEST["imprimir"])){
	$nome = $_GET["imprimir"];
	$id_mat = MAtriculaDAO::getIdMatriculasByNome($nome);
   
	// echo "Enviar para a impressao do relatorio $nome"; 
	require_once("../FPDF/fpdf.php"); // Biblioteca para gerar PDF
	//define('FPDF_FONTPATH', 'FPDF/font/');

	$matricula = MatriculaDAO::getMatriculasById($id_mat); 
	$data_horario = $matricula->data_horario; 
	$nome = $matricula->nome_aluno;
	$curso01 = $matricula->curso01_id;
	$curso01_nome = CursoDAO::getNomeCursoById($curso01);
	if($curso01_nome == NULL){
		$curso01_nome = "Nenhum";
	}
	$curso02 = $matricula->curso02_id;
	$curso02_nome = CursoDAO::getNomeCursoById($curso02);
	if($curso02_nome == NULL){
		$curso02_nome = "Nenhum";
	}
	$curso03 = $matricula->curso03_id;
	$curso03_nome = CursoDAO::getNomeCursoById($curso03);
	if($curso03_nome == NULL){
		$curso03_nome = "Nenhum";
	}
	$curso04 = $matricula->curso04_id;
	$curso04_nome = CursoDAO::getNomeCursoById($curso04);
	if($curso04_nome == NULL){
		$curso04_nome = "Nenhum";
	}
	$curso05 = $matricula->curso05_id;
	$curso05_nome = CursoDAO::getNomeCursoById($curso05);
	if($curso05_nome == NULL){
		$curso05_nome = "Nenhum";
	}
	$curso06 = $matricula->curso06_id;
	$curso06_nome = CursoDAO::getNomeCursoById($curso06);
	if($curso06_nome == NULL){
		$curso06_nome = "Nenhum";
	}
	$informacoes = "ATENÇÃO
						1. PERÍODO DE INSCRIÇÃO:
						- DE 04/03/2024 ATÉ 08/03/2024 -> COMUNIDADE ESCOLAR
						- DE 11/03/2024 ATÉ 13/03/2024 - > COMUNIDADE EM GERAL
						2. ESTUDANTES DO CMET PAULO FREIRE TÊM PRIORIDADE DE INSCRIÇÃO;
						3. O CRITÉRIO PARA CONSEGUIR VAGA NO(S) CURSO(S) ESCOLHIDOS(S) É A ORDEM DE INSCRIÇÃO (DATA E HORA), DENTRO DO NÚMERO DE VAGAS OFERECIDO;
						4. A IDADE MÍNIMA PARA PARTICIPAR DO(S) CURSOS(S) É 15 ANOS;
						5. PARA PARTICIPAR DO GRUPO FREIRENCANTO (CORAL), O (A) ESTUDANTE PARTICIPARÁ DE UMA AVALIAÇÃO E, CASO NÃO SEJA APROVADO, PODERÁ PARTICIPAR DO CURSO DE TÉCNICA VOCAL; 
						6. PARA PARTICIPAR DOS CURSOS É PRECISO TER INSTRUMENTO PARA PRATICAR EM CASA;
						7. AS LISTAS DOS ESTUANTES CONTEMPLADOS EM CADA CURSO SERÃO DIVULGADAS ÀS 17H DO DIA 15/03/2025;
						8. VOCÊ PODE CONSULTAR AS LISTAS PRESENCIALMENTE NO ÁTRIO DO CMET PAULO FREIRE OU PELO INSTAGRAM @CMETPAULOFREIRE
						9. AS AULAS INICIAM EM 18/03/2025.";

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Sety(50);
	
	$pdf->Image('../img/CMET_logo.png', 90, 10, -280);
	$pdf->Cell(190,10,'COMPROVANTE DE MATRÍCULA - CENTRO MUSICAL', 1, 1, 'C');
	$pdf->SetFont('');

	$pdf->Cell(190,10, $nome, 1, 1, 'C');
	$pdf->Cell(190,10, "Matrícula numero: ". $id_mat, 1, 1, 'L');
	$pdf->Cell(190,10, "Dia / Horario: ".date('d/m/Y H:i:s', strtotime($data_horario)), 1, 1, 'L'); // Formatar Data horario!!!!
	$pdf->Cell(190,10, "Curso Pretendido 1: ".$curso01_nome, 1, 1, 'L');
	$pdf->Cell(190,10, "Curso Pretendido 2: ". $curso02_nome, 1, 1, 'L');
	$pdf->Cell(190,10, "Curso Pretendido 3: ". $curso03_nome, 1, 1, 'L');
	$pdf->Cell(190,10, "Curso Pretendido 4: ". $curso04_nome, 1, 1, 'L');
	$pdf->Cell(190,10, "Curso Pretendido 5: ". $curso05_nome, 1, 1, 'L');
	$pdf->Cell(190,10, "Curso Pretendido 6: ". $curso06_nome, 1, 1, 'L');
	$pdf->MultiCell(0,10, $informacoes);
	$pdf->Output();
} 
	
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
    <table border="2">
        <caption>Matrículas realizadas</caption>
            <tr>
                <th>Nome</th>
                <th>Horário</th>
                <th>Curso Opção 01</th>
                <th>Curso Opção 02</th>
                <th>Curso Opção 03</th>
                <th>Curso Opção 04</th>
                <th>Curso Opção 05</th>
                <th>Curso Opção 06</th>
               
            </tr>
            
        <?php
		
           $matriculas = MATRICULADAO::getMatriculas();
		   $cursos = CursoDAO::getCursos();
		            
           if(count($matriculas) == 0){
               echo "<h1>Nenhuma matrícula realizada!</h1>";
           }else{

			foreach($matriculas as $mat){
                $id = $mat->id_matricula;
				$nome_aluno = $mat->nome_aluno;
				$horario = $mat->data_horario;
				$horario_format = date('d/m/Y H:i:s', strtotime($horario));
		              
                $curso01 = $mat->curso01_id;
				$nome_curso01 = CURSODAO::getNomeCursoById($curso01);
					if($curso01 == 0 || $curso01 == NULL){
						//$nome_curso01 = new Curso;
						//$nome_curso01->nome_curso = " - ";
						$nome_curso01 = " - ";
					}

				$curso02 = $mat->curso02_id;
				$nome_curso02 = CURSODAO::getNomeCursoById($curso02);
				if($curso02 == 0 || $curso02 == NULL){
					//$nome_curso02 = new Curso;
					//$nome_curso02->nome_curso = " - ";
					$nome_curso02 = " - ";
				}


                $curso03 = $mat->curso03_id;
				$nome_curso03 = CURSODAO::getNomeCursoById($curso03); 
				if($curso03 == 0 || $curso03 == NULL){
					//$nome_curso03 = new Curso;
					//$nome_curso03->nome_curso = " - ";
					$nome_curso03 = " - ";
				}

                $curso04 = $mat->curso04_id;
				$nome_curso04 = CURSODAO::getNomeCursoById($curso04); 
				if($curso04 == 0 || $curso04 == NULL){
					//$nome_curso04 = new Curso;
					//$nome_curso04->nome_curso = " - ";
					$nome_curso04 = " - ";
				}
				
                $curso05 = $mat->curso05_id;
				$nome_curso05 = CURSODAO::getNomeCursoById($curso05); 
				if($curso05 == 0 || $curso05 == NULL){
					//$nome_curso05 = new Curso;
					//$nome_curso05->nome_curso = " - ";
					$nome_curso05 = " - ";
				}
				
			    $curso06 = $mat->curso06_id;
				$nome_curso06 = CURSODAO::getNomeCursoById($curso06); 
				if($curso06 == 0 || $curso06 == NULL){
					//$nome_curso06 = new Curso;
					//$nome_curso06->nome_curso = " - ";
					$nome_curso06 = " - ";
					
				}

                echo "  <tr>
                            <td>$nome_aluno</td>
                            <td>$horario_format</td>
                            <td>$nome_curso01</td>
                            <td>$nome_curso02</td>
                            <td>$nome_curso03</td>
                            <td>$nome_curso04</td>
                            <td>$nome_curso05</td>
                            <td>$nome_curso06</td>
                            
                            <td><a href='relatorios.php?imprimir=$id'><button>Imprimir</button></a></td>
                        
                       
                    </tr>";


            }
        }
    
        ?>
        </table><br><hr><tr><br>
 
</body>
</html>