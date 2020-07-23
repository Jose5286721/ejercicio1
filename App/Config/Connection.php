<?php
namespace App\Config;
class Connection{
    public static function getConnection(){
        return mysqli_connect("127.0.0.1","root","admin","ejercicio1");
    }
}
