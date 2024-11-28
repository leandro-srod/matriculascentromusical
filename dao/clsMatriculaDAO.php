<?php
class MATRICULADAO{

// METODOS ESCREVER BANCO

//INSERIR
    public static function inserir($matricula){
        $data_horario = $matricula->data_horario; 
        $curso01 = $matricula->curso01_id; 
        $curso02 = $matricula->curso02_id; 
        $curso03 = $matricula->curso03_id; 
        $curso04 = $matricula->curso04_id; 
        $curso05 = $matricula->curso05_id; 
        $curso06 = $matricula->curso06_id; 
        $nome_aluno = $matricula->nome_aluno; 
       
        $sql = "INSERT INTO matricula (data_horario, curso01_id, curso02_id, curso03_id, curso04_id, curso05_id, curso06_id, nome_aluno ) 
        VALUES ('$data_horario','$curso01', '$curso02', '$curso03', '$curso04', '$curso05', '$curso06', '$nome_aluno');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

    // CONSULTAR MATRICULAS

    public static function getMatriculas(){
        //retorna todas as matriculas
        $sql = "SELECT id_matricula, data_horario, curso01_id, curso02_id, curso03_id, curso04_id, curso05_id, curso06_id, nome_aluno FROM matricula ORDER BY id_matricula;";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NULL){
            while(list($_id_matricula, $_data_horario, $_curso01_id, $_curso02_id, $_curso03_id, $_curso04_id, $_curso05_id, $_curso06_id, $_nome_aluno) = mysqli_fetch_row($result)){
                $matricula=new Matricula();
                $matricula->id_matricula = $_id_matricula;
                $matricula->data_horario = $_data_horario;
                $matricula->curso01_id = $_curso01_id;
                $matricula->curso02_id = $_curso02_id;
                $matricula->curso03_id = $_curso03_id;
                $matricula->curso04_id = $_curso04_id;
                $matricula->curso05_id = $_curso05_id;
                $matricula->curso06_id = $_curso06_id;
                $matricula->nome_aluno = $_nome_aluno;
                $lista->append($matricula);
                }
         }
         return $lista;
    }

public static function getMatriculasByID($id_mat){
    $sql = "SELECT id_matricula , data_horario, curso01_id, curso02_id, curso03_id, curso04_id, curso05_id, curso06_id, nome_aluno FROM matricula WHERE id_matricula = $id_mat";
    $result = Conexao::consultar($sql);
    if( $result != NULL ){
        $row = mysqli_fetch_assoc($result);
        if($row){
            $matricula=new Matricula();
            $matricula->id_matricula = $row['id_matricula'];
            $matricula->data_horario = $row['data_horario'];
            $matricula->curso01_id = $row['curso01_id'];
            $matricula->curso02_id = $row['curso02_id'];
            $matricula->curso03_id = $row['curso03_id'];
            $matricula->curso04_id = $row['curso04_id'];
            $matricula->curso05_id = $row['curso05_id'];
            $matricula->curso06_id = $row['curso06_id'];
            $matricula->nome_aluno = $row['nome_aluno'];
            return $matricula;
        }
    }else{
        return "Matricula inexistente";
    }
     return NULL;
}

// DANDO ERRO DE SQL syntax
public static function getIdMatriculasByNome($nome){
    $sql = "SELECT id_matricula FROM matricula WHERE nome_aluno = $nome";
    $result = Conexao::consultar($sql);
    if( $result != NULL ){
        $row = mysqli_fetch_assoc($result);
        if($row){
            $matricula=new Matricula();
            $matricula->id_matricula = $row['id_matricula'];
            return $matricula;
        }
    }else{
        return "Matricula inexistente";
    }
     return NULL;
}

}