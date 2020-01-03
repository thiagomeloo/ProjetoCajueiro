<?php
namespace Ifnc\Tads\Helper;

trait Session
{
    public function upload(){
        $className = self::class;
        $_SESSION[$className]=serialize($this);
    }
    public static function download($init = false){
        $className = self::class;
        if(!isset($_SESSION[$className])){
            $_SESSION[$className]=serialize(($init?new $className():null));
        }
        return unserialize($_SESSION[$className]);
    }
}