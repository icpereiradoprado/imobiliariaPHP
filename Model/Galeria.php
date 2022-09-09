<?php
require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco
{
    private $id_picture;
    private $id_imovel;
    private $picture;


    function getPicture(){
        return $this->picture;
    }

    function setPicture($picture){
        $this->picture = $picture;
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
            if($this->id > 0)
            {
                $query = "UPDATE GALERIA SET PICTURE = :picture, ID_IMOVEL = :id_movel WHERE id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':picture' => $this->picture, ':id_movel' => $this->id_movel)))
                {
                    $result = $stmt->rowCount();
                }
            }
            else
            {
                $query = "INSERT INTO GALERIA (ID_PICTURE, PICTURE, ID_IMOVEL) VALUES (NULL, :picture, :id_movel)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':picture' => $this->picture, ':id_imovel' => $this->id_imovel)))
                {
                    $result = $stmt->rowCount();
                }
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
