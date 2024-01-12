<?php
// class DB
// {
//     public static function connect(){
//         $host = "localhost";
//         $user = "root";
//         $password = "0499";
//         $database = "servfin";

//         return new PDO("mysql:host={$host}; dbname={$database};charset=UTF8;",$user, $password);
//     }
// }

class DB
{
    public static function connect(){
        $host = "185.224.138.7";
        $user = "u605016569_progr";
        $password = "plan0499";
        $database = "u605016569_finan";

        return new PDO("mysql:host={$host}; dbname={$database};charset=UTF8;",$user, $password);
    }
}