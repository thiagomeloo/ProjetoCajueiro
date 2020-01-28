<?php

namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\QrCode;
use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;
use Ifnc\Tads\Helper\Transaction;

class GerenciarQrCodeController implements IController

{

    public function request(): void
    {
        Transaction::open();

        $qrcodes = QrCode::all(null, null);
        foreach ($qrcodes as $qrcode){
            $qrcode->criador = Usuario::find($qrcode->criador);
        }


        echo Render::html(
            [

                "cabecalho.php",
                "contentGerenciarQrCode.php",
                "rodape.php"

            ],
            [
                "usuario" => Usuario::download(),
                "nomePag" => "Gerenciar Qr Code",
                "urlCadastrar" => "/cadastrarQrCode",
                "entidade" => "QrCode",
                "QrCodesArray"=> $qrcodes,
                "itens" => $_SESSION["itensMenu"],
                "qtdAtivo" => 0,
                "qtdInativo" => 0,
                "qtdTotal" => 0
            ]);
        Transaction::close();
    }
}