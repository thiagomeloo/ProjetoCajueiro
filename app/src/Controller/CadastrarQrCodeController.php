<?php

namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;

class CadastrarQrCodeController implements IController

{

    public function request(): void
    {

        echo Render::html(
            [

                "cabecalho.php",
                "form-store-qrcode.php",
                "rodape.php"

            ],
            [
                "usuario" => Usuario::download(),
                "name_btn" => "Cadastrar",
                "itens" => $_SESSION["itensMenu"],
                "tpUser" => 1
            ]);
    }
}