<?php
require_once("../config/json-header.php");
require_once("../config/api.php");

$pdo = getconnexion();

function ajouter()
{
        if (!empty($_POST['centre_code']) || !empty($_POST['centre_designation'])) {
            centre_exit($_POST['centre_code'], $_POST['centre_designation'], $_POST['centre_localisation'],$_POST['centre_telephone'], $_POST['centre_nb_personne'], $_POST['centre_chef_nom'],$_POST['centre_chef_prenom'],$_POST['centre_chef_tel']);
        } else {
           $response["success"]= false;
           $response["message"]="le code du centre ou la désignation est manquant";
           echo json_encode($response);
        }
}

function centre_exit($centrecode, $centredesi, $centrelocal, $centretel, $centrenbpers, $centrechefnom, $centrechefpren, $centrecheftel)
{
    global $pdo;
    $requete = $pdo->prepare("SELECT * from centre where centre_code=:val_centre");
    $requete->bindParam('val_centre', $centrecode);
    $requete->execute();
    if ($requete->rowCount()) {
        $response["message"] = "Les informations entrées indiquent que ce centre existe déjà";
        $response["success"] = false;
        echo json_encode($response);
    } else {
        try {
            $insertion = $pdo->prepare("INSERT INTO `centre` (`centre_code`, `centre_designation`, `centre_localisation`, `centre_telephone`, `centre_nb_personne`, `centre_chef_nom`, `centre_chef_prenom`, `centre_chef_tel`) VALUES (:val_centrecode, :val_centredesi, :val_centreloacal, :val_centretel, :val_centrenbpers, :val_centrechefnom, :val_centrechefpren, :val_centrecheftel);");
            $insertion->bindParam('val_centrecode', $centrecode);
            $insertion->bindParam('val_centredesi', $centredesi);
            $insertion->bindParam('val_centreloacal', $centrelocal);
            $insertion->bindParam('val_centretel', $centretel);
            $insertion->bindParam('val_centrenbpers', $centrenbpers);
            $insertion->bindParam('val_centrechefnom', $centrechefnom);
            $insertion->bindParam('val_centrechefpren', $centrechefpren);
            $insertion->bindParam('val_centrecheftel', $centrecheftel);
            $insertion->execute();
            $response["success"] = true;
            $response["message"] = "le centre a été ajouté";
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
