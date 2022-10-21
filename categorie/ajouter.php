<?php
require_once("../config/json-header.php");
require_once("../config/api.php");

$pdo = getconnexion();

function ajouter(){
    if (!empty($_POST['categorie_code']) || !empty($_POST['categorie_desi'])) {
        categoriexist($_POST['categorie_code'],$_POST['categorie_desi']);
    } else {
       $response["success"]= false;
       $response["message"]="le code du centre ou la désignation est manquant";
       echo json_encode($response);
    }
}

function categoriexist($codecat,$desicat){

    global $pdo;
    $requete = $pdo->prepare("SELECT * from categorie where categorie_code =:val_codecat");
    $requete->bindParam('val_codecat', $codecat);
    $requete->execute();
    if ($requete->rowCount()){
        $response["message"]="la catégorie existe déjà";
        $response["success"]=false;
        echo json_encode($response);
    }
    else{
        try {
            $insertion = $pdo->prepare("INSERT INTO `categorie` (`categorie_code`, `categorie_desi`) VALUES (:val_codecat, :val_desicat);");
            $insertion->bindParam('val_codecat', $codecat);
            $insertion->bindParam('val_desicat', $desicat);
            $insertion->execute();
            $response["success"] = true;
            $response["message"] = "la catégorie a été ajoutée";
            echo json_encode($response);
        } catch (Exception $excep) {
            $response["success"] = false;
            $response["message"] = $excep;
            echo json_encode($response);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ajouter();
}
