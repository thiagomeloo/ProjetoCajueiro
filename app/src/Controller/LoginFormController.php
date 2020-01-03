<?php


namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Render;

class LoginFormController implements IController
{

    public function request(): void
    {
        $usuario = Usuario::download();
        if($usuario != null){
            header('Location: /main', true, 302);

        }else{
            echo Render::html(
                [

                    "login-form.php",

                ],
                [
                    "titulo"=>"Login"
                ]);
        }

    }
}