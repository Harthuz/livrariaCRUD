<?php
include_once 'conectar.php';

class Livro{
    private $codigo;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $paginas;
    private $conn;
    
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($ccodigo){
        $this->codigo = $ccodigo;
    }



    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($ttitulo){
        $this->titulo = $ttitulo;
    }



    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($ccategoria){
        $this->categoria = $ccategoria;
    }



    public function getISBN(){
        return $this->isbn;
    }

    public function setISBN($iisbn){
        $this->isbn = $iisbn;
    }



    public function getIdioma(){
        return $this->idioma;
    }

    public function setIdioma($iidioma){
        $this->idioma = $iidioma;
    }



    public function getPaginas(){
        return $this->paginas;
    }

    public function setPaginas($ppaginas){
        $this->paginas = $ppaginas;
    }

    function salvar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");

            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getPaginas(), PDO::PARAM_INT); // Use PDO::PARAM_INT para inteiros

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
            $sql = $this ->conn->query("select * from livro order by Titulo");
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
    
            // Consulta para verificar se o código existe e retornar os dados do livro
            $sql = $this->conn->prepare("SELECT * FROM livro WHERE Cod_livro = ?");
            @$sql->bindParam(1, $this->getCodigo(), PDO::PARAM_STR);
            $sql->execute();
            $livro = $sql->fetch(PDO::FETCH_ASSOC);
    
            if (!$livro) {
                return null; // Se o livro não for encontrado, retorna null
            }
    
            $this->conn = null;
            return $livro; // Retorna os dados do livro como array associativo
        } catch (PDOException $exc) {
            echo "Erro ao buscar o livro: " . $exc->getMessage();
            return null;
        }
    }    

    function exclusao() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from livro where Cod_livro = ?");
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
            $sql = $this->conn->prepare("SELECT * FROM Livro WHERE Titulo LIKE ?");
            $titulo = $this->getTitulo() . '%'; 
            $sql->bindParam(1, $titulo, PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
}
?>