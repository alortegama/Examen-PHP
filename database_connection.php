<?php
function connect()
{
    //ESQUEMA
    $database_name = "gestioEscola";
    $database_url = "prova-mysql";
    $database_user = "root";
    $database_password = "secret";
    $database_port = 3306;
    $connect = "mysql:host=$database_url;dbname=$database_name;port=$database_port";
    try {
        $db = new PDO($connect, $database_user, $database_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $error) {
        echo "Error de connexió: {$error->getMessage()}";
        die();
    }
}