<?php


namespace Ifnc\Tads\Controller;




use Ifnc\Tads\Entity\QrCode;
use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;
use Ifnc\Tads\Helper\Transaction;


class EditarQrCodeFormController implements IController
{

    public function request(): void
    {
        Transaction::open();

        $qrcode = QrCode::find($_GET["id"]);






        echo Render::html(
            [

                "cabecalho.php",
                "form-store-qrcode.php",
                "rodape.php"

            ],
            [
                "usuario" => Usuario::download(),
                "qrCodeAtt" => $qrcode,
                "itens" => $_SESSION["itensMenu"],
                "name_btn" => "Atualizar"
            ]);


        Transaction::close();
    }
}