<?php
require_once 'Controller/ImovelController.php';
?>

    <div class="container">
        <div class="row d-flex">    
                <?php 
                $imoveis = call_user_func(array('ImovelController','listar'));
                foreach($imoveis as $imovel)
                {
                ?>
                <div class="col-sm-4">
                    <div class="card mt-5 mb-5 text-center card-size">
                        <img src="<?php echo $imovel->getFoto()?>" class="card-img-top bg-img-gray" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Imóvel</h5>
                            <p class="card-text text-start"><?php echo $imovel->getDescricao(); ?></p>
                            
                        </div>
                        <div class="mb-3">
                            <a href="#" class="btn btn-primary"><?php echo $imovel->getTipo()?></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
    </div>
