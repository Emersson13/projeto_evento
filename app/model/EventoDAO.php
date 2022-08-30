<?php
require_once("../classes/Evento.php");
require_once("Conexao.php");

class EventoDAO{
    private $tabela = "evento";

    // Estamos passando como parâmetro uma variável do tipo Evento, ou seja, o método irá esperar receber um valor que seja um objeto da classe Evento.
    public function inserir(Evento $evento){
        $sql = "INSERT INTO {$this->tabela} VALUES(NULL,:nome,:dataEvento,:foto)";
        $preparacao = Conexao::getConexao()->prepare($sql);

        $preparacao->bindValue(":nome",$evento->nomeEvento);
        $preparacao->bindValue(":dataEvento",$evento->dataEvento);
        $preparacao->bindValue(":foto",$evento->banner);

       
        $preparacao->execute();
        

        if($preparacao->rowCount() > 0){
            return true;
        }   
        else{
            return false;
        }   
         
    }
    public function consultar($dataBr = false){
        $sql = "SELECT * FROM {$this->tabela}";
        $preparacao = Conexao::getConexao()->prepare($sql);

        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            $resultado =  $preparacao->fetchALL(PDO::FETCH_ASSOC);// o método fecthALL() retorna todos os registros do banco de dados e o valor PDO::FETCH_ASSOC, faz a associação do nome dos campos da tabela com os indices do vetor.
            if($dataBr){            
                foreach($resultado as $indice => $itens){
                    $data = new DateTime($itens["data_evento"]);
                    $resultado[$indice]["data_evento"] = $data->format("d/m/Y");
                }            
            }
           return $resultado;
        }
        else{
            return false;
        }
    }
    public function consultarUnico($id){
        $sql = "SELECT * FROM {$this->tabela} WHERE id_evento = :id";
        $preparacao = Conexao::getConexao()->prepare($sql);

        $preparacao->bindValue(":id", $id);

        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            return  $preparacao->fetchALL(PDO::FETCH_ASSOC);// o método fecthALL() retorna todos os registros do banco de dados e o valor PDO::FETCH_ASSOC, faz a associação do nome dos campos da tabela com os indices do vetor.
        }
        else{
            return false;
        }
    }
    public function atualizar(Evento $evento, $id){
        $sql = "UPDATE {$this->tabela} SET 
        nome_evento = :nome, 
        data_evento = :dataEvento, 
        foto_evento = :foto WHERE id_evento = :id";

        $preparacao = Conexao::getConexao()->prepare($sql);

        $preparacao->bindValue(":nome", $evento->nomeEvento);
        $preparacao->bindValue(":dataEvento", $evento->dataEvento);
        $preparacao->bindValue(":foto", $evento->banner);
        $preparacao->bindValue(":id",$id);
    }
    public function deletar(){

    }
}



