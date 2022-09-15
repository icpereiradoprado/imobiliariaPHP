<?php
    require_once 'Controller/GaleriaController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-center" style="margin-top: 5%;">
        <form name="cadGaleria" id="cadGaleria" action="" method="POST" enctype="multipart/form-data">
            <div class="fieldForm">

                <div class="d-flex align-items-center my-4">
                    <label for="foto">Foto Galeria: </label>
                    <input type="file" name="fotoGaleria" id="fotoGaleria" required style="margin-left: 20px;">
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
                <input class="px-0 py-2" name="btnSalvar" type="submit" value="Salvar" style="width: 30%; margin: auto;">
            </div>
        </form>

    </div>
    <div class="d-flex align-items-center" style="margin-top: 25px;">
        <div style="width: 100%; height: 1px; border: 1px solid orangered"></div>
        <div class="fw-bold" style="white-space: nowrap; margin: 0 10px; font-size: 25px;">Fotos Adicionadas</div>
        <div style="width: 100%; height: 1px; border: 1px solid orangered"></div>
    </div>
    
    <div class="d-flex flex-wrap justify-content-center" style="margin: auto;">
    
        <?php 
            $galeriaPictures = call_user_func(array('GaleriaController','listarPictures'));
            foreach($galeriaPictures as $picture)
            {
            ?>

            <div class="d-flex flex-column">
                <div class="" style="width: 500px; height: 330px; margin-bottom: 5px; margin-right: 20px;">
                    <img class="w-100 h-100 img-thumbnail" src="<?php echo $picture->getPath();?>" alt="imagem da casa">
                
                </div>
                <a href="?page=imovel&action=excluir-foto&id-foto=<?php echo $picture->getId();?>&id=<?php echo $picture->getIdImovel();?>" name="btnExcluir" id="btnExcluir" class="btnExcluir my-3" style="width: 65px;">Excluir</a>
            </div>
            <?php
            }
        ?>
    </div>

</body>
</html>

<?php
if(isset($_POST['btnSalvar']))
{
    if(isset($galeria)){
        call_user_func(array('GaleriaController','salvar'));
    }
    else{
        call_user_func(array('GaleriaController','salvar'));
    }
    // header('Location:index.php?page=imovel&action=listar');
}

?>