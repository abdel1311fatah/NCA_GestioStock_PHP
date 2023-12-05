<?php
class database{
    public static function conectar(){
        $conexio = new mysqli("srv965.hstgr.io","u346867692_ncaGestioStock","Bat/3232","u346867692_ncaGestioStock");
        $conexio->query("SET NAMES 'utf8'");

        return $conexio;
    }
}