<?php
require_once 'Controller/ImovelController.php';
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
            $imoveis = call_user_func(array('ImovelController','listar'));
            foreach($imoveis as $imovel)
            {
            ?>
                <div class="col-sm-4">
            
                    <div class="card mt-5 mb-5 text-center" style="width: 18rem; height: 350px;">
                        <img src="..." class="card-img-top bg-img-gray" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Teste</h5>
                            <p class="card-text text-start "><?php echo $imovel->getDescricao(); ?></p>
                            <a href="#" class="btn btn-primary align-text-bottom"><?php echo $imovel->getTipo()?></a>
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