<?php


namespace Ifnc\Tads\Entity;


use Ifnc\Tads\Helper\Record;
use Ifnc\Tads\Helper\Session;

class QrCode extends Record
{
    public $id;
    public $texto;
    public $criador;


    use Session;



    public function __sleep(){

        return array('id','texto','criador');

    }
}