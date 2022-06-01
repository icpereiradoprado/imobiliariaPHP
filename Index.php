 <?php
 require_once 'Controller/ImovelController.php';
 require_once 'Controller/UsuarioController.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="wwwroot/css/CadImovel.css">
    <link rel="stylesheet" href="wwwroot/css/CadUser.css">
    <link rel="stylesheet" href="wwwroot/css/ListUsuario.css">
    <link rel="stylesheet" href="wwwroot/css/ListImovel.css">
    <link rel="stylesheet" href="wwwroot/css/style.css">
</head>
<body>
    <?php 
        require_once 'View/PartialsViews/Nav.php';
        if(isset($_GET['page'])){
            if($_GET['page'] == "imovel"){
                if(isset($_GET['action']))
                {
                    if($_GET['action']== "listar")
                    {
                        require_once 'View/ListImovel.php';
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
                    if($_GET['action']== "listar")
                    {
                        require_once 'View/ListUsuario.php';
                    }
                }
                else
                {
                    require_once 'View/CadUsuario.php';
                }
            }
        }
        else
        {
            require_once 'View/PartialsViews/CardImoveis.php';
        }



        
        
        
        
        
        
    ?>
</body>
</html>