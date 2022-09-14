<?php
require_once 'Model/Galeria.php';

class GaleriaController{
    public static function salvar($fotoAtual="", $fotoTipo="")
    {
        $galeria = new Galeria();

        $imagem = array();
        // print_r($_FILES['foto']);
        // exit();
        if(is_uploaded_file($_FILES['fotoGaleria']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['fotoGaleria']['tmp_name']);
            $imagem['tipo'] = $_FILES['fotoGaleria']['type'];
            $imagem['path'] = 'wwwroot/images/'.$_FILES['fotoGaleria']['name'];
            //upload do arquivo para o servidor.
            move_uploaded_file($_FILES['fotoGaleria']['tmp_name'],$imagem['path']);
        }

        if(!empty($imagem)){
            //print_r($imagem['data']);
            //exit();
            $galeria->setPicture($imagem['data']);
            $galeria->setPictureTipo($imagem['tipo']);
            $galeria->setPath($imagem['path']);
            //Verifica se existe um caminho da imagem e se sim remove a imagem antiga do servidor
            if(!empty($_POST['path']))
                unlink($_POST['path']);
        }
        else{
            $galeria->setPicture($fotoAtual);
            $galeria->setPictureTipo($fotoTipo);
            $galeria->setPath($imagem['path']);
        }

        $galeria->setIdImovel($_POST['id']);
        $galeria->save();
    }

    public static function listarPictures()
    {
        
        $idImovel = $_GET['id'];
        //cria um objeto do tipo usuario
        $galeria = new Galeria();

        //chama o metodo listaAll()

        return $galeria->listAllPictures($idImovel);
    }
}

?>