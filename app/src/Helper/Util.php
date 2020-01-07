<?php


namespace Ifnc\Tads\Helper;


class Util
{

    public static function random_key($chars = 8) {
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($letters), 0, $chars);
    }

    public static function data($data){
        return date("d/m/Y", strtotime($data));
    }

    public static function dataHora($data){
        return date("d/m/Y H:i:s", strtotime($data));
    }

    public static function redirect($id, $value = false){
        switch ($id){
            case 1:
                header('Location: /gerenciarAdmin', true, 302);
                break;
            case 2:
                header('Location: /gerenciarQrCode', true, 302);
                break;
            default:
                header('Location: /main', true, 302);
                break;
        }

    }

}