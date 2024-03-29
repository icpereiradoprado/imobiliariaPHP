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
                        <img  class="card-img-top" style="height: 50%;" src="<?php echo $imovel->getPath();?>" alt="preview da imagem da casa">
                        <div class="card-body">
                            <h5 class="card-title">Imóvel</h5>
                            <p class="card-text text-start"><?php echo $imovel->getDescricao(); ?></p>
                            
                        </div>
                        <div class="mb-3">
                            <a href="?page=galeria&action=<?php echo $imovel->getTipo() == "Alugar" ? "alugar" : "comprar";?>&id=<?php echo $imovel->getId();?>" class="btn btn-primary"><?php echo $imovel->getTipo()?></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
    </div>
