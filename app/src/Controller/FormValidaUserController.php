<?php


namespace Ifnc\Tads\Controller;


use Ifnc\Tads\Helper\Render;

class FormValidaUserController implements IController
{


    public function request(): void
    {
        $email = null;
        //pega o email validado aqui
        if(isset($_GET['email']) && $_GET['email']!= null){
            $email = $_GET['email'];
        }else{
            header("Location: /login-form", true, 302);
        }

        echo Render::html(
            [

                "form-valida-user.php",

            ],
            [
                "email" => $email
            ]);
    }

}