<?php
include("../config/json-header.php");
require_once("../config/api.php");

$pdo = getconnexion();

function listecentre(){

    global $pdo;
    $query = $pdo->prepare("select * from centre");
    $query->execute();
    if ($query->rowCount() == 0){
        $response["message"]="Aucun centre enregistré";
        $response["success"]=false;
        echo json_encode($response);
    }
    else{
        $response["message"]="Liste des centres disponibles";
        $response["total"]=$query->rowCount();
        $response["liste"]=$query->fetchAll(PDO::FETCH_ASSOC);
        $response["success"]=true;
        echo json_encode($response);
    }
}

listecentre();