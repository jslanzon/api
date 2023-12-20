<?php
class DB
{
    public static function connect(){
        $host = "localhost";
        $user = "root";
        $password = "0499";
        $database = "servfin";

        return new PDO("mysql:host={$host}; dbname={$database};charset=UTF8;",$user, $password);
    }
}