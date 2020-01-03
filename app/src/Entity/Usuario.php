<?php


namespace Ifnc\Tads\Entity;


use Ifnc\Tads\Helper\Record;
use Ifnc\Tads\Helper\Session;

class Usuario extends Record
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipo_user;
    public $status_user;

    use Session;

    public function valide($senha){
        return password_verify($senha,$this->senha);
    }

    public function __sleep(){

        return array('id','nome','email','tipo_user','status_user');

    }
}