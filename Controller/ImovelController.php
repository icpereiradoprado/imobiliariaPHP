<?php 
require_once 'Model/Imovel.php';

class ImovelController
{
    public static function salvar()
    {
        $imovel = new Imovel();

        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
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
}
?>