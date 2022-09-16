<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco
{
    private $id_picture;
    private $id_imovel;
    private $path;

    function getIdPicture(){
        return $this->picture;
    }

    function setIdPicture($id){
        $this->id_picture = $id;
    }

    function getPath(){
        return $this->path;
    }

    function setPath($path){
        $this->path = $path;
    }

    function getIdImovel(){
        return $this->id_imovel;
    }

    function setIdImovel($id){
        $this->id_imovel = $id;
    }

    function getId(){
        return $this->id_picture;
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
            $query = "INSERT INTO GALERIA (ID_PICTURE, ID_IMOVEL, path) VALUES (NULL, :id_imovel, :path)";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id_imovel' => $this->id_imovel, ':path' => $this->path)))
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

        $query = "DELETE FROM galeria WHERE ID_PICTURE = :id";

        $stmt = $conn->prepare($query);

        if($stmt->execute(array(':id'=> $id)))
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
        $query = "SELECT * FROM GALERIA WHERE ID_IMOVEL = :id_imovel";
        
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
                //print_r($rs);
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

    public function listAllPicturesTipo($idSelectedImovel = null)
    {
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        
        //cria query da seleção
        $query = "SELECT * FROM GALERIA WHERE ID_IMOVEL = :id_imovel";
        
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
                //print_r($rs);
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
