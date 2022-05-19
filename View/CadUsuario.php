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
</head>
<body>
    <form name="cadUsuario" id="cadUsuario" action="" method="POST">
        Login: <input type="text" name="login" id="login"><br>
        Senha: <input type="password" name="senha1" id="senha1"><br>
        Confirmar Senha: <input type="password" name="senha2" id="senha2"><br>
        <select name="permissao" id="permissao">
            <option value="0"></option>
            <option value="A">Administrador</option>
            <option value="B">Comun</option>
        </select><br><br>
        <input type="submit" name="btnSalvar" id="btnSalvar">
    </form>
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