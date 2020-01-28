<?php
namespace Ifnc\Tads\Controller;

use Ifnc\Tads\Entity\Usuario;
use Ifnc\Tads\Helper\Email;
use Ifnc\Tads\Helper\Flash;
use Ifnc\Tads\Helper\Message;
use Ifnc\Tads\Helper\SendEmail;
use Ifnc\Tads\Helper\Transaction;
use Ifnc\Tads\Helper\Util;

use Symfony\Component\Yaml\Yaml;

class StoreUsuarioController implements IController
{
    use Flash;
    
    

    public function request(): void
    {
        $config = Yaml::parseFile('../config/config.yaml');
        $configEmail = Yaml::parseFile('../config/configEmail.yaml');
    
        Transaction::open();


        $usuario = new Usuario();
        $usuario->id = $_POST['id'];
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];


        $usuario->tipo_user = $_POST['tipo_user'] ;



        $consulta_usuario = Usuario::findByCondition("email='{$_POST['email']}'");
        if($consulta_usuario != null && $usuario->id != $consulta_usuario->id){

            $this->create( new Message("Ops, Já existe um usuario cadastrado com esse email!","alert-danger"));
            echo "<script>javascript:history.back(-2)</script>";


        }else if($usuario->id == null){
            $usuario->status_user = 0;
            $senha =Util::random_key(8);
            $usuario->senha = password_hash($senha, PASSWORD_ARGON2I);

            $usuario->store();
            $this->create( new Message("Usuario cadastrado com Sucesso!","alert-success"));
            $email = new Email();
            $email->emailDestino = $usuario->email;
            $email->titulo = "Validação de Conta";
            $email-> conteudo = /** @lang text */
                "               Olá <b>{$usuario->nome}</b>, segue em anexo o codigo e link para validação de sua conta.<br>
                            Por favor insira uma senha de acesso no ato da validação.<br>
                            Codigo: <b>{$senha}</b><br>
                            Link: http://{$config['name_host']}/formValidaUser?email={$usuario->email}<br>
                            att: equipe {$configEmail['nome']}.";

            $em = SendEmail::send($email);
            if(em == 0){
                $this->create( new Message("Email enviado com sucesso!","alert-success"));
            }else if($em == 1){
                $this->create( new Message("Erro no envio do email, Para validação do usuario repasse o seguinte codigo: $senha","alert-danger"));
            }
            if(isset($_GET['type'])){

                Util::redirect(null);
                
            }else{

                Util::redirect($usuario->tipo_user);
            }

        }else if($usuario->id != null){
            $user = $usuario->store();
            $this->create( new Message("Usuario atualizado com Sucesso!","alert-success"));

            if(isset($_GET['type'])){

                Util::redirect(null);

            }else{
                Util::redirect($usuario->tipo_user);
            }

        }


        Transaction::close();
        exit();
    }
}
