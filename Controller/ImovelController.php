<?php 
require_once 'Model/Imovel.php';

class ImovelController
{
    public static function salvar()
    {
        $imovel = new Imovel();

        $imovel->setId($_POST['id']);
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

    public static function editar($id)
    {
        $imovel = new Imovel();
        $imovel = $imovel->find($id);

        return $imovel;
    }

    public function excluir($id)
    {
        $imovel = new Imovel();

        $imovel = $imovel->remove($id);
    }

}
?>