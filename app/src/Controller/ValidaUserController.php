<?php

namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\Transaction;

class ValidaUserController implements IController
{
    use Flash;

    public function request(): void
    {
        if(!isset($_POST['email']) || $_POST['email'] == null){
            header("Location: /login-form", true, 302);
        }
        Transaction::open();
        $usuario = Usuario::findByCondition("email='{$_POST['email']}'");
        if (!$usuario || !$usuario->valide($_POST['codigo'])) {
            header("Location: formValidaUser?email={$_POST['email']}");
            $this->create( new Message("Verifique o codigo e tente novamente!","alert-danger"));


            exit();
        }
        $usuario->status_user = 1;
        $usuario->senha = password_hash($_POST['senha'], PASSWORD_ARGON2I);
        $usuario->store();
        Transaction::close();
        $this->create( new Message("Usuario validado com Sucesso!","alert-success"));
        header("Location: /login-form", true, 302);
        exit();

    }
}



