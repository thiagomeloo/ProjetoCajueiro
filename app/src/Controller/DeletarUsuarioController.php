<?php
namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\Transaction;
use Ifnc\Tads\Helper\Util;


class DeletarUsuarioController implements IController
{

    use Flash;
    public function request(): void
    {

        Transaction::open();
        $id = $_GET["id"];
        try {
            $user = Usuario::find($id);
            Usuario::delete($id);


            $this->create(new Message(
                'Usuario removido com Sucesso!','alert-success'
            ));

        } catch (\Exception $e) {
            $this->create(new Message(
                'Ops, ocorreu algum erro ao apagar o usuario!','alert-danger'
            ));

        }
        Transaction::close();
        Util::redirect($user->tipo_user);

        //header('Location: /main', true, 302);
    }
}