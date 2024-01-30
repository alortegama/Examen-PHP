<?php

require 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * isset  = comprobar si una variable existeix
     */
    if (isset($_POST["insert"])) {
        /**
         * Comprobar el formulari d'inserció
         */
        $nom = $_POST["nom"];
        $professor = $_POST["professor"];
        $aula = $_POST["aula"];
        insert($nom, $professor, $aula);
    } elseif (isset($_POST["delete"])) {
        /**
         * Comprobar el formulari d'eliminació
         */
        $id = $_POST["id"];
        delete();
    }
}
function insert($nom, $professor, $aula)
{
    $sql = "INSERT INTO assignatures (nom,professor,aula) VALUES(?,?,?)";
    $connection = connect();
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $professor);
    $stmt->bindParam(3, $aula);
    $stmt->execute();

    /**
     * Redirecció a la pàgina principal d'assignatures
     */
    header("Location:assignatures.php");


}

function insert2()
{
    $nom = $_POST["nom"];
    $professor = $_POST["professor"];
    $aula = $_POST["aula"];

    $sql = "INSERT INTO assignatures (nom,professor,aula) VALUES(?,?,?)";
    $connection = connect();
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $professor);
    $stmt->bindParam(3, $aula);
    $stmt->execute();

    /**
     * Redirecció a la pàgina principal d'assignatures
     */
    header("Location:assignatures.php");
}

function delete()
{
    $id = $_POST["id"];
    $sql = "DELETE FROM assignatures WHERE id=?";
    $connection = connect();
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    header("Location:assignatures.php");
}

function delete2($id)
{
    $sql = "DELETE FROM assignatures WHERE id=?";
    $connection = connect();
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    header("Location:assignatures.php");
}

function findAll()
{
    $sql = "SELECT a.id,a.nom,au.nom as 'aula',p.nom as 'professor'
        FROM assignatures a 
        INNER JOIN aules au ON a.aula=au.id 
        INNER JOIN professors p ON p.id=a.professor";
    return findAllCommon($sql);
}

function findAllTeachers()
{
    $sql = "SELECT id, nom FROM professors";
    return findAllCommon($sql);
}

function findAllClassRooms()
{
    $sql = "SELECT id, nom FROM aules";
    return findAllCommon($sql);
}

function findAllCommon($sql)
{
    $connection = connect();
    $stmt = $connection->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

