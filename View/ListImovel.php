<?php
require_once 'Controller/ImovelController.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imóveis Cadastrados</title>
    <link rel="stylesheet" href="../wwwrot/css/ListImoveis.css">
    <link rel="stylesheet" href="../wwwrot/css/style.css">
</head>
<body>

    <div class="container" style="margin-top: 5%">
        <div class="table-container">
            <table>
                <tr>
                    <th>Descrição</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th><a href="index.php?page=imovel">Novo</a></th>
                </tr>
                <?php
                $imovel = call_user_func(array('ImovelController','listar'));
                //Verifica se houve retorno
                if(isset($imovel))
                {
                    foreach($imovel as $imovel)
                    {
                    ?>    
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado. -->
                        <td><?php echo $imovel->getDescricao();?></td>
                        <td class="text-center"><img  class="img-thumbnail" style="width: 60%;" src="<?php echo $imovel->getPath();?>"  alt="preview da imagem da casa"></td>
                        <td><?php echo $imovel->getValor();?></td>
                        <td><?php echo $imovel->getTipo();?></td>
                        <td>
                            <a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId();?>">Editar</a>
                            <a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId();?>">Excluir</a>
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