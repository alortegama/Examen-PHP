<?php
require 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["insert"])) {
        $nom = $_POST["nom"];
        $cognom = $_POST["cognom"];
        $edat = $_POST["edat"];
        $curs = $_POST["curs"];
        insert($nom, $cognom, $edat, $curs);
        header("Location: estudiants.php");
    } else if (isset($_POST["delete"])) {
        delete();
        header("Location: estudiants.php");
    }
}

function findAll()
{
    $db = connect();
    $query = "SELECT e.id,e.nom,e.edat,e.curs,a.nom as 'assignatura' FROM estudiants e
         INNER JOIN assignatures_estudiants ae on e.id = ae.id_estudiant
         INNER JOIN assignatures a on ae.id_assignatura = a.id
         ORDER BY e.id;";
    $stmt = $db->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    $map = array();

    foreach ($rows as $row) {
        $id = $row->id;
        $nom = $row->nom;
        $edat = $row->edat;
        $curs = $row->curs;
        $assignatura = $row->assignatura;
        if (!isset($map[$id])) {
            $array  = array(
                "nom" => $nom,
                "edat" => $edat,
                "curs" => $curs,
                "assignatures" => array()
            );
            $object = (object)$array;
            $map[$id] = $object;
        }
        array_push($map[$id]->assignatures, $assignatura);
    }
    return $map;
}

function insert($nom, $cognom, $edat, $curs)
{

    $db = connect();
    $query = "INSERT INTO estudiants (nom,cognom,edat,curs) VALUES (?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $cognom);
    $stmt->bindParam(3, $edat);
    $stmt->bindParam(4, $curs);
    $stmt->execute();


}

function delete()
{
    $id = $_POST["id"];
    $db = connect();
    $query = "UPDATE estudiants SET enable = 0 where id= ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();

}