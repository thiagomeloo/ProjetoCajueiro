<?php
namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Transaction;
use Endroid\QrCode\QrCode;



class GeraQrCodeController implements IController
{

    use Flash;
    public function request(): void
    {

        $text = isset($_GET['texto']) && $_GET['texto'] != null ? $_GET['texto'] : '';
        $qrCode = new QrCode($text);
        $qrCode->setSize(150 , 200);

        header('Content-Type: '.$qrCode->getContentType());
        echo $qrCode->writeString();

    }
}