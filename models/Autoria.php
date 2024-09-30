<?php
include_once 'conectar.php';

class Autoria{
    private $codigoAutor;
    private $codigoLivro;
    private $dataLancamento;
    private $editora;
    private $conn;
    
    public function getCodigoAutor(){
        return $this->codigoAutor;
    }

    public function setCodigoAutor($ccodigoautor){
        $this->codigoAutor = $ccodigoautor;
    }



    public function getCodigoLivro(){
        return $this->codigoLivro;
    }

    public function setCodigoLivro($ccodigoLivro){
        $this->codigoLivro = $ccodigoLivro;
    }



    public function getDataLancamento(){
        return $this->dataLancamento;
    }

    public function setDataLancamento($ddataLancamento){
        $this->dataLancamento = $ddataLancamento;
    }



    public function getEditora(){
        return $this->editora;
    }

    public function setEditora($eeditora){
        $this->editora = $eeditora;
    }

    function salvar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
            @$sql->bindParam(1, $this->getCodigoAutor(), PDO::PARAM_INT);
            @$sql->bindParam(2, $this->getCodigoLivro(), PDO::PARAM_INT);
            @$sql->bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);

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
            $sql = $this ->conn->query("select * from autoria order by Editora");
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
    
            $sql = $this->conn->prepare("SELECT * FROM autoria WHERE Cod_autor = ? AND Cod_livro = ?");
            @$sql->bindParam(1, $this->getCodigoAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
            $sql->execute();
            $autoria = $sql->fetch(PDO::FETCH_ASSOC);
    
            if (!$autoria) {
                return null;
            }
    
            $this->conn = null;
            return $autoria;
        } catch (PDOException $exc) {
            echo "Erro ao buscar a autoria: " . $exc->getMessage();
            return null;
        }
    }    

    function exclusao() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autoria where Cod_autor = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getCodigoAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("SELECT * FROM Autoria WHERE Editora LIKE ?");
            $nome = $this->getEditora() . '%'; 
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
            $sql = $this->conn->prepare("select * from Autoria where Cod_autor = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getCodigoAutor(), type: PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodigoLivro(), type: PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update Autoria set Cod_autor = ?, Cod_livro = ?, DataLancamento = ?, Editora = ? where Cod_autor = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getCodigoAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodigoLivro(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCodigoAutor(), PDO::PARAM_STR);
            @$sql->bindParam(6, $this->getCodigoLivro(), PDO::PARAM_STR);
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