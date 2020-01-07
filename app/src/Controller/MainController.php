<?php

namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;
use Ifnc\Tads\Helper\Transaction;


class MainController implements IController
{

    public function request(): void
    {

        Transaction::open();

        $itens = array();
        $usuario = Usuario::download();

        switch ($usuario->tipo_user){
            case 1:
                $itens = array("itens" =>
                    array( "url" => '/gerenciarQrCode', "icone" => 'fa-qrcode', "nome" => ' QR CODE '),
                    array( "url" => '/gerenciarAdmin', "icone" => 'fa-user-secret', "nome" => ' GERENCIAR ADMIN ')
                );
                break;
        }

        $_SESSION["itensMenu"] = $itens;


        echo Render::html(
            [
                "cabecalho.php",
                "contentMain.php",
                "rodape.php"
            ],
            [
                "usuario"=>$usuario,
                "itens" => $_SESSION["itensMenu"]

            ]);

        Transaction::close();
    }
}