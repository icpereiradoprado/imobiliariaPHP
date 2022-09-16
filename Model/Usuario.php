<?php

require_once 'Banco.php';
require_once 'Conexao.php';

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
        $this->senha = md5($senha);
    }

    //PERMISSAO
    public function getPermissao()
    {
        $retorno = "";
        if($this->permissao == 'C')
        {
            $retorno = "Comum";
        }
        else if($this->permissao == 'A')
        {
            $retorno = "Administrador";
        }
        return $retorno;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    //METÓDOS HERDADOS DA CLASSE ABSTRATA BANCO

    public function save()
    {
        //criar objeto do tipo conexão
        $conexao = new Conexao();

        //cria a conexão com o banco de dados
        if($conn = $conexao->getConection())
        {
            if($this->id > 0)
            {
                $query = "UPDATE USUARIO SET LOGIN = :login, SENHA = :senha, PERMISSAO = :permissao WHERE id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao'=> $this->permissao, ':id' => $this->id)))
                {
                    $result = $stmt->rowCount();
                }
            }
            else
            {
                //criar query de inserção passando os atributos que serão armazenados   
                $query = "INSERT INTO USUARIO (ID, LOGIN, SENHA, PERMISSAO) values (null,:login,:senha,:permissao)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao'=> $this->permissao)))
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

        $query = "DELETE FROM USUARIO WHERE ID = :id";

        $stmt = $conn->prepare($query);

        if($stmt->execute(array(':id'=> $id)))
        {
            $result = true;
        }

        return $result;
    }

    public function find($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "SELECT * FROM usuario where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id)))
        {
            $result = $stmt->fetchObject(Usuario::class);
        }
        else
        {
            $result = false;
        }
        return $result;
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

    // public function login()
    // {
    //     $conexao = new Conexao();

    //     $conn = $conexao->getConection();

    //     $query = "SELECT * FROM USUARIO WHERE LOGIN = :login AND SENHA = :senha";

    //     $stmt = $conn->prepare($query);

    //     if($stmt->execute(array(':login'=> $this->login, ':senha'=> $this->senha)))
    //     {
    //         $result = false;
    //         if($stmt->rowCount() > 0)
    //         {
    //             $result = true;
    //         }
    //     }
    //     return $result;
    // }

    public function login()
    {
        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "SELECT permissao FROM USUARIO WHERE LOGIN = :login AND SENHA = :senha";

        $stmt = $conn->prepare($query);

        $result = "";

        if($stmt->execute(array(':login'=> $this->login, ':senha'=> $this->senha)))
        {
            while ($rs = $stmt->fetchObject(Usuario::class))
            {
                print_r($rs);
                //exit();
                //armazena esse objeto em uma posição do vetor
                $result = $rs->getPermissao();
                print_r($result);
                //exit();
            }
        }
        return $result;
    }
}

    
?>
