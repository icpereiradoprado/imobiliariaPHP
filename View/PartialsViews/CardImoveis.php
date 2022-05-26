<?
require_once '../../Controller/ImovelController.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    <div class="container">
        <div class="row">
            
            <?php 
            $imovel = call_user_func(array('ImovelController','listar'));
            foreach($imoveis in $imovel)
            {
            ?>
                <div class="col-sm-4">
            
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Teste</h5>
                            <p class="card-text"><?php echo $imoveis->getDescricao(); ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>