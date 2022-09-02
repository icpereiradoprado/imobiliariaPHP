<?php
require_once 'Controller/ImovelController.php';
?>

    <div class="container" style="margin-top: 5%;">
        <div class="row d-flex">    
                <?php 
                $imoveis = call_user_func(array('ImovelController','listarUltimosImoveis'));
                foreach($imoveis as $imovel)
                {
                ?>
                <div class="col-sm-4">
                    <div class="card mt-5 mb-5 text-center card-size">
                        <img  class="img-thumbnail" src="data:<?php echo $imovel->getFotoTipo();?>;base64,<?php echo base64_encode($imovel->getFoto());?>" alt="preview da imagem da casa">
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
