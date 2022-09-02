<?php 
require_once 'Model/Imovel.php';

class ImovelController
{
    public static function salvar($fotoAtual="", $fotoTipo="")
    {
        $imovel = new Imovel();

        $imagem = array();
        // print_r($_FILES['foto']);
        // exit();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
        }

        if(!empty($imagem)){
            // print_r($imagem['data']);
            // exit();
            $imovel->setFoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
        }
        else{
            $imovel->setFoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
        }

        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);

        $imovel->save();
    }

    public static function listar()
    {
        //cria um objeto do tipo usuario
        $imovel = new Imovel();

        //chama o metodo listaAll()

        return $imovel->listAll();
    }

    public static function listarUltimosImoveis()
    {
        //cria um objeto do tipo usuario
        $imovel = new Imovel();

        //chama o metodo listaAll()

        return $imovel->listLastImoveis();
    }


    public static function editar($id)
    {
        $imovel = new Imovel();
        $imovel = $imovel->find($id);

        return $imovel;
    }

    public static function excluir($id)
    {
        $imovel = new Imovel();

        $imovel = $imovel->remove($id);
    }

}
?>