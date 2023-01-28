<?php

namespace App\Models;

use PDO;

class Connection
{

    public static function connect()
    {
        $conn = new PDO('mysql:dbname=loja_mercearia;host=localhost', 'root', '');
        return $conn;
    }
}
