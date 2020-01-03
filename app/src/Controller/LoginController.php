<?php


namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\Transaction;

class LoginController implements IController
{
    use Flash;

    public function request(): void
    {
        $email = filter_input(INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if (is_null($email) || $email === false) {
            $this->create( new Message("Email ou Senha Incorretos!","alert-danger"));
            header('Location: /login-form');
            exit();
        }

        $senha = filter_input(INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING);

        Transaction::open();
        $usuario = Usuario::findByCondition("email='{$_POST['email']}'");
        if (!$usuario || !$usuario->valide($senha)) {

            $this->create( new Message("Email ou Senha Incorretos!","alert-danger"));
            header('Location: /login-form');
            exit();
        }

        if($usuario->status_user != 1){

            $this->create( new Message("Usuário inativo,<br> por favor verifique <br>seu email ou contate um administrador!","alert-danger"));
            header('Location: /login-form');
            exit();
        }

        $usuario->upload();
        Transaction::close();
        header('Location: /main');
        exit();
    }
}