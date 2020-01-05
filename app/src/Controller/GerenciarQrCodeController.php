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

        $qrcodes = QrCode::all();
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
                "nomePag" => "Gerenciar QrCode",
                "urlCadastrar" => "/cadastrarAdmin",
                "entidade" => "QrCode",
                "QrCodesArray"=> $qrcodes,
                "itens" => $_SESSION["itensMenu"],
                "qtdAtivo" => Usuario::count("tipo_user = 1 and status_user = 1"),
                "qtdInativo" => Usuario::count("tipo_user = 1 and status_user != 1"),
                "qtdTotal" => Usuario::count()
            ]);
        Transaction::close();
    }
}