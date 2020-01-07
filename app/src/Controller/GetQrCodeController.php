<?php

namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\QrCode;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Transaction;

class GetQrCodeController implements IController
{
    use Flash;

    public function request(): void
    {

        Transaction::open();

        if(isset($_GET['after']) && $_GET['after'] != null ){
            //busca todos maiores que o id.
            echo json_encode(QrCode::all("id > ". $_GET['after']));


        }else{
            //busca todos.
             echo json_encode(QrCode::all());

        }


        Transaction::close();

        //exit();

    }
}



