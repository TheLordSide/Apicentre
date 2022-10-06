<?php
include("../config/json-header.php");
function getconnexion()
{
    try {
        $user = 'root';
        $pass = '';
        $host = 'localhost';
        $pdo = new PDO('mysql:host=' . $host . ';dbname=inta_tracking', $user, $pass);
        $response["success"] = true;
        $response["message"] = "Connexion avec succes";
        return $pdo;
    } catch (Exception $execpt) {
        $response["success"] = false;
        $response["message"] = $execpt;
        echo json_encode($response);
    }
}
