<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco
{
    private $id_picture;
    private $id_imovel;
    private $picture;
    private $pictureTipo;
    private $path;


    function getPicture(){
        return $this->picture;
    }

    function setPicture($picture){
        $this->picture = $picture;
    }

    function getPictureTipo(){
        return $this->picture;
    }

    function setPictureTipo($pictureTipo){
        $this->pictureTipo = $pictureTipo;
    }

    function getPath(){
        return $this->path;
    }

    function setPath($path){
        $this->path = $path;
    }

    function setIdImovel($id){
        $this->id_imovel = $id;
    }

    
    

    public function save()
    {
        $result = false;

        //criar objeto do tipo conexão
        $conexao = new Conexao();

        //criar query de inserção passando os atributos que serão armazenados
        

        //cria a conexão com o banco de dados
        
        if($conn = $conexao->getConection())
        {
            
            $query = "INSERT INTO GALERIA (ID_PICTURE, PICTURE, ID_IMOVEL, PICTURE_TIPO, PATHADD) VALUES (NULL, :picture, :id_imovel, :pictureTipo, :pathadd)";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':picture' => $this->picture, ':id_imovel' => $this->id_imovel, ':pictureTipo' => $this->pictureTipo, ':pathadd' => $this->path)))
            {
                $result = $stmt->rowCount();
            }
            
        }
        return $result;
    }

    public function remove($id)
    {
        $result = false;

        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "DELETE FROM GALERIA WHERE ID_PICTURE = :id";

        $stmt = $conn->prepare($query);

        if($stmt->execute(array(':id'=> $id_picture)))
        {
            $result = true;
        }

        return $result;
    }

    public function find($id)
    {
    
    }

    public function listAllPictures($idSelectedImovel)
    {
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();

        //cria query da seleção
        $query = "SELECT PATHADD FROM GALERIA WHERE ID_IMOVEL = :id_imovel";
        
        //prepara a query para execução
        $stmt = $conn->prepare($query);

        //Cria um array para receber o resultado da seleção
        $result = array();

        //executa a query
        if($stmt->execute(array(':id_imovel' => $idSelectedImovel)))
        {
            //o resultado da busca será retornado como um objeto da classe 
            while ($rs = $stmt->fetchObject(Galeria::class))
            {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }
        else
        {
            $result = false;
        }

        return $result;
    }

    public function listAll()
    {
        
    }

    public function listLastImoveis()
    {
     
    }

    public function count()
    {
        
    }
}
?>
