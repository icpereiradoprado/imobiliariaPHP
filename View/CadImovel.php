<?php
require_once 'Controller/ImovelController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Imóveis</title>
    <link rel="stylesheet" href="../wwwrot/css/style.css">
    <link rel="stylesheet" href="../wwwrot/css/CadImovel.css">
</head>
<body>
    <div class="container">
    <div class="formBorder">
            <form name="cadUsuario" id="cadUsuario" action="" method="POST">
                <div class="fieldForm">
                    <label for="descricao">Descrição: </label>
                    <textarea name="descricao" id="descricao" cols="30" rows="4"></textarea>
                    <!-- <input type="text" name="descricao" id="descricao"> -->
                </div>
                <div class="fieldForm">
                    <label for="foto">Foto: </label>
                    <input type="foto" name="foto" id="foto">
                </div>
                <div class="fieldForm">
                    <label for="senha2">Valor: </label>
                    <input type="number" name="valor" id="valor" min="0" step="0.01">
                </div>
                <div class="fieldForm">
                    <select name="tipo" id="tipo">
                        <option value="0" disabled>--Tipo--</option>
                        <option value="A">Alugar</option>
                        <option value="C">Comprar</option>
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
if(isset($_POST['btnSalvar']))
{
    call_user_func(array('ImovelController','salvar'));
}
?>