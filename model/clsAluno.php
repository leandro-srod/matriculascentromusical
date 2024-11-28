<?php

    class Aluno{
        
        public $nome_aluno, $dt_nasc, $cpf, $telefone, $email, $genero, $origem, $turma; 

        public function __construct( $nome_aluno=NULL, $dt_nasc=NULL, $cpf=NULL, $telefone=NULL, $email=NULL, $genero=NULL, $origem=NULL, $turma=NULL){
            $this->nome_aluno = $nome_aluno;
            $this->dt_nasc = $dt_nasc;                    
            $this->cpf = $cpf;                    
            $this->telefone = $telefone;                    
            $this->email = $email;                    
            $this->genero = $genero;                    
            $this->origem = $origem;                    
            $this->turma = $turma;                    
        }

    }