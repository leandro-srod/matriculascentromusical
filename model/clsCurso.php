<?php

    class Curso{
        
        public $id_curso, $nome_curso, $dia, $horario, $prof_resp; 

        public function __construct( $id_curso=NULL, $nome_curso=NULL, $dia=NULL, $horario=NULL, $prof_resp=NULL){
            $this->id_curso = $id_curso;
            $this->nome_curso = $nome_curso;
            $this->dia = $dia;                    
            $this->horario = $horario;                    
            $this->prof_resp = $prof_resp;                    
                           
        }

    }