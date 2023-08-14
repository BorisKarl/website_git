<?php


$db_server = 'localhost';
$db_benutzer = 'root';
$db_passwort = '';
$db_name = 'fip_db'; 


try {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_benutzer, $db_passwort, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    $e->getMessage();
    die($e);
};



// strato webmail db Verbidung
/*
$db_server = 'rdbms.strato.de';
$db_benutzer = 'dbu2339978';
$db_passwort = 'aassddffgghh';
$db_name = 'dbs4904867'; 


try {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_benutzer, $db_passwort, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    $e->getMessage();
    die($e);
};


*/
