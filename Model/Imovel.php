<?php
require_once 'Banco.php';
require_once '../Conexao.php';

class Imovel extends Banco
{
    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    //ID
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    //Descricao
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    //Foto
    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    //Valor
    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    //Tipo
    public function getTipo()
    {
        $retorno = "";
        if($this->tipo == 'C')
        {
            $retorno = "Comprar";
        }
        else if($this->tipo == 'A')
        {
            $retorno = "Alugar";
        }
        return $retorno;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    //Métodos abstratos herdados da classe Banco;

    public function save()
    {
        $result = false;

        //criar objeto do tipo conexão
        $conexao = new Conexao();

        //criar query de inserção passando os atributos que serão armazenados
        $query = "INSERT INTO IMOVEL (ID, DESCRICAO, FOTO, VALOR,TIPO) values (null,:descricao,:foto,replace(:valor,',','.'),:tipo)";

        //cria a conexão com o banco de dados

        if($conn = $conexao->getConection())
        {
            //Prepara a query para execução
            $stmt = $conn->prepare($query);
            //executa a query
            if($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor'=> $this->valor, ':tipo'=> $this->tipo)))
            {
                $result = $stmt->rowCount();
            }
        }
        return $result;
    }

    public function remove($id)
    {
        
    }

    public function find($id)
    {
        
    }

    public function listAll()
    {
     //cria um objeto do tipo conexao
     $conexao = new Conexao();
     
     //cria a conexao com o banco de dados
     $conn = $conexao->getConection();

     //cria query da seleção
     $query = "SELECT * FROM IMOVEL";
    
     //prepara a query para execução
     $stmt = $conn->prepare($query);

     //Cria um array para receber o resultado da seleção
     $result = array();

     //executa a query
     if($stmt->execute())
     {
        //o resultado da busca será retornado como um objeto da classe 
        while ($rs = $stmt->fetchObject(Imovel::class))
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

    public function count()
    {
        
    }
}
?>