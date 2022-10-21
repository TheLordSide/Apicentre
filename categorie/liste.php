<?php
require_once("../config/json-header.php");
require_once("../config/api.php");

$pdo = getconnexion();
function listecentre(){

    global $pdo;
    $query = $pdo->prepare("SELECT * from categorie");
    $query->execute();
    if ($query->rowCount() == 0){
        $response["message"]="Aucune catégorie enregistrée";
        $response["success"]=false;
        echo json_encode($response);
    }
    else{
        $response["message"]="Liste des catégories disponibles";
        $response["total"]=$query->rowCount();
        $response["liste"]=$query->fetchAll(PDO::FETCH_ASSOC);
        $response["success"]=true;
        echo json_encode($response);
    }
}

listecentre();