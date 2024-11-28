<?php

    class Matricula{
        
        public $id_matricula, $data_horario, $curso01_id, $curso02_id, $curso03_id, $curso04_id, $curso05_id, $curso06_id, $nome_aluno; 

        public function __construct($id_matricula=NULL, $data_horario=NULL, $curso01_id=NULL, $curso02_id=NULL, $curso03_id=NULL, $curso04_id=NULL, $curso05_id=NULL, $curso06_id=NULL, $nome_aluno=NULL){
            $this->id_matricula=$id_matricula; 
            $this->data_horario=$data_horario; 
            $this->curso01_id=$curso01_id; 
            $this->curso01_id=$curso01_id; 
            $this->curso02_id=$curso02_id; 
            $this->curso03_id=$curso03_id; 
            $this->curso04_id=$curso04_id; 
            $this->curso05_id=$curso05_id; 
            $this->curso06_id=$curso06_id; 
            $this->nome_aluno=$nome_aluno; 
                                         
        }

    } 