<?php
namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\AlunoResponsavel;
use Ifnc\Tads\Entity\AlunoTurma;
use Ifnc\Tads\Entity\Endereco;
use Ifnc\Tads\Entity\QrCode;
use Ifnc\Tads\Entity\Responsavel;
use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Email;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\SendEmail;
use Ifnc\Tads\Helper\Transaction;
use Ifnc\Tads\Helper\Util;


class StoreQrCodeController implements IController
{
    use Flash;

    public function request(): void
    {
        Transaction::open();
        $usuario = Usuario::download();
        $qrCode = new QrCode();
        $qrCode->texto = $_POST['texto'];
        $qrCode->id = $_POST['id'];
        $qrCode->criador = $usuario->id;
        $qrCode->store();
        if($usuario-> id == null){
            $this->create( new Message("Qr Code criado com Sucesso!","alert-success"));
        }else{
            $this->create( new Message("Qr Code atualizado com Sucesso!","alert-success"));
        }
        Util::redirect(2);

        Transaction::close();
        exit();
    }
}
