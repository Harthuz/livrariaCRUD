<?php
include_once 'conectar.php';

class Autor{
    private $codigo;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nasc;
    private $conn;
    
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($ccodigo){
        $this->codigo = $ccodigo;
    }

    public function getNome(){
        return $this->nomeautor;
    }

    public function setNome($nnomeautor){
        $this->nomeautor = $nnomeautor;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function setSobrenome($ssobrenome){
        $this->sobrenome = $ssobrenome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($eemail){
        $this->email = $eemail;
    }

    public function getNasc(){
        return $this->nasc;
    }

    public function setNasc($nnasc){
        $this->nasc = $nnasc;
    }

    function salvar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autor values (null,?,?,?,?)");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);

            if ($sql->execute() == 1) {
                return "Registro salvo com sucesso!";
            }

            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
    }

    function listar(){
        try{
            $this-> conn = new Conectar();
            $sql = $this ->conn->query("select * from autor order by NomeAutor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }

        catch(PDOException $exc){
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    function exclusao1() {
        try {
            $this->conn = new Conectar();
    
            $sql = $this->conn->prepare("SELECT * FROM autor WHERE Cod_autor = ?");
            @$sql->bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            $sql->execute();
            $autor = $sql->fetch(PDO::FETCH_ASSOC);
    
            if (!$autor) {
                return null; 
            }
    
            $this->conn = null;
            return $autor;
        } catch (PDOException $exc) {
            echo "Erro ao buscar o autor: " . $exc->getMessage();
            return null;
        }
    }    

    function exclusao() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autor where Cod_autor = ?");
            @$sql->bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluido com sucesso";
            } else {
                return "Erro na exclusão!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao excluir. " . $exc->getMessage();
        }
    }

    function consultar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM Autor WHERE NomeAutor LIKE ?");
            $nome = $this->getNome() . '%'; 
            $sql->bindParam(1, $nome, PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    function alterar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from Autor where NomeAutor like ?");
            @$sql->bindParam(1, $this->getNome(), type: PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }

    function alterar2() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update Autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_autor like ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCodigo(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
    }
}
?>