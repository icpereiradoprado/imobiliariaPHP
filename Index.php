 <?php
 session_start();
 ob_start();
 require_once 'Controller/ImovelController.php';
 require_once 'Controller/UsuarioController.php';
 require_once 'Controller/GaleriaController.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="wwwroot/css/CadImovel.css">
    <link rel="stylesheet" href="wwwroot/css/CadUser.css">
    <link rel="stylesheet" href="wwwroot/css/ListUsuario.css">
    <link rel="stylesheet" href="wwwroot/css/ListImovel.css">
    <link rel="stylesheet" href="wwwroot/css/style.css">
</head>
<body>
    <?php 
        // require_once 'View/PartialsViews/Nav.php';
        if(isset($_SESSION['logado']) && isset($_SESSION['login']) && !empty($_SESSION['logado']) && !empty($_SESSION['login']))
        {
            require_once 'View/PartialsViews/menu.php';
            if(isset($_GET['page'])){
            
                if($_GET['page'] == "imovel"){
                    if(isset($_GET['action']))
                    {
                        if($_GET['action'] == 'editar')
                        {
                            $imovel = call_user_func(array('ImovelController','editar'),$_GET['id']);
                            require_once 'View/CadImovel.php';
                        }
                        if($_GET['action'] == 'excluir')
                        {
                            $imovel = call_user_func(array('ImovelController','excluir'),$_GET['id']);
                            require_once 'View/ListImovel.php';
                        }
                        if($_GET['action']== "listar")
                        {
                            require_once 'View/ListImovel.php';
                        }
                        if($_GET['action'] == "adicionar-foto")
                        {
                            require_once 'View/CadPictures.php';
                        }
                        if($_GET['action'] == 'excluir-foto')
                        {
                            $imovel = call_user_func(array('GaleriaController','excluir'),$_GET['id-foto']);
                            require_once 'View/CadPictures.php';
                        }
                    }
                    else
                    {
                        require_once 'View/CadImovel.php';
                    }
                }
                if($_GET['page'] == "usuario"){
                    if(isset($_GET['action']))
                    {
                        if($_GET['action'] == 'editar')
                        {
                            $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
                            require_once 'View/CadUsuario.php';
                        }
                        if($_GET['action'] == 'excluir')
                        {
                            $usuario = call_user_func(array('UsuarioController','excluir'),$_GET['id']);
                            require_once 'View/ListUsuario.php';
                        }
                        if($_GET['action'] == "listar")
                        {
                            require_once 'View/ListUsuario.php';
                        }
                    }
                    else
                    {
                        require_once 'View/CadUsuario.php';
                    }
                }
                if($_GET['page'] == "galeria"){
                    if($_GET['action'] == "comprar")
                    {
                        // $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
                        // require_once 'View/CadUsuario.php';
                    }
                    if($_GET['action'] == "alugar")
                    {
                        // $usuario = call_user_func(array('UsuarioController','editar'),$_GET['id']);
                        // require_once 'View/CadUsuario.php';
                    }
                }
            }
            else
            {
                require_once 'View/PartialsViews/CardImoveis.php';
            }
        }
        else
        {
            if(isset($_GET['logar']))
            {
                require_once 'View/login.php';
            }
            else if(isset($_GET['page']) == "cadastro")
            {
                require_once 'View/CadUsuario.php';
            }
            else
            {
                require_once 'principal.php';
            }
        }
        
        ob_end_flush();
    ?>
</body>
</html>