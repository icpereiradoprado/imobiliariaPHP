<?php
    require_once 'Controller/UsuarioController.php';
    require_once 'View/PartialsViews/NavPrincipal.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../wwwrot/css/style.css">
    <link rel="stylesheet" href="../wwwrot/css/CadUser.css">
</head>
<body>
    <div class="container" style="margin-top: 5%;">
        <div class="formBorder">
            <form name="cadUsuario" id="cadUsuario" action="" method="POST">
                <div class="fieldForm">
                    <label for="login">Login: </label>
                    <input type="text" name="login" id="login" value="<?php echo isset($usuario)?$usuario->getLogin():''?>">
                </div>
                <div class="fieldForm">
                    <label for="senha1">Senha: </label>
                    <input type="password" name="senha1" id="senha1" value="<?php echo isset($usuario)?$usuario->getSenha():''?>">
                </div>
                <div class="fieldForm">
                    <label for="senha2">Confirmar Senha: </label>
                    <input type="password" name="senha2" id="senha2">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():'';?>"/>
                    <input type="hidden" name="primeiroUsuario" id="primeiroUsuario" value="<?php echo $_GET['page'] == 'cadastro'? 1 :'';?>"/>
                </div>
                <div class="fieldForm">
                    <?php
                        if(isset($_SESSION['logado']) && $_SESSION['logado'] == "Administrador"){
                    ?>
                    <select name="permissao" id="permissao">
                        <option value="0" disabled>--Permissão--</option>
                        <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'Administrador'?'selected':''?>>Administrador</option>
                        <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'Comun'?'selected':''?>>Comun</option>
                    </select>
                    <?php
                        }else{
                    ?>
                            <input type="hidden" name="permissao" id="permissao" value="C">
                    <?php
                        }
                    ?>
                    
                </div>
                <div class="submitCenter">
                    <div class="fieldForm">
                        <input type="submit" name="btnSalvar" id="btnSalvar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php

//verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar']))
{
    //chama uma função php que permite informar a classe e método que será acionado
    call_user_func(array('UsuarioController','salvar'));
    if($_POST['primeiroUsuario'] == 1)
    {
        header('Location:Index.php?logar');
    }
    else
    {
        header('Location:index.php?page=usuario&action=listar');
    }
}
?>