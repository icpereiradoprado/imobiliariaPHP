<?php
    require_once '../Controller/UsuarioController.php';
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
    <div class="container">
        <div class="formBorder">
            <form name="cadUsuario" id="cadUsuario" action="" method="POST">
                <div class="fieldForm">
                    <label for="login">Login: </label>
                    <input type="text" name="login" id="login">
                </div>
                <div class="fieldForm">
                    <label for="senha1">Senha: </label>
                    <input type="password" name="senha1" id="senha1">
                </div>
                <div class="fieldForm">
                    <label for="senha2">Confirmar Senha: </label>
                    <input type="password" name="senha2" id="senha2">
                </div>
                <div class="fieldForm">
                    <select name="permissao" id="permissao">
                        <option value="0" disabled>--Permissão--</option>
                        <option value="A">Administrador</option>
                        <option value="C">Comun</option>
                    </select>
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
}
?>