<?php
require_once 'Controller/UsuarioController.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="../wwwrot/css/ListUsuario.css">
    <link rel="stylesheet" href="../wwwrot/css/style.css">
</head>
<body>

    <div class="container">
        <div class="table-container">
            <table>
                <tr>
                    <th>Login</th>
                    <th>Permissão</th>
                    <th><a href="CadUsuario.php">Novo</a></th>
                </tr>
                <?php
                $usuarios = call_user_func(array('UsuarioController','listar'));
                //Verifica se houve retorno
                if(isset($usuarios) && !empty($usuarios))
                {
                    foreach($usuarios as $usuario)
                    {
                    ?>    
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado. -->
                        <td><?php echo $usuario->getLogin();?></td>
                        <td><?php echo $usuario->getPermissao();?></td>
                        <td>
                            <a href="index.php?page=usuario&action=editar&id=<?php echo $usuario->getId();?>">Editar</a>
                            <a href="index.php?page=usuario&action=excluir&id=<?php echo $usuario->getId();?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                    }
                }
                else
                {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php   
                }
                ?>
            </table>
        </div>
    </div>        
</body>
</html>