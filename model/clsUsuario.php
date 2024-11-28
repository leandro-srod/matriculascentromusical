<?php

    class Usuario{

        public $nome_usuario, $senha_usuario;

        public function __construct( $nome_usuario=NULL, $senha_usuario= NULL){

            $this->nome_usuario = $nome_usuario;
            $this->senha_usuario = $senha_usuario;                     
        }

    }