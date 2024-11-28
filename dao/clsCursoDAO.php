<?php
class CursoDAO{

// METODOS ESCREVER BANCO

//INSERIR
    public static function inserir($curso){
        $nome = $curso->nome_curso;
        $dia = $curso->dia;
        $horario = $curso->horario;
        $profresp = $curso->prof_resp;
        
        $sql = "INSERT INTO curso (nome_curso, dia, horario, prof_resp) 
                    VALUES ('$nome', '$dia', '$horario', '$profresp');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }

// METODO CONSULTAR BANCO

    public static function getCursos(){
        //retorna todas os cursos
        $sql = "SELECT id_curso, nome_curso, dia, horario,  prof_resp FROM curso ORDER BY id_curso;";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NULL){
            while(list($_id, $_nome, $_dia, $_horario, $_prof_resp) = mysqli_fetch_row($result)){
                $cursos=new Curso();
                $cursos->id_curso = $_id;
                $cursos->nome_curso = $_nome;
                $cursos->dia = $_dia;
                $cursos->horario = $_horario;
                $cursos->prof_resp = $_prof_resp;
                $lista->append($cursos);
                }
         }
         return $lista;
    }

    public static function excluir($idCurso){
        $sql = "DELETE FROM curso WHERE id_curso = $idCurso;";
        Conexao::executar($sql);
        }

    public static function getNomeCursoById($id){
            $sql = "SELECT nome_curso
                     FROM curso
                        WHERE id_curso = $id";
            $result = Conexao::consultar( $sql );
            if( $result != NULL ){
                $row = mysqli_fetch_assoc($result);
                if($row){
                    //$curso = new Curso();
                    //$curso->nome_curso = $row['nome_curso'];
                    $curso = $row['nome_curso'];
                    return $curso;
                }
            }
            return NULL;
        }

        public static function getCursoById($id){
            $sql = "SELECT id_curso, nome_curso, dia, horario, prof_resp FROM curso WHERE id_curso = $id";
            $result = Conexao::consultar( $sql );
            if( $result != NULL ){
                $row = mysqli_fetch_assoc($result);
                if($row){
                    $curso = new Curso();
                    $curso->id_curso = $row['id_curso'];
                    $curso->nome_curso = $row['nome_curso'];
                    $curso->dia = $row['dia'];
                    $curso->horario = $row['horario'];
                    $curso->prof_resp = $row['prof_resp'];
                    return $curso;
                }
            }else{
                return "Curso inexistente";
            }
             return NULL;
        }

   /* public static function getUsuarioByLoginSenha($nome_usuario, $senha){
        $sql = "SELECT id_usuario, nome_usuario
                FROM usuario 
                WHERE nome_usuario = '$nome_usuario' AND senha_usuario = '$senha' ";
              
        $result = Conexao::consultar($sql);
            if (mysqli_num_rows($result) == 0){
                return null;
            }else{
                list($_id_usuario, $_nome_usuario) = mysqli_fetch_row($result);
                $user = new Usuario($_id_usuario, $_nome_usuario);
                return $user;
            }
    }*/
    
public static function editar( $id, $nome, $dia, $horario, $prof_resp ){
        $id_curso = $id;
        $nome_curso = $nome;
        $dia = $dia;
        $horario = $horario;
        $prof_resp = $prof_resp;
              
        $sql = "UPDATE curso SET nome_curso = '$nome_curso',
                                   dia = '$dia',
                                   horario = '$horario',
                                   prof_resp = '$prof_resp'
                                   
                 WHERE id_curso = $id ;" ;
        Conexao::executar( $sql );

    }
}

/*
// METODO CONSULTAR BANCO - Retorna todos USUÁRIOS
public static function getUsuarios(){
    $sql = "SELECT idUsuario, nomeUsuario FROM usuario ORDER BY nomeUsuario;";
    $result = Conexao::consultar($sql);
    $lista = new ArrayObject();
    
    if($result != NULL){
        while(list($_id, $_nome) = mysqli_fetch_row($result)){
            $user=new Usuario();
            $user->idUsuario = $_id;
            $user->nomeUsuario = $_nome;
            $lista->append($user);
            }
     }
     return $lista;
}
*/



