<?php


namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;
use Ifnc\Tads\Helper\Transaction;


class EditarUsuarioFormController implements IController
{

    public function request(): void
    {
        Transaction::open();

        $us = Usuario::find($_GET["id"]);

        $type = isset($_GET["type"]) ? $_GET["type"] : 0;

        $alResp = null;
        $turmas = null;
        $turmaAtt = null;





        echo Render::html(
            [

                "cabecalho.php",
                "form-store-usuario.php",
                "rodape.php"

            ],
            [
                "usuario" => Usuario::download(),
                "usuarioAtt" => $us,
                "type" => $type,
                "tpUser" => $us->tipo_user,
                "respAtt" => $alResp,
                "turmas" => $turmas,
                "turmaAtt" => $turmaAtt,
                "itens" => $_SESSION["itensMenu"],
                "name_btn" => "Atualizar"
            ]);


        Transaction::close();
    }
}