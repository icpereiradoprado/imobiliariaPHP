<?php

require_once 'Banco.php';
require_once '../Conexao.php';

class Usuario extends Banco
{
    private $id;
    private $login;
    private $senha;
    private $permissao;

    //ID
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    //LOGIN
    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    //SENHA
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    //PERMISSAO
    public function getPermissao()
    {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    //METÓDOS HERDADOS DA CLASSE ABSTRATA BANCO

    public function save()
    {
        $result = false;

        //criar objeto do tipo conexão
        $conexao = new Conexao();

        //criar query de inserção passando os atributos que serão armazenados
        $query = "INSERT INTO USUARIO (ID, LOGIN, SENHA, PERMISSAO) values (null,:login,:senha,:permissao)";

        //cria a conexão com o banco de dados

        if($conn = $conexao->getConection())
        {
            //Prepara a query para execução
            $stmt = $conn->prepare($query);
            //executa a query
            if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao'=> $this->permissao)))
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
     $query = "SELECT * FROM USUARIO";
    
     //prepara a query para execução
     $stmt = $conn->prepare($query);

     //Cria um array para receber o resultado da seleção
     $result = array();

     //executa a query
     if($stmt->execute())
     {
        //o resultado da busca será retornado como um objeto da classe 
        while ($rs = $stmt->fetchObject(Usuario::class))
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