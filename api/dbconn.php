<?php

/*=========================================================================
|                      Fungsi Koneksi Database                            |
=========================================================================*/

function connect_db() {
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'API';
    $connection = new mysqli($server, $user, $pass, $database);

    return $connection;
}

?>