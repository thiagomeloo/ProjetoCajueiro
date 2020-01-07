<?php
namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\QrCode;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\Transaction;
use Ifnc\Tads\Helper\Util;


class DeletarQrCodeController implements IController
{

    use Flash;
    public function request(): void
    {

        Transaction::open();
        $id = $_GET["id"];
        try {
            $qrcode = QrCode::find($id);
            QrCode::delete($id);

            $this->create(new Message(
                'Qr Code removido com Sucesso!','alert-success'
            ));

        } catch (\Exception $e) {
            $this->create(new Message(
                'Ops, ocorreu algum erro ao remover o Qr Code!','alert-danger'
            ));

        }
        Transaction::close();

        Util::redirect(2);

        //header('Location: /main', true, 302);
    }
}